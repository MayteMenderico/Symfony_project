<?php

namespace App\Controller;

use App\Entity\Security\User;
use App\Type\Security\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route(name="login_register", methods={"GET", "POST"}, path="/login/register")
 */
class LoginRegisterController extends AbstractController
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    /**
     * FormAction constructor.
     * @param UserPasswordEncoderInterface $encoder
     */
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function __invoke(Request $request)
    {
        $form = $this->createForm(UserType::class);
        $form->handleRequest($request);
        

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var User $user */
            $user = $form->getData();            
            $user->setEnabled(true);
            $user->setPassword(
                $this->encoder->encodePassword(
                    $user,
                    $user->getPassword()
                )
            );

            $manager = $this->getDoctrine()->getManager();
            $manager->persist($user);
            $manager->flush();
          

            $this->addFlash('OK', 'User saved!');

            return $this->redirectToRoute('home');
        }

        return $this->render('login-register.html.twig', [
            'register' => $form->createView()
        ]);
    }
}