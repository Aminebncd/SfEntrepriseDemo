<?php

namespace App\Controller;

use App\Repository\EmployeRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EmployeController extends AbstractController
{
    #[Route('/employe', name: 'app_employe')]
    public function index(EmployeRepository $employeRepository): Response
    {
        // -> SELECT * FROM employe ORDER BY nom ASC
        $employes = $employeRepository->findBy([], ['nom'=> 'ASC']);
        return $this->render('employe/index.html.twig', [
            // 'name' => $name,
            // 'tableau' => $tableau,
            'employes' => $employes
            // 'controller_name' => 'EntrepriseController',
        ]);
    }
}
