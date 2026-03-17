<?php
declare(strict_types=1);

namespace Kiwi\Testimonials\Model\Resolver;

use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Kiwi\Testimonials\Api\TestimonialRepositoryInterface;

class CreateTestimonial implements ResolverInterface
{
    private $repository;
    private $testimonialFactory;

    public function __construct(
        TestimonialRepositoryInterface $repository,
        \Kiwi\Testimonials\Api\Data\TestimonialInterfaceFactory $factory
    ) {
        $this->repository = $repository;
        $this->testimonialFactory = $factory;
    }

    public function resolve(
        $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    ) {

        // If ID exists → load existing record (UPDATE)
        if (!empty($args['id'])) {
            $testimonial = $this->repository->getById((int)$args['id']);
        } else {
            // Otherwise create new
            $testimonial = $this->testimonialFactory->create();
        }

        // Set data dynamically
        foreach ($args as $fieldName => $fieldValue) {

            if ($fieldName === 'id') {
                continue;
            }

            $method = 'set' . str_replace('_', '', ucwords($fieldName, '_'));

            if (method_exists($testimonial, $method)) {
                $testimonial->$method($fieldValue);
            }
        }

        $this->repository->save($testimonial);

        return $testimonial->getData();
    }

}
