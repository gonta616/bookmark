<?php

namespace AppBundle\Util;

use Doctrine\ORM\EntityManager;

class TaxonomyUtil
{
    private $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function getTaxonomyByName($name = null)
    {
        if(!empty($name))
            $this->em->getRepository('AppBundle:Taxonomy')->findOneByName($name);
        else
            return null;
    }

    public function getTaxonomyByType($type = null)
    {
        if(!empty($type))
            return $this->em->getRepository('AppBundle:Taxonomy')->findBy(array('type'=>$type),array('type'=>'ASC'));
        else
            return $this->em->getRepository('AppBundle:Taxonomy')->findBy(array(),array('type'=>'ASC'));
    }
}
