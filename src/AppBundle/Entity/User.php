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

    public function __construct()
    {
        parent::__construct();
        // your own logic
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

}
