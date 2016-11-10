<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;
use Webmasters\Doctrine\ORM\Util;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id = 0;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    protected $email = '';

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $password = '';

    /**
     * @ORM\OneToMany(targetEntity="Article", mappedBy="user")
     */
    protected $articles;

    public function __construct(array $data = array())
    {
        Util\ArrayMapper::setEntity($this)->setData($data);
        $this->articles = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        return $this->getEmail();
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
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