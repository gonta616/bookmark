<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 * @ExclusionPolicy("all")
 */
class Taxonomy
{
    const TYPE_CATEGORY = 1;
    const TYPE_SYSTEM = 2;
    const TYPE_TAG = 3;

    /**
     * @ORM\Id
     * @ORM\Column(type="bigint")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /** @ORM\Column(type="string", length=128)
     * @Assert\Length(min = 1, max = 128)
     * @Assert\NotBlank(message="form.not_blank")
     */
    protected $name;

    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="Term", mappedBy="taxonomy", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    protected $terms;

    /**
     * @ORM\Column(name="type", type="integer")
     */
    protected $type=Taxonomy::TYPE_TAG;

    public function __construct()
    {
        $this->terms = new ArrayCollection();
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
     * Get the value of Name
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of Name
     *
     * @param mixed name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of Terms
     *
     * @return Collection
     */
    public function getTerms()
    {
        return $this->terms;
    }

    /**
     * Set the value of Terms
     *
     * @param Collection terms
     *
     * @return self
     */
    public function setTerms(Collection $terms)
    {
        $this->terms = $terms;

        return $this;
    }

    /**
     * Get the value of Type
     *
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of Type
     *
     * @param mixed type
     *
     * @return self
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

}
