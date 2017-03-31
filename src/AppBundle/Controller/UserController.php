<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class UserController extends Controller
{
    /**
     * @Route("/login", name="user_login")
     * @Method("GET")
     * @Template("@App/User/login.html.twig")
     */
    public function loginAction(Request $request)
    {
        return;
    }

    /**
     * @Route("/create", name="user_create")
     * @Method("GET")
     * @Template
     */
    public function createAction(Request $request)
    {
        return;
    }

}
