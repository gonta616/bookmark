<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Item;
use AppBundle\Form\ItemType;
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

}
