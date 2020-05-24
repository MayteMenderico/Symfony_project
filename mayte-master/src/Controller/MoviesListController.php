<?php


namespace App\Controller;


use App\Entity\Library\Movie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(name="movies", path="/movies", methods={"GET"})
 */
class MoviesListController extends AbstractController
{

    public function __invoke(Request $request)
    {
        $list = $this->getDoctrine()->getRepository(Movie::class)
            ->getFiltredMovies($request->get('title'), $request->get('actor'));
        
        return $this->render('movies.html.twig', [
            'list' => $list,            
            'page' => $request->get('page', 1)
        ]);
    }
}