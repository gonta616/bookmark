<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Item;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


/**
 * @Route("/drafts")
 */
class DraftController extends Controller
{
    /**
     * @Route("/", name="draft_index")
     * @Method("GET")
     * @Template
     */
    public function indexAction(Request $request)
    {
        return;
    }

    /**
     * @Route("/create", name="draft_create")
     * @Method("GET")
     * @Template
     */
    public function createAction(Request $request)
    {
        return;
    }

    /**
     * @Route("/update/{item}", name="draft_upload")
     * @Method("GET")
     * @Template
     */
    public function updateAction(Request $request, Item $item)
    {
        return;
    }

}
