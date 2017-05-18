<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /** @ORM\Column(name="facebook_id", type="string", length=255, nullable=true) */
    protected $facebook_id;

    /** @ORM\Column(name="facebook_access_token", type="string", length=255, nullable=true) */
    protected $facebook_access_token;

    /** @ORM\Column(name="google_id", type="string", length=255, nullable=true) */
    protected $google_id;

    /** @ORM\Column(name="google_access_token", type="string", length=255, nullable=true) */
    protected $google_access_token;

    /** @ORM\Column(name="github_id", type="string", length=255, nullable=true) */
    protected $github_id;

    /** @ORM\Column(name="github_access_token", type="string", length=255, nullable=true) */
    protected $github_access_token;

    /**
     * @ORM\OneToMany(targetEntity="Bookmark" , mappedBy="user", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    protected $bookmarks;

    /**
     * @ORM\OneToMany(targetEntity="Term" , mappedBy="user", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    protected $terms;

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
     * Get the value of Bookmarks
     *
     * @return mixed
     */
    public function getBookmarks()
    {
        return $this->bookmarks;
    }

    /**
     * Set the value of Bookmarks
     *
     * @param mixed bookmarks
     *
     * @return self
     */
    public function setBookmarks($bookmarks)
    {
        $this->bookmarks = $bookmarks;

        return $this;
    }


    /**
     * Get the value of Facebook Id
     *
     * @return mixed
     */
    public function getFacebookId()
    {
        return $this->facebook_id;
    }

    /**
     * Set the value of Facebook Id
     *
     * @param mixed facebook_id
     *
     * @return self
     */
    public function setFacebookId($facebook_id)
    {
        $this->facebook_id = $facebook_id;

        return $this;
    }

    /**
     * Get the value of Facebook Access Token
     *
     * @return mixed
     */
    public function getFacebookAccessToken()
    {
        return $this->facebook_access_token;
    }

    /**
     * Set the value of Facebook Access Token
     *
     * @param mixed facebook_access_token
     *
     * @return self
     */
    public function setFacebookAccessToken($facebook_access_token)
    {
        $this->facebook_access_token = $facebook_access_token;

        return $this;
    }

    /**
     * Get the value of Google Id
     *
     * @return mixed
     */
    public function getGoogleId()
    {
        return $this->google_id;
    }

    /**
     * Set the value of Google Id
     *
     * @param mixed google_id
     *
     * @return self
     */
    public function setGoogleId($google_id)
    {
        $this->google_id = $google_id;

        return $this;
    }

    /**
     * Get the value of Google Access Token
     *
     * @return mixed
     */
    public function getGoogleAccessToken()
    {
        return $this->google_access_token;
    }

    /**
     * Set the value of Google Access Token
     *
     * @param mixed google_access_token
     *
     * @return self
     */
    public function setGoogleAccessToken($google_access_token)
    {
        $this->google_access_token = $google_access_token;

        return $this;
    }


    /**
     * Get the value of Github Id
     *
     * @return mixed
     */
    public function getGithubId()
    {
        return $this->github_id;
    }

    /**
     * Set the value of Github Id
     *
     * @param mixed github_id
     *
     * @return self
     */
    public function setGithubId($github_id)
    {
        $this->github_id = $github_id;

        return $this;
    }

    /**
     * Get the value of Github Access Token
     *
     * @return mixed
     */
    public function getGithubAccessToken()
    {
        return $this->github_access_token;
    }

    /**
     * Set the value of Github Access Token
     *
     * @param mixed github_access_token
     *
     * @return self
     */
    public function setGithubAccessToken($github_access_token)
    {
        $this->github_access_token = $github_access_token;

        return $this;
    }

}
