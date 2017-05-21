<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Taxonomy;
use AppBundle\Entity\Term;
use AppBundle\Form\TermType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class TermController extends Controller
{
    /**
     * @Route("/admin/term/{taxonomy}/{page}", name="term_index", requirements={"taxonomy" = "\d+", "page" = "\d+"})
     * @Method({"GET"})
     * @Template
     */
    public function indexAction(Request $request, Taxonomy $taxonomy, $page = 1)
    {
        return;
    }

    /**
     * @Route("/admin/term/create/{taxonomy}", name="term_create")
     * @Method({"GET"})
     * @Template
     */
    public function postAction(Request $request, Taxonomy $taxonomy)
    {
        // @Template("@App/Term/form.html.twig")
        $term = new Term();
        $term->setTaxonomy($taxonomy);
        $formOptions = array(
            'action' => $this->generateUrl('post_term',array('taxonomy'=>$taxonomy->getId())),
        );
        $form = $this->createForm(TermType::class, $term, $formOptions);
        return array('form'=>$form->createView());
    }

    /**
     * @Route("/admin/term/update/{term}", name="term_update")
     * @Method({"GET"})
     * @Template
     */
    public function updateAction(Request $request, Term $term)
    {
        // * @Template("@App/Term/form.html.twig")
        $formOptions = array(
            'action' => $this->generateUrl('patch_term', array('term'=>$term->getId())),
            'method' => 'PATCH'
        );
        $form = $this->createForm(TermType::class, $term, $formOptions);
        return array('form'=>$form->createView());        
    }
}
