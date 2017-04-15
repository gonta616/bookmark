<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Bookmark;
use AppBundle\Form\BookmarkType;
use Goutte\Client;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/bookmark")
 */
class BookmarkController extends Controller
{
    /**
     * @Route("/", name="bookmark_index")
     * @Method("GET")
     * @Template
     */
    public function indexAction(Request $request)
    {
        $client = new Client();
        $crawler = $client->request('GET', 'https://www.symfony.com/blog/');
        foreach ($crawler as $domElement) {
            dump($domElement);
        }
        return;
    }

    /**
     * @Route("/create")
     * @Method("GET")
     * @Template
     */
    public function createAction(Request $request)
    {
        return array('form'=>$this->createForm(BookmarkType::class, new Bookmark(), array(
            'action' => $this->generateUrl('post_bookmark'),
            'method' => 'POST'
        ))->createView());
    }

    /**
     * @Route("/update/{bookmark}")
     * @Method("GET")
     * @Template
     */
    public function updateAction(Request $request, Bookmark $bookmark)
    {
        return array('form'=>$this->createForm(BookmarkType::class, $bookmark, array(
            'action' => $this->generateUrl('patch_bookmark'),
            'method' => 'PATCH'
        ))->createView());
    }

}
