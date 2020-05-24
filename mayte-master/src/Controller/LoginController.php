<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * @Route(name="login", methods={"GET"}, path="/login")
 * @Route(name="home", methods={"GET"}, path="/")
 */
class LoginController extends AbstractController
{

    public function __invoke(AuthenticationUtils $authenticationUtils)
    {
        $error = $authenticationUtils->getLastAuthenticationError();

        return $this->render('login.html.twig', ['error' => $error]);
    }
}