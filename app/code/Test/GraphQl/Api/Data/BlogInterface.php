<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Test\GraphQl\Api\Data;

interface BlogInterface
{

    const AUTHOR = 'author';
    const UPDATED_AT = 'updated_at';
    const POST = 'post';
    const CREATED_AT = 'created_at';
    const IS_ACTIVE = 'is_active';
    const BLOG_ID = 'blog_id';

    /**
     * Get blog_id
     * @return string|null
     */
    public function getBlogId();

    /**
     * Set blog_id
     * @param string $blogId
     * @return \Test\GraphQl\Blog\Api\Data\BlogInterface
     */
    public function setBlogId($blogId);

    /**
     * Get post
     * @return string|null
     */
    public function getPost();

    /**
     * Set post
     * @param string $post
     * @return \Test\GraphQl\Blog\Api\Data\BlogInterface
     */
    public function setPost($post);

    /**
     * Get is_active
     * @return string|null
     */
    public function getIsActive();

    /**
     * Set is_active
     * @param string $isActive
     * @return \Test\GraphQl\Blog\Api\Data\BlogInterface
     */
    public function setIsActive($isActive);

    /**
     * Get author
     * @return string|null
     */
    public function getAuthor();

    /**
     * Set author
     * @param string $author
     * @return \Test\GraphQl\Blog\Api\Data\BlogInterface
     */
    public function setAuthor($author);

    /**
     * Get created_at
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Set created_at
     * @param string $createdAt
     * @return \Test\GraphQl\Blog\Api\Data\BlogInterface
     */
    public function setCreatedAt($createdAt);

    /**
     * Get updated_at
     * @return string|null
     */
    public function getUpdatedAt();

    /**
     * Set updated_at
     * @param string $updatedAt
     * @return \Test\GraphQl\Blog\Api\Data\BlogInterface
     */
    public function setUpdatedAt($updatedAt);
}

