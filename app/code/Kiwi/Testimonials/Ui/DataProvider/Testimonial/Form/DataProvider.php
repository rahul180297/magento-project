<?php
declare(strict_types=1);

namespace Kiwi\Testimonials\Ui\DataProvider\Testimonial\Form;

use Magento\Ui\DataProvider\AbstractDataProvider;
use Kiwi\Testimonials\Model\ResourceModel\Testimonial\CollectionFactory;
use Magento\Framework\App\RequestInterface;

class DataProvider extends AbstractDataProvider
{
    /**
     * Loaded data cache
     *
     * @var array
     */
    private array $loadedData = [];

    /**
     * Request object
     *
     * @var RequestInterface
     */
    private RequestInterface $request;

    /**
     * Constructor
     *
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $collectionFactory
     * @param RequestInterface $request
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        string $name,
        string $primaryFieldName,
        string $requestFieldName,
        CollectionFactory $collectionFactory,
        RequestInterface $request,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $collectionFactory->create();
        $this->request = $request;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * Get form data
     *
     * @return array
     */
    public function getData(): array
    {
        if (!empty($this->loadedData)) {
            return $this->loadedData;
        }

        $id = (int)$this->request->getParam($this->getRequestFieldName());

        if ($id) {
            $testimonial = $this->collection->getItemById($id);

            if ($testimonial) {
                $data = $testimonial->getData();

                /**
                 * Image field normalization (CRITICAL)
                 */
                if (!empty($data['profile_pic'])) {
                    $data['profile_pic'] = [
                        [
                            'name' => $data['profile_pic'],
                            'url'  => $this->getMediaUrl() . 'testimonial/' . $data['profile_pic']
                        ]
                    ];
                }

                $this->loadedData[$testimonial->getId()] = $data;
            }
        }

        return $this->loadedData;
    }

    /**
     * Get media base url
     *
     * @return string
     */
    private function getMediaUrl(): string
    {
        return $this->collection
            ->getConnection()
            ->getConfig()['host']
            ? '' // not used directly
            : '';
    }
}
