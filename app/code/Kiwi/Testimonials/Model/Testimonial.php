<?php
declare(strict_types=1);

namespace Kiwi\Testimonials\Model;

use Magento\Framework\Model\AbstractModel;
use Kiwi\Testimonials\Api\Data\TestimonialInterface;

/**
 * Testimonial model
 */
class Testimonial extends AbstractModel implements TestimonialInterface
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init(\Kiwi\Testimonials\Model\ResourceModel\Testimonial::class);
    }

    /**
     * Get testimonial ID
     *
     * @return int|null
     */
    public function getId(): ?int
    {
        $id = $this->getData(self::ID);
        return $id !== null ? (int)$id : null;
    }

    /**
     * Set testimonial ID
     *
     * @param int $id
     * @return $this
     */
    public function setId($id): self
    {
        return $this->setData(self::ID, $id);
    }

    /**
     * Get company name
     *
     * @return string|null
     */
    public function getCompanyName(): ?string
    {
        return $this->getData(self::COMPANY_NAME);
    }

    /**
     * Set company name
     *
     * @param string $companyName
     * @return $this
     */
    public function setCompanyName($companyName): self
    {
        return $this->setData(self::COMPANY_NAME, $companyName);
    }

    /**
     * Get name
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->getData(self::NAME);
    }

    /**
     * Set name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name): self
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Get message
     *
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->getData(self::MESSAGE);
    }

    /**
     * Set message
     *
     * @param string $message
     * @return $this
     */
    public function setMessage($message): self
    {
        return $this->setData(self::MESSAGE, $message);
    }

    /**
     * Get post / designation
     *
     * @return string|null
     */
    public function getPost(): ?string
    {
        return $this->getData(self::POST);
    }

    /**
     * Set post / designation
     *
     * @param string $post
     * @return $this
     */
    public function setPost($post): self
    {
        return $this->setData(self::POST, $post);
    }

    /**
     * Get profile picture path
     *
     * @return string|null
     */
    public function getProfilePic(): ?string
    {
        return $this->getData(self::PROFILE_PIC);
    }

    /**
     * Set profile picture path
     *
     * @param string|null $profilePic
     * @return $this
     */
    public function setProfilePic($profilePic): self
    {
        return $this->setData(self::PROFILE_PIC, $profilePic);
    }

    /**
     * Get status
     *
     * @return int
     */
    public function getStatus(): int
    {
        return (int)$this->getData(self::STATUS);
    }

    /**
     * Set status
     *
     * @param int $status
     * @return $this
     */
    public function setStatus($status): self
    {
        return $this->setData(self::STATUS, $status);
    }

    /**
     * Get creation time
     *
     * @return string|null
     */
    public function getCreatedAt(): ?string
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * Get update time
     *
     * @return string|null
     */
    public function getUpdatedAt(): ?string
    {
        return $this->getData(self::UPDATED_AT);
    }
}
