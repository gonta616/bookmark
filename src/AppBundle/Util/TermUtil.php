<?php

namespace AppBundle\Util;

use AppBundle\Entity\Term;
use Doctrine\ORM\EntityManager;
use Knp\Component\Pager\Paginator;
use Lexik\Bundle\FormFilterBundle\Filter\FilterBuilderUpdater;

class TermUtil
{
    private $em;
    private $parameters;
    private $pagenator;
    private $fbu;

    public function __construct($parameters, EntityManager $entityManager,Paginator $paginator, FilterBuilderUpdater $fbu)
    {
        $this->parameters = $parameters;
        $this->em = $entityManager;
        $this->paginator = $paginator;
        $this->fbu = $fbu;
    }

    public function getTerm($page, $filter, $user_id = null)
    {
        $qb = $this->em->getRepository('AppBundle:Term')->getTermQueryBuilder($user_id);

        if (!empty($filter) && $filter->isValid())
        {
            $this->$this->fbu->setParts(array(
                '__root__'  => 't',
                't.user' => 'u'
            ));
            $this->fbu->addFilterConditions($filter, $qb);
        }

        return $this->paginator->paginate(
            $qb->getQuery(),
            $page,
            $this->parameters['term_per_page']
        );
    }

    public function post($term)
    {
        dump($term);
        $this->em->persist($term);
        $this->em->flush();

        return $term;
    }

    public function patch($term)
    {
        $this->em->persist($term);
        $this->em->flush();

        return $term;
    }

}
