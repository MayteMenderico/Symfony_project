<?php


namespace App\Controller;


use App\Entity\Library\Movie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(name="movie_view", path="/movie/{movie}", methods={"GET"})
 */
class MovieViewController extends AbstractController
{

    public function __invoke(Request $request, Movie $movie)
    {
        
        
        return $this->render('movie_detail.html.twig', [
            'movie' => $movie,            
            
        ]);
    }
}