<?php

namespace App\Controller;

use App\Entity\Security\User;
use App\Type\Security\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route(name="profile", methods={"GET", "POST"}, path="/profile")
 */
class ProfilerController extends AbstractController
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    /**
     * @var TokenStorageInterface
     */
    private $token;

    /**
     * FormAction constructor.
     * @param UserPasswordEncoderInterface $encoder
     */
    public function __construct(UserPasswordEncoderInterface $encoder, TokenStorageInterface $token)
    {
        $this->encoder = $encoder;
        $this->token = $token;
    }

    public function __invoke(Request $request)
    {
        $form = $this->createForm(UserType::class, $this->token->getToken()->getUser());
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

            $this->addFlash('OK', 'Profile saved!');

            return $this->redirectToRoute('movies');
        }

        return $this->render('profiler.html.twig', [
            'register' => $form->createView()
        ]);
    }
}