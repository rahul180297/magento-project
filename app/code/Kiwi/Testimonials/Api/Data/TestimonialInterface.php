<?php
declare(strict_types=1);

namespace Kiwi\Testimonials\Api\Data;

/**
 * Testimonial data interface
 */
interface TestimonialInterface
{
    /**#@+
     * Constants for keys of data array
     */
    public const ID = 'id';
    public const COMPANY_NAME = 'company_name';
    public const NAME = 'name';
    public const MESSAGE = 'message';
    public const POST = 'post';
    public const PROFILE_PIC = 'profile_pic';
    public const STATUS = 'status';
    public const CREATED_AT = 'created_at';
    public const UPDATED_AT = 'updated_at';
    /**#@-*/

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Set ID
     *
     * @param int $id
     * @return $this
     */
    public function setId($id);

    /**
     * Get company name
     *
     * @return string|null
     */
    public function getCompanyName();

    /**
     * Set company name
     *
     * @param string $companyName
     * @return $this
     */
    public function setCompanyName($companyName);

    /**
     * Get name
     *
     * @return string|null
     */
    public function getName();

    /**
     * Set name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name);

    /**
     * Get message
     *
     * @return string|null
     */
    public function getMessage();

    /**
     * Set message
     *
     * @param string $message
     * @return $this
     */
    public function setMessage($message);

    /**
     * Get post / designation
     *
     * @return string|null
     */
    public function getPost();

    /**
     * Set post / designation
     *
     * @param string|null $post
     * @return $this
     */
    public function setPost($post);

    /**
     * Get profile picture
     *
     * @return string|null
     */
    public function getProfilePic();

    /**
     * Set profile picture
     *
     * @param string|null $profilePic
     * @return $this
     */
    public function setProfilePic($profilePic);

    /**
     * Get status
     *
     * @return int
     */
    public function getStatus();

    /**
     * Set status
     *
     * @param int $status
     * @return $this
     */
    public function setStatus($status);

    /**
     * Get created at
     *
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Get updated at
     *
     * @return string|null
     */
    public function getUpdatedAt();
}
