<?php
declare(strict_types=1);

namespace Kiwi\Testimonials\Model\Resolver;

use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Kiwi\Testimonials\Api\TestimonialRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;

class Testimonials implements ResolverInterface
{
    private $repository;
    private SearchCriteriaBuilder $searchCriteriaBuilder;

    public function __construct(
        TestimonialRepositoryInterface $repository,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->repository = $repository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }


    public function resolve(
        $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    ) {

        // 👉 If ID provided → fetch single record
        if (isset($args['id'])) {

            $testimonial = $this->repository->getById((int)$args['id']);

            // return as array because schema expects list
            return [$testimonial->getData()];
        }

        // 👉 Otherwise fetch all
        $searchCriteria = $this->searchCriteriaBuilder->create();

        $result = $this->repository->getList($searchCriteria);

        $data = [];

        foreach ($result->getItems() as $item) {
            $data[] = $item->getData();
        }

        return $data;
    }

}
