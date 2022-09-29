<?php

namespace App\Controller;

use App\Entity\Person;
use App\Form\PersonType;
use App\Repository\PersonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/user', name: 'user_')]
class UserController extends AbstractController
{
    public function __construct(private PersonRepository $personRepository)
    {
    }

    #[Route('/create', name: 'create')]
    public function create(
        Request $request,
        PersonRepository $personRepository
        ): Response {
            $person = new Person();
            $form = $this->createForm(PersonType::class, $person);

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {

                $personRepository->save($person, true);
                $this->addFlash('success', 'Personne ajoutée');
                return $this->redirectToRoute('user_create');
        }


        return $this->render('user/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}