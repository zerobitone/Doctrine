<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Webmasters\Doctrine\ORM\Util;


/**
 * @ORM\Entity
 * @ORM\Table(name="articles")
 */
class Article
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id = 0;

    /**
     * @ORM\Column(type="string", length=80)
     */
    protected $title = '';

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $teaser = '';

    /**
     * @ORM\Column(type="text")
     */
    protected $news = '';

    /**
     * @ORM\Column(name="created_at", type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    protected $createdAt;

    /**
     * @ORM\Column(name="publish_at", type="datetime")
     */
    protected $publishAt;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="articles")
     */
    protected $user;

    /**
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="articles")
     * @ORM\JoinTable(name="tagging")
     */
    protected $tags;

    public function __construct(array $data = array())
    {
        Util\ArrayMapper::setEntity($this)->setData($data);
        $this->tags = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        return $this->getTitle();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return Article
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTeaser()
    {
        return $this->teaser;
    }

    /**
     * @param mixed $teaser
     * @return Article
     */
    public function setTeaser($teaser)
    {
        $this->teaser = $teaser;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNews()
    {
        return $this->news;
    }

    /**
     * @param mixed $news
     * @return Article
     */
    public function setNews($news)
    {
        $this->news = $news;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return new Util\DateTime($this->createdAt);
    }

    /**
     * @return mixed
     */
    public function getPublishAt()
    {
        return new Util\DateTime($this->publishAt);
    }

    /**
     * @param mixed $publishAt
     * @return Article
     */
    public function setPublishAt($publishAt)
    {
        $this->publishAt = new Util\DateTime($publishAt);
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     * @return Article
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTags()
    {
        return $this->tags;
    }

    /* Delegator-Metohen statt setTags() */

    public function clearTags()
    {
        $this->tags->clear();
    }

    public function addTag(Tag $tag)
    {
        $this->tags->add($tag);
    }

    public function hasTag(Tag $tag)
    {
        return $this->tags->contains($tag);
    }

    public function removeTag(Tag $tag)
    {
        $this->tags->removeElement($tag);
    }

}