<?php
declare(strict_types=1);

namespace Kiwi\Testimonials\Console\Command;

use Magento\Framework\Console\Cli;
use Magento\Framework\Filesystem\Driver\File;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Kiwi\Testimonials\Api\TestimonialRepositoryInterface;
use Kiwi\Testimonials\Api\Data\TestimonialInterfaceFactory;

/**
 * Import testimonials from CSV file CLI command
 */
class ImportTestimonials extends Command
{
    /**
     * CLI argument name for file path
     */
    public const ARG_FILE = 'file';

    /**
     * Testimonial repository
     *
     * @var TestimonialRepositoryInterface
     */
    private TestimonialRepositoryInterface $testimonialRepository;

    /**
     * Testimonial data object factory
     *
     * @var TestimonialInterfaceFactory
     */
    private TestimonialInterfaceFactory $testimonialFactory;

    /**
     * File driver
     *
     * @var File
     */
    private File $fileDriver;

    /**
     * @param TestimonialRepositoryInterface $testimonialRepository
     * @param TestimonialInterfaceFactory $testimonialFactory
     * @param File $fileDriver
     */
    public function __construct(
        TestimonialRepositoryInterface $testimonialRepository,
        TestimonialInterfaceFactory $testimonialFactory,
        File $fileDriver
    ) {
        parent::__construct();
        $this->testimonialRepository = $testimonialRepository;
        $this->testimonialFactory = $testimonialFactory;
        $this->fileDriver = $fileDriver;
    }

    /**
     * Configure CLI command
     *
     * @return void
     */
    protected function configure()
    {
        $this->setName('kiwi:testimonials:import')
            ->setDescription('Import testimonials from CSV file')
            ->addArgument(
                self::ARG_FILE,
                InputArgument::REQUIRED,
                'CSV file path'
            );
    }

    /**
     * Execute CLI command
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $filePath = (string)$input->getArgument(self::ARG_FILE);

        if (!$this->fileDriver->isExists($filePath)) {
            $output->writeln('<error>File not found</error>');
            return Cli::RETURN_FAILURE;
        }

        $content = $this->fileDriver->fileGetContents($filePath);
        $rows = array_map('str_getcsv', explode("\n", trim($content)));

        if (empty($rows)) {
            $output->writeln('<error>CSV file is empty</error>');
            return Cli::RETURN_FAILURE;
        }

        $header = array_shift($rows);
        $count = 0;

        foreach ($rows as $row) {
            if (count($row) !== count($header)) {
                continue;
            }

            $data = array_combine($header, $row);

            $testimonial = $this->testimonialFactory->create();
            $testimonial->setCompanyName($data['company_name'] ?? '');
            $testimonial->setName($data['name'] ?? '');
            $testimonial->setPost($data['post'] ?? '');
            $testimonial->setMessage($data['message'] ?? '');
            $testimonial->setStatus((int)($data['status'] ?? 1));
            $testimonial->setProfilePic($data['profile_pic'] ?? null);

            $this->testimonialRepository->save($testimonial);
            $count++;
        }

        $output->writeln(
            sprintf('<info>%d testimonial(s) imported.</info>', $count)
        );

        return Cli::RETURN_SUCCESS;
    }
}
