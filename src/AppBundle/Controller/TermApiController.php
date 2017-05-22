<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Taxonomy;
use AppBundle\Entity\Term;
use AppBundle\Form\TermType;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use Symfony\Component\HttpFoundation\Request;

/**
 * @RouteResource("Term", pluralize=false)
 */
class TermApiController extends FOSRestController
{
    public function postAction(Request $request)
    {
        $term = new Term();
        $term->setName($request->get('value'));
        $term->getTaxonomy($this->get('taxonomy_util')->getTaxonomyByName($request->get('taxonomy_name')));

        if ($this->getUser())
        {
            $term->setUser($this->getUser());
        }
        return $this->get('term_util')->post($term);
    }
}
