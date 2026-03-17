<?php
declare(strict_types=1);

namespace Kiwi\Testimonials\Test\Integration\Model;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\TestCase;
use Kiwi\Testimonials\Api\TestimonialRepositoryInterface;
use Kiwi\Testimonials\Api\Data\TestimonialInterfaceFactory;

/**
 * Integration test for testimonial CRUD operations
 *
 * @magentoDbIsolation enabled
 * @magentoAppIsolation enabled
 */
class TestimonialCrudTest extends TestCase
{
    /**
     * Testimonial repository
     *
     * @var TestimonialRepositoryInterface
     */
    private TestimonialRepositoryInterface $repository;

    /**
     * Testimonial data factory
     *
     * @var TestimonialInterfaceFactory
     */
    private TestimonialInterfaceFactory $factory;

    /**
     * Set up test dependencies
     *
     * @return void
     */
    protected function setUp(): void
    {
        $objectManager = Bootstrap::getObjectManager();
        $this->repository = $objectManager->get(TestimonialRepositoryInterface::class);
        $this->factory = $objectManager->get(TestimonialInterfaceFactory::class);
    }

    /**
     * Test create, read, update and delete testimonial
     *
     * @return void
     */
    public function testCreateReadUpdateDelete(): void
    {
        // Create
        $testimonial = $this->factory->create();
        $testimonial->setCompanyName('ABC Ltd');
        $testimonial->setName('John Doe');
        $testimonial->setMessage('Great service');
        $testimonial->setStatus(1);

        $this->repository->save($testimonial);
        $this->assertNotNull($testimonial->getId());

        // Read
        $loaded = $this->repository->getById((int)$testimonial->getId());
        $this->assertEquals('John Doe', $loaded->getName());

        // Update
        $loaded->setName('Jane Doe');
        $this->repository->save($loaded);

        $updated = $this->repository->getById((int)$loaded->getId());
        $this->assertEquals('Jane Doe', $updated->getName());

        // Delete
        $this->repository->deleteById((int)$loaded->getId());

        $this->expectException(NoSuchEntityException::class);
        $this->repository->getById((int)$loaded->getId());
    }
}
