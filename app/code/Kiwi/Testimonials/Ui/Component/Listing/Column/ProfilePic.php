<?php
declare(strict_types=1);

namespace Kiwi\Testimonials\Ui\Component\Listing\Column;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Ui\Component\Listing\Columns\Column;

/**
 * Profile picture column renderer for testimonial grid
 */
class ProfilePic extends Column
{
    /**
     * Default ALT field
     */
    public const ALT_FIELD = 'name';

    /**
     * Store manager
     *
     * @var StoreManagerInterface
     */
    protected StoreManagerInterface $storeManager;

    /**
     * URL builder
     *
     * @var UrlInterface
     */
    protected UrlInterface $urlBuilder;

    /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param StoreManagerInterface $storeManager
     * @param UrlInterface $urlBuilder
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        StoreManagerInterface $storeManager,
        UrlInterface $urlBuilder,
        array $components = [],
        array $data = []
    ) {
        $this->storeManager = $storeManager;
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare data source for thumbnail column
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource): array
    {
        if (!isset($dataSource['data']['items'])) {
            return $dataSource;
        }

        $fieldName = (string)$this->getData('name');
        $mediaBaseUrl = $this->storeManager
            ->getStore()
            ->getBaseUrl(UrlInterface::URL_TYPE_MEDIA);

        foreach ($dataSource['data']['items'] as &$item) {
            $file = $item[$fieldName] ?? '';

            if (!$file) {
                continue;
            }

            $imageUrl = $mediaBaseUrl . 'testimonial/' . ltrim($file, '/');

            $item[$fieldName . '_src'] = $imageUrl;
            $item[$fieldName . '_alt'] = $this->getAlt($item) ?? '';
            $item[$fieldName . '_link'] = $this->urlBuilder->getUrl(
                'testimonials/testimonial/edit',
                ['id' => $item['id']]
            );
            $item[$fieldName . '_orig_src'] = $imageUrl;
        }

        return $dataSource;
    }

    /**
     * Retrieve ALT text for image
     *
     * @param array $row
     * @return string|null
     */
    protected function getAlt(array $row): ?string
    {
        $altField = $this->getData('config/altField') ?: self::ALT_FIELD;
        return $row[$altField] ?? null;
    }
}
