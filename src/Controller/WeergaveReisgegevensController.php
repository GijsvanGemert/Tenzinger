<?php

namespace App\Controller;

use App\Entity\Reisgegevens;
use App\Entity\User;
use App\Form\WeergaveZoekerType;
use App\Repository\ReisgegevensRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\VarExporter\Internal\Values;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\CsvEncoder;
use Doctrine\ORM\EntityManagerInterface;

class WeergaveReisgegevensController extends AbstractController
{

    #[Route('/weergave', name: 'app_weergave_reisgegevens')]
    public function index(ReisgegevensRepository $rg, Request $request): Response
    {
        $user = $this->getUser();
        $reisgegevens = $rg->findBy(['werknemer_id' => $user]);
        return $this->render('weergave_reisgegevens/index.html.twig', [
            'reisgegevens' => $reisgegevens
        ]);
    }



    /*
    #[Route('/weergave', name: 'app_weergave_reisgegevens')]
    public function index(ReisgegevensRepository $rg, Request $request): Response
    {
        $reisgegevens = $rg->findAll();
        $form = $this->createForm(WeergaveZoekerType::class);
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
        $form = $this->createForm(WeergaveZoekerType::class);
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

    */

    
    #[Route('/weergave/groupbyvervoer', name: 'app_weergave_reisgegevens_groupbyvervoer')]
    public function groupbyvervoer(ReisgegevensRepository $rg,  Request $request): Response
    {
        $user = $this->getUser();
        $userId=$user->getId();
        $reisgegevens = $rg->groupByVervoersmiddel($userId);
        //$reisgegevens = $rg->groupByDatum($userId);
        //$reisgegevens = $rg->orderByCompensatie($userId);
        return $this->render('weergave_reisgegevens/index.html.twig', [
            'reisgegevens' => $reisgegevens
        ]);
    }


    #[Route('/weergave/groupbydatum', name: 'app_weergave_reisgegevens_groupbydatum')]
    public function groupbydatum(ReisgegevensRepository $rg,  Request $request): Response
    {
        $user = $this->getUser();
        $userId=$user->getId();
        $reisgegevens = $rg->groupByDatum($userId);
        //$reisgegevens = $rg->groupByDatumAll();
        return $this->render('weergave_reisgegevens/index.html.twig', [
            'reisgegevens' => $reisgegevens
        ]);
    }

    #[Route('/weergave/groupby2', name: 'app_weergave_reisgegevens_groupby2')]
    public function groupbyid2(ReisgegevensRepository $rg,  Request $request): Response
    {
        $reisgegevens = $rg->groupByID();
        $tempmonth="";
        $tempyear="";
        $tempvervoersmiddel="";
        $tempArray=array();
        $counter=0;
        array_multisort(array_column($reisgegevens, 'werknemerId'), SORT_DESC,
            array_column($reisgegevens, 'year'), SORT_DESC,
                array_column($reisgegevens, 'month'),      SORT_DESC,
                $reisgegevens);
        foreach ($reisgegevens as $key => $value) {
            
            if($value["month"]==$tempmonth&&$value["year"]==$tempyear){
                $tempArray[$counter-1]["compensatie"]+=$value["compensatie"];
                $tempArray[$counter-1]["afstand"]+=$value["afstand"];
               if($tempvervoersmiddel!=$value["vervoersmiddel"]){
                    $tempArray[$counter-1]["vervoersmiddel"].=", ".$value["vervoersmiddel"];
               }
                $tempvervoersmiddel=$value["vervoersmiddel"];
            }else{
                $tempArray[$counter]=$value;
                $tempmonth=$value["month"];
                $tempyear=$value["year"];
                $tempvervoersmiddel=$value["vervoersmiddel"];
                $counter++;
            }
        }
        array_multisort(
            array_column($tempArray, 'year'), SORT_DESC,
                array_column($tempArray, 'month'),      SORT_DESC,
                array_column($tempArray, 'werknemerId'), SORT_DESC,
                $tempArray);
            // foreach ($tempArray as $key => $value) {
            //     echo 'the key is '.$key.'<br>';
            //     #$tempArray=array();
            //     foreach ($value as $key2 => $value2){
            //         echo 'the key is '.$key2.' en ';
            //         echo 'the value is '.$value2. "<br>";
            //         #$tempArray+=[$key2=> $value2];
            //     }
            //     #$reisgegevens2+=[$key=>$tempArray];
            // }
            
        $form = $this->createForm(WeergaveZoekerType::class);
        $form->handleRequest($request);
        return $this->render('weergave_reisgegevens/index.html.twig', [
            'reisgegevens' => $tempArray,
            'makeForm'=>$form->createView()
        ]);
    }

    

    #[Route('/weergave/download', name: 'app_download_reisgegevens')]
    public function exportcsv(ReisgegevensRepository $rg,  Request $request){
        $user = $this->getUser();
        $userId=$user->getId();
        $records= $rg->groupByVervoersmiddel($userId);
        $encoders = [new CsvEncoder()];
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);
        $records= (array) $records;
        $csvContent = $serializer->serialize($records, 'csv');
      
        $response = new Response($csvContent);
        $response->headers->set('Content-Encoding', 'UTF-8');
        $response->headers->set('Content-Type', 'text/csv; charset=UTF-8');
        $response->headers->set('Content-Disposition', 'attachment; filename=sample.csv');

        $response->sendHeaders();
        //$response->sendContent();
        return $response;

    // do something with the file
        
    }
}
