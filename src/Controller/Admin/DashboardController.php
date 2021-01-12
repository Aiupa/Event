<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use App\Entity\Booking;
use App\Entity\Room;
use App\Entity\Requirement;
use App\Entity\Staff;
use App\Entity\Type;



class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        // redirect to some CRUD controller
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(BookingCrudController::class)->generateUrl());

        // you can also redirect to different pages depending on the current user
        if ('jane' === $this->getUser()->getUsername()) {
            return $this->redirect('...');
        }

        // you can also render some template to display a proper Dashboard
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Nos événements');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToCrud('Événements', 'fas fa-calendar-week', Booking::class);
        yield MenuItem::linkToCrud('Salles', 'fas fa-list', Room::class);
        yield MenuItem::linkToCrud('Référents', 'fas fa-people-arrows', Staff::class);
        yield MenuItem::linkToCrud('Les types d\'événements', 'fas fa-list', Type::class);
        yield MenuItem::linkToCrud('Les besoins', 'fas fa-list', Requirement::class);
    }
}