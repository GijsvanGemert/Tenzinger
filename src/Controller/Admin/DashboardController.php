<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\Reisgegevens;
use App\Entity\Compensatie;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {

        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(UserCrudController::class)->generateUrl();
        
        return $this->redirect($url);

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Admin');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('Back to website', 'fas fa-home', 'app_home');

        yield MenuItem::section('Users');
        yield MenuItem::linkToCrud('Users', 'fas fa-solid fa-users', User::class);

        yield MenuItem::section('Gegevens');
        yield MenuItem::linkToCrud('Reisgegevens', 'fas fa-duotone fa-car', Reisgegevens::class);
        yield MenuItem::linkToCrud('Compensatie', 'fas fa-solid fa-coins', Compensatie::class);
    }
}
