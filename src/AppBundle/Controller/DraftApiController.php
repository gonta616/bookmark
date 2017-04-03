<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Item;
use AppBundle\Form\ItemType;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\RouteResource;

/**
 * @RouteResource("Draft", pluralize=false)
 */
class DraftApiController extends FOSRestController
{
    public function postAction(Request $request)
    {
        $item = new Item();
        $form = $this->createForm(ItemType::class, $item, array('method' => "POST"));
        $form->handleRequest($request);

        if ($form->isValid()) {
            $item->setUser($this->getUser());
            return $this->get('draft_util')->post($item);
        }
        else {
            return $item;
        }
    }

    public function patchAction(Request $request, Item $item)
    {
        $form = $this->createForm(ItemType::class, $item, array('method' => "PATCH"));
        $form->handleRequest($request);

        if ($form->isValid()){
            return $this->get('draft_util')->patch($item);
        }
        else {
            return $item;
        }
    }
}
