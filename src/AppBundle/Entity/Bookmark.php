<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BookmarkRepository")
 * @ExclusionPolicy("all")
 */
class Bookmark
{
    /**
     * @ORM\Id
     * @ORM\Column(type="bigint")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Expose
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $url;

    /**
     * @ORM\ManyToMany(targetEntity="Term", inversedBy="bookmarks")
     */
    protected $terms;

    /**
     * @ORM\OneToMany(targetEntity="Word" , mappedBy="bookmark", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    protected $words;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="bookmarks")
     */
    protected $user;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $publishedDate;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updateDate;

    public function __construct()
    {
        $this->terms = new ArrayCollection();
        $this->words = new ArrayCollection();
    }

    /**
     * Get the value of Id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of Id
     *
     * @param mixed id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of Url
     *
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set the value of Url
     *
     * @param mixed url
     *
     * @return self
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get the value of Terms
     *
     * @return mixed
     */
    public function getTerms()
    {
        return $this->terms;
    }

    /**
     * Set the value of Terms
     *
     * @param mixed terms
     *
     * @return self
     */
    public function setTerms($terms)
    {
        $this->terms = $terms;

        return $this;
    }

    /**
     * Get the value of User
     *
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of User
     *
     * @param mixed user
     *
     * @return self
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get the value of Words
     *
     * @return mixed
     */
    public function getWords()
    {
        return $this->words;
    }

    /**
     * Set the value of Words
     *
     * @param mixed words
     *
     * @return self
     */
    public function setWords($words)
    {
        $this->words = $words;

        return $this;
    }


    /**
     * Get the value of Update Date
     *
     * @return mixed
     */
    public function getUpdateDate()
    {
        return $this->updateDate;
    }

    /**
     * Set the value of Update Date
     *
     * @param mixed updateDate
     *
     * @return self
     */
    public function setUpdateDate($updateDate)
    {
        $this->updateDate = $updateDate;

        return $this;
    }

    /**
     * Get the value of Published Date
     *
     * @return mixed
     */
    public function getPublishedDate()
    {
        return $this->publishedDate;
    }

    /**
     * Set the value of Published Date
     *
     * @param mixed publishedDate
     *
     * @return self
     */
    public function setPublishedDate($publishedDate)
    {
        $this->publishedDate = $publishedDate;

        return $this;
    }
}
