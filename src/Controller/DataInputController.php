<?php

namespace App\Controller;

use App\Entity\Reisgegevens;
use App\Form\ReisgegevensType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class DataInputController extends AbstractController
{
    private $token;

    public function __construct(TokenStorageInterface $token)
    {
    $this->token = $token;
    }

    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('data_input/index.html.twig', [
            'controller_name' => 'DataInputController',
        ]);
    }

    #[Route('/data_input', name: 'app_data_input')]
    public function invoerReisgegevens(Request $request, ManagerRegistry $doctrine, ValidatorInterface $validator): Response{
        $reisgegevens = new Reisgegevens();
        $errormsg="";
        //Formular
        $form = $this->createForm(ReisgegevensType::class, $reisgegevens);
        $form->handleRequest($request);        

        if($form->isSubmitted()&&$form->isValid()){
            //EntityManager
            $user = $this->token->getToken()->getUser();
            $reisgegevens->setWerknemerId($user);
            $errors = $validator->validate($reisgegevens);
            if (count($errors) > 0) {
                if($reisgegevens->getHeen()){
                    $errormsg=("deze datum is al gebruikt voor de heen reis");
                }else{
                    $errormsg=("deze datum is al gebruikt voor de terug reis");
                }       
                
            }else{
                $em = $doctrine->getManager();
                $em->persist($reisgegevens);
                $em->flush();
                $this->session->getFlashBag()->add('success', 'user.logout');
                return $this->redirect($this->generateUrl('app_weergave_reisgegevens'));
                //return new Response('Uw reisgegevens zijn opgeslagen!');
            }
            
        }

        //Response
        return $this->render('data_input/invoer.html.twig', [
            'errormsg'=>$errormsg,
            'reisgegevensForm' => $form->createView(),
        ]);
    }
}
