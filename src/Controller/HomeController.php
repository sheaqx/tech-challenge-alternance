<?php

namespace App\Controller;

use App\Entity\Argonaute;
use App\Form\ArgonauteType;
use App\Repository\ArgonauteRepository;
// use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ArgonauteRepository $argonauteRepository, Request $request): Response
    {
        $argonautes = $argonauteRepository->findAll();

        $newArgonaute = new Argonaute();
        $form = $this->createForm(ArgonauteType::class, $newArgonaute);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $argonauteRepository->save($newArgonaute, true);
            $this->addFlash('success', 'Bienvenue à bord de l\'équipage moussaillon');
            return $this->redirectToRoute('app_home');
        }

        return $this->render('home/index.html.twig', [
            'argonautes' => $argonautes, 'form' => $form
        ]);
    }
}
