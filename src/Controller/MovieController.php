<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Form\MovieType;
use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/movie', name: 'movie_')]
class MovieController extends AbstractController
{
    public function __construct(private MovieRepository $movieRepository)
    {
    }

    #[Route('/list', name: 'list')]
    public function list(MovieRepository $movieRepository): Response
    {
        $movies = $movieRepository->findBy([], ['title' => 'ASC']);
        return $this->render('movie/list.html.twig', [
            'movies' => $movies,
        ]);
    }

    #[Route('/create', name: 'create')]
    public function create(
        Request $request,
        MovieRepository $movieRepository
        ): Response {
            $movie = new Movie();
            $form = $this->createForm(MovieType::class, $movie);

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {

                $movieRepository->save($movie, true);
                $this->addFlash('success', 'Film ajouté');
                return $this->redirectToRoute('movie_create');
        }


        return $this->render('movie/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public function count(
        MovieRepository $movieRepository
        ): Response {
            $countRepository = $this->getDoctrine()->getRepository(MovieType::class, $movie);
            $count = $movieRepository->count();
            
        }
}
