<?php

namespace App\Controller\Admin;

use App\Entity\User;
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
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use EasyCorp\Bundle\EasyAdminBundle\Factory\FilterFactory;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\EntityManagerInterface;


class UserCrudController extends AbstractCrudController
{
    private $_userPasswordHasher;
    private $_adminContextProvider;

    public function __construct(UserPasswordHasherInterface $userPasswordHasher, AdminContextProvider $adminContextProvider)
    {
        $this->_userPasswordHasher = $userPasswordHasher;
        $this->_adminContextProvider = $adminContextProvider;
    }

    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id');
        yield EmailField::new('email');
    }

    public function configureFilters(Filters $filters): Filters
    {
        return parent::configureFilters($filters)
            ->add('id')
            ->add('email');
    }


    # TEST TEST TEST
    public function configureActions(Actions $actions): Actions
    {
        $export = Action::new('exportAction', 'actions.export')
            ->setIcon('fa fa-download')
            ->linkToCrudAction('exportAction')
            ->setCssClass('btn')
            ->createAsGlobalAction();

        return $actions->add(Crud::PAGE_INDEX, $export);
    }

    public function exportAction(Request $request): Response
    {
        $context = $this->_adminContextProvider->getContext();

        #$searchDto = $this->_adminContextFactory->getSearchDto($request, $context->getCrud());
        $fields = FieldCollection::new($this->configureFields(Crud::PAGE_INDEX));
        $filters = $this->get(FilterFactory::class)->create($context->getCrud()->getFiltersConfig(), $fields, $context->getEntity());

        $result = $this->createIndexQueryBuilder(
            $searchDto, $context->getEntity(), $fields, $filters
        )
            ->getQuery()->getResult();

        $data = [];
        /**
         * @var $record User
         */
        foreach ($result as $record) {
            $data[] = [
                'email' => $record->getEmail(),
            ];
        }

        $filename = 'export_users_'.date_create()->format('d-m-y').'.csv';

        $serializer = new Serializer([new ObjectNormalizer()], [new CsvEncoder()]);

        $response = new Response($serializer->encode($data, CsvEncoder::FORMAT));
        $response->headers->set('Content-Type', 'text/csv; charset=utf-8');
        $response->headers->set('Content-Disposition', "attachment; filename=\"$filename\"");

        return $response;
    }

}
