<?php

namespace App\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as Doctrine;

/**
 * @Doctrine\Entity(repositoryClass="App\Repository\ArticleRepository")
 * @Doctrine\Table(name="article")
 * @Doctrine\HasLifecycleCallbacks()
 */
class Article
{
    /**
     * @var integer $id
     *
     * @Doctrine\Id()
     * @Doctrine\Column(type="smallint", options={"unsigned": true})
     * @Doctrine\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $title
     *
     * @Doctrine\Column(type="string", nullable=false)
     */
    private $title;

    /**
     * TODO:: add index
     * @var string $slug
     *
     * @Doctrine\Column(type="string", length=255, nullable=false)
     */
    private $slug;

    /**
     * @var string $content
     *
     * @Doctrine\Column(type="text", nullable=false)
     */
    private $content;

    /**
     * @var bool $name
     *
     * @Doctrine\Column(type="boolean", name="is_enabled")
     */
    private $isEnabled = true;

    /**
     * @var ArrayCollection|ArticleTags[] $tags
     *
     * @Doctrine\ManyToMany(targetEntity="App\Entity\ArticleTags")
     */
    private $tags;

    /**
     * @var DateTime $createdAt
     *
     * @Doctrine\Column(type="datetime", name="created_at")
     */

    private $createdAt;

    /**
     * @var DateTime|null $updatedAt
     *
     * @Doctrine\Column(type="datetime", name="updated_at", nullable=true)
     */
    private $updatedAt;

    public function __construct()
    {
        $this->createdAt = new DateTime();
        $this->tags      = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param ArticleTags[]|ArrayCollection $tags
     * @return Article
     */
    public function setTags($tags): Article
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @param ArticleTags $tag
     * @return Article
     */
    public function addTag(ArticleTags $tag): Article
    {
        $this->tags->add($tag);
        return $this;
    }

    /**
     * @param ArticleTags $tag
     * @return Article
     */
    public function removeTag(ArticleTags $tag): Article
    {
        $this->tags->removeElement($tag);
        return $this;
    }

    /**
     * @return ArticleTags[]|ArrayCollection
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param string $slug
     * @return Article
     */
    public function setSlug(string $slug): Article
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param string $title
     * @return Article
     */
    public function setTitle(string $title): Article
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $content
     * @return Article
     */
    public function setContent(string $content): Article
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->isEnabled;
    }

    /**
     * @param bool $isEnabled
     * @return Article
     */
    public function setIsEnabled(bool $isEnabled): Article
    {
        $this->isEnabled = $isEnabled;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * @return DateTime|null
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @Doctrine\PreUpdate()
     * @return void
     */
    public function setUpdatedAt()
    {
        $this->updatedAt = new DateTime();
    }
}