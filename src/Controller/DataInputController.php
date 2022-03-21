<?php

namespace App\Controller;

use App\Entity\Reisgegevens;
use App\Form\ReisgegevensType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/data_input', name: 'app_data_input')]
class DataInputController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('data_input/index.html.twig', [
            'controller_name' => 'DataInputController',
        ]);
    }

    #[Route('/invoer', name: 'invoer')]
    public function invoerReisgegevens(Request $request, ManagerRegistry $doctrine): Response{
        $reisgegevens = new Reisgegevens();
        
        //Formular
        $form = $this->createForm(ReisgegevensType::class, $reisgegevens);
        $form->handleRequest($request);

        if($form->isSubmitted()){
            //EntityManager
            $em = $doctrine->getManager();
            $em->persist($reisgegevens);
            $em->flush();

            return new Response('Uw reisgegevens zijn opgeslagen!');
        }

        //Response
        return $this->render('data_input/invoer.html.twig', [
            'reisgegevensForm' => $form->createView(),
        ]);
    }
}
