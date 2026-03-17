<?php
declare(strict_types=1);

namespace Kiwi\Testimonials\Model\Resolver;

use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Kiwi\Testimonials\Api\TestimonialRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;

class DeleteTestimonial implements ResolverInterface
{
    private TestimonialRepositoryInterface $repository;

    public function __construct(
        TestimonialRepositoryInterface $repository
    ) {
        $this->repository = $repository;
    }

    public function resolve(
        $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    ) {

        if (empty($args['id'])) {
            throw new GraphQlInputException(__('ID is required.'));
        }

        try {
            return $this->repository->deleteById((int)$args['id']);
        } catch (NoSuchEntityException $e) {
            throw new GraphQlNoSuchEntityException(__('Testimonial not found.'));
        }
    }
}
