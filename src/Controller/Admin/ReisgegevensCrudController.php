<?php

namespace App\Controller\Admin;

use App\Entity\Reisgegevens;
use App\Repository\ReisgegevensRepository;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Provider\AdminContextProvider;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FieldCollection;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use Symfony\Component\Serializer\Encoder\CsvEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use EasyCorp\Bundle\EasyAdminBundle\Factory\FilterFactory;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\KeyValueStore;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use EasyCorp\Bundle\EasyAdminBundle\Filter\BooleanFilter;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class ReisgegevensCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Reisgegevens::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield Field::new('afstand');
        yield Field::new('vervoersmiddel');
        yield Field::new('heen');
        yield AssociationField::new('werknemer_id');
        yield Field::new('datum');
    }

    public function configureFilters(Filters $filters): Filters
    {
        return parent::configureFilters($filters)
            ->add('afstand')
            ->add('vervoersmiddel')
            ->add(BooleanFilter::new('heen'))
            ->add('werknemer_id')
            ->add('datum');
    }
    public function configureActions(Actions $actions): Actions
    {
        $export = Action::new('groupbyid2', 'Export')
            ->setIcon('fa fa-download')
            ->linkToCrudAction('groupbyid2')
            ->setCssClass('btn')
            ->createAsGlobalAction();

        return $actions
            ->add(Crud::PAGE_INDEX, $export);
    }

    public function exportcsv2(ReisgegevensRepository $rg,  Request $request){
        $reisgegevens = $rg->FindAll2();
        $encoders = [new CsvEncoder()];
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);
        $records= (array) $reisgegevens;
        $csvContent = $serializer->serialize($records, 'csv');
      
        $response = new Response($csvContent);
        $response->headers->set('Content-Encoding', 'UTF-8');
        $response->headers->set('Content-Type', 'text/csv; charset=UTF-8');
        $response->headers->set('Content-Disposition', 'attachment; filename=sample.csv');

        $response->sendHeaders();
        //$response->sendContent();
        return $response;

    }

    public function groupbyid2(ReisgegevensRepository $rg,  Request $request): Response
    {
        $reisgegevens = $rg->groupByID();
        $tempmonth="";
        $tempyear="";
        $tempvervoersmiddel="";
        $tempwerknemerid="";
        $tempArray=array();
        $counter=0;
        array_multisort(array_column($reisgegevens, 'werknemerId'), SORT_DESC,
            array_column($reisgegevens, 'year'), SORT_DESC,
                array_column($reisgegevens, 'month'),      SORT_DESC,
                $reisgegevens);
        foreach ($reisgegevens as $key => $value) {
            
            if($value["month"]==$tempmonth&&$value["year"]==$tempyear&&$tempwerknemerid==$value["werknemerId"]){
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
                $tempwerknemerid=$value["werknemerId"];
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

        $encoders = [new CsvEncoder()];
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);

        $csvContent = $serializer->serialize($tempArray, 'csv');
      
        $response = new Response($csvContent);
        $response->headers->set('Content-Encoding', 'UTF-8');
        $response->headers->set('Content-Type', 'text/csv; charset=UTF-8');
        $response->headers->set('Content-Disposition', 'attachment; filename=sample.csv');

        $response->sendHeaders();
        //$response->sendContent();
        return $response;
    }


}
