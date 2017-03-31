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
     * @ORM\OneToMany(targetEntity="Blog" , mappedBy="user", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    protected $blog;

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
     * Get the value of Blog
     *
     * @return mixed
     */
    public function getBlog()
    {
        return $this->blog;
    }

    /**
     * Set the value of Blog
     *
     * @param mixed blog
     *
     * @return self
     */
    public function setBlog($blog)
    {
        $this->blog = $blog;

        return $this;
    }

}
