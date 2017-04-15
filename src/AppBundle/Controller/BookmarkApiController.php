<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Bookmark;
use AppBundle\Form\BookmarkType;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\RouteResource;

/**
 * @RouteResource("Bookmark", pluralize=false)
 */
 class BookmarkApiController extends FOSRestController
 {
     public function postAction(Request $request)
     {
         $bookmark = new Bookmark();
         $form = $this->createForm(BookmarkType::class, $bookmark, array('method' => "POST"));
         $form->handleRequest($request);

         if ($form->isValid()) {
             $bookmark->setUser($this->getUser());
             $this->get('bookmark_util')->post($bookmark);
         }
         else {
             return $form;
         }
     }

     public function patchAction(Request $request, Bookmark $Bookmark)
     {
         $form = $this->createForm(BookmarkType::class, $bookmark, array('method' => "PATCH"));
         $form->handleRequest($request);

         if ($form->isValid()){
             $this->get('bookmark_util')->post($bookmark);
         }
         else {
             return $form;
         }
     }
 }
