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

    /**
     * @ORM\Column(name="facebook_id", type="string", length=255, nullable=true)
     */
    private $facebookId;

    private $facebookAccessToken;

    /**
     * @ORM\OneToMany(targetEntity="Bookmark" , mappedBy="user", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    protected $bookmarks;

    /**
     * @ORM\OneToMany(targetEntity="Item" , mappedBy="user", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    protected $items;

    /**
     * @ORM\OneToMany(targetEntity="Comment" , mappedBy="user", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    protected $commnets;

    /**
     * @ORM\OneToMany(targetEntity="Request" , mappedBy="user", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    protected $requests;

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
     * Get the value of Item
     *
     * @return mixed
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * Set the value of Item
     *
     * @param mixed item
     *
     * @return self
     */
    public function setItem($item)
    {
        $this->item = $item;

        return $this;
    }

    /**
     * Get the value of Commnets
     *
     * @return mixed
     */
    public function getCommnets()
    {
        return $this->commnets;
    }

    /**
     * Set the value of Commnets
     *
     * @param mixed commnets
     *
     * @return self
     */
    public function setCommnets($commnets)
    {
        $this->commnets = $commnets;

        return $this;
    }

    /**
     * Get the value of Requests
     *
     * @return mixed
     */
    public function getRequests()
    {
        return $this->requests;
    }

    /**
     * Set the value of Requests
     *
     * @param mixed requests
     *
     * @return self
     */
    public function setRequests($requests)
    {
        $this->requests = $requests;

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
        return $this->facebookId;
    }

    /**
     * Set the value of Facebook Id
     *
     * @param mixed facebookId
     *
     * @return self
     */
    public function setFacebookId($facebookId)
    {
        $this->facebookId = $facebookId;

        return $this;
    }

    /**
     * Get the value of Facebook Access Token
     *
     * @return mixed
     */
    public function getFacebookAccessToken()
    {
        return $this->facebookAccessToken;
    }

    /**
     * Set the value of Facebook Access Token
     *
     * @param mixed facebookAccessToken
     *
     * @return self
     */
    public function setFacebookAccessToken($facebookAccessToken)
    {
        $this->facebookAccessToken = $facebookAccessToken;

        return $this;
    }

    /**
     * Get the value of Items
     *
     * @return mixed
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Set the value of Items
     *
     * @param mixed items
     *
     * @return self
     */
    public function setItems($items)
    {
        $this->items = $items;

        return $this;
    }

}
