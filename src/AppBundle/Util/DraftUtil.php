<?php

namespace AppBundle\Util;

use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Draft;

class DraftUtil
{
    private $em;
    private $parameters;

    public function __construct($parameters, EntityManager $entityManager)
    {
        $this->parameters = $parameters;
        $this->em = $entityManager;
    }

    public function getItems()
    {

    }

    public function post($item)
    {
        $this->em->persist($item);
        $this->em->flush();

        return $item;
    }

    public function patch($item)
    {
        $this->em->persist($item);
        $this->em->flush();

        return $item;
    }

}
