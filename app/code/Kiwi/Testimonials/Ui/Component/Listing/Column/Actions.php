<?php
declare(strict_types=1);

namespace Kiwi\Testimonials\Ui\Component\Listing\Column;

use Magento\Framework\UrlInterface;
use Magento\Ui\Component\Listing\Columns\Column;

/**
 * Actions column for testimonial listing grid
 */
class Actions extends Column
{
    /**
     * Edit action URL path
     */
    public const URL_PATH_EDIT = 'testimonials/testimonial/edit';

    /**
     * Delete action URL path
     */
    public const URL_PATH_DELETE = 'testimonials/testimonial/delete';

    /**
     * URL builder
     *
     * @var UrlInterface
     */
    protected UrlInterface $urlBuilder;

    /**
     * @param UrlInterface $urlBuilder
     * @param \Magento\Framework\View\Element\UiComponent\ContextInterface $context
     * @param \Magento\Framework\View\Element\UiComponentFactory $uiComponentFactory
     * @param array $components
     * @param array $data
     */
    public function __construct(
        UrlInterface $urlBuilder,
        \Magento\Framework\View\Element\UiComponent\ContextInterface $context,
        \Magento\Framework\View\Element\UiComponentFactory $uiComponentFactory,
        array $components = [],
        array $data = []
    ) {
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare actions column data
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource): array
    {
        if (!isset($dataSource['data']['items'])) {
            return $dataSource;
        }

        foreach ($dataSource['data']['items'] as &$item) {
            if (!isset($item['id'])) {
                continue;
            }

            $item[$this->getData('name')] = [
                'edit' => [
                    'href' => $this->urlBuilder->getUrl(
                        self::URL_PATH_EDIT,
                        ['id' => $item['id']]
                    ),
                    'label' => __('Edit'),
                ],
                'delete' => [
                    'href' => $this->urlBuilder->getUrl(
                        self::URL_PATH_DELETE,
                        ['id' => $item['id']]
                    ),
                    'label' => __('Delete'),
                    'confirm' => [
                        'title' => __('Delete "%1"', $item['name'] ?? ''),
                        'message' => __('Are you sure you want to delete this testimonial?'),
                    ],
                    'post' => true,
                ],
            ];
        }

        return $dataSource;
    }
}
