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
 * @ExclusionPolicy("all")
 */
class Comment
{

    function __construct(argument)
    {
        # code...
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="bigint")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Expose
     */
    protected $id;

    /**
     * @ORM\Column(type="text")
     */
    protected $comment;

    /**
     * * @ORM\Column(type="datetime")
     */
    protected $publishDate;

    /**
     * * @ORM\Column(type="datetime")
     */
    protected $updateDate;

    /**
     * @ORM\ManyToOne(targetEntity="Item", insertBy="comments")
     */
    protected $item;


    protected $user;

}
