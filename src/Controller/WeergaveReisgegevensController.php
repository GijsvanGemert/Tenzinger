<?php

namespace App\Controller;

use App\Form\WeergaveZoekerType;
use App\Repository\ReisgegevensRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\VarExporter\Internal\Values;

class WeergaveReisgegevensController extends AbstractController
{
    #[Route('/weergave', name: 'app_weergave_reisgegevens')]
    public function index(ReisgegevensRepository $rg, Request $request): Response
    {
        $reisgegevens = $rg->findAll();
        $form = $this->createForm(WeergaveZoekerType::class/*,$reisgegevens*/);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $id = $form["werknemer_id"]->getData()->getId();
            return $this->redirect($this->generateUrl("app_weergave_reisgegevens_id", ["id"=>$id]));
        }
        return $this->render('weergave_reisgegevens/index.html.twig', [
            'reisgegevens' => $reisgegevens,
            'makeForm'=>$form->createView()
        ]);
    }
    #[Route('/weergave/id/{id}', name: 'app_weergave_reisgegevens_id')]
    public function indexbyid(ReisgegevensRepository $rg, int $id, Request $request): Response
    {
        $reisgegevens = $rg->findBy(['werknemer_id' => $id]);
        $form = $this->createForm(WeergaveZoekerType::class/*,$reisgegevens*/);
        $form->handleRequest($request);
        return $this->render('weergave_reisgegevens/index.html.twig', [
            'reisgegevens' => $reisgegevens,
            'makeForm'=>$form->createView()
        ]);
    }
    #[Route('/weergave/groupby', name: 'app_weergave_reisgegevens_groupby')]
    public function groupbyid(ReisgegevensRepository $rg,  Request $request): Response
    {
        $reisgegevens = $rg->groupByID();
        $form = $this->createForm(WeergaveZoekerType::class/*,$reisgegevens*/);
        $form->handleRequest($request);
        return $this->render('weergave_reisgegevens/index.html.twig', [
            'reisgegevens' => $reisgegevens,
            'makeForm'=>$form->createView()
        ]);
    }
}
