<?php


namespace App\Controller;


use App\Entity\Library\Movie;
use App\Entity\Security\User;
use App\Type\Library\MovieType;
use App\Type\Security\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(name="movies_form", path="/movie/form", methods={"GET", "POST"})
 * @Route(name="movies_form_edit", path="/movie/form/{movie}", methods={"GET", "POST"})
 */
class MovieFormController extends AbstractController
{

    public function __invoke(Request $request, ?Movie $movie)

    {
        
        $form = $this->createForm(MovieType::class, $movie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($form->getData());
            $manager->flush();

            $this->addFlash('OK', 'Movie saved!');

            return $this->redirectToRoute('movies');
        }

        return $this->render('movie-form.html.twig', [
            'movie' => $form->createView()
        ]);
    }
}