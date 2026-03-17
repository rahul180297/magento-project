<?php
declare(strict_types=1);

namespace Kiwi\Testimonials\Test\Unit\Model;

use Kiwi\Testimonials\Model\ResourceModel\Testimonial;
use Kiwi\Testimonials\Model\Testimonial as TestimonialModel;
use Kiwi\Testimonials\Model\TestimonialFactory;
use Kiwi\Testimonials\Model\TestimonialRepository;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * Unit test for TestimonialRepository
 */
class TestimonialRepositoryTest extends TestCase
{
    /**
     * Repository under test
     *
     * @var TestimonialRepository
     */
    private TestimonialRepository $repository;

    /**
     * Resource model mock
     *
     * @var Testimonial|MockObject
     */
    private Testimonial|MockObject $resourceMock;

    /**
     * Factory mock
     *
     * @var TestimonialFactory|MockObject
     */
    private TestimonialFactory|MockObject $factoryMock;

    /**
     * Set up test dependencies
     *
     * @return void
     */
    protected function setUp(): void
    {
        $this->resourceMock = $this->createMock(Testimonial::class);
        $this->factoryMock = $this->createMock(TestimonialFactory::class);

        $this->repository = new TestimonialRepository(
            $this->resourceMock,
            $this->factoryMock
        );
    }

    /**
     * Test save method
     *
     * @return void
     */
    public function testSave(): void
    {
        $model = $this->createMock(TestimonialModel::class);

        $this->resourceMock
            ->expects($this->once())
            ->method('save')
            ->with($model);

        $result = $this->repository->save($model);

        $this->assertSame($model, $result);
    }
}
