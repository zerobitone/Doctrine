<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;
use Webmasters\Doctrine\ORM\Util;

/**
 * @ORM\Entity
 * @ORM\Table(name="tags")
 */
class Tag
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id = 0;

    /**
     * @ORM\Column(type="string", length=25, unique=true)
     */
    protected $title = '';

    /**
     * @ORM\ManyToMany(targetEntity="Article", mappedBy="tags")
     */
    protected $articles;

    public function __construct(array $data = array())
    {
        Util\ArrayMapper::setEntity($this)->setData($data);
        $this->articles = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getArticles()
    {
        return $this->articles;
    }

    /* Delegator-Metohen statt setArticles() */

    public function clearArticles()
    {
        $this->articles->clear();
    }

    public function addArticle(Article $article)
    {
        $this->articles->add($article);
    }

    public function hasArticle(Article $article)
    {
        return $this->articles->contains($article);
    }

    public function removeArticle(Article $article)
    {
        $this->articles->removeElement($article);
    }

}