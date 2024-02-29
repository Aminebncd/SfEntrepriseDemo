<?php

namespace App\Controller;

use App\Entity\Entreprise;
use App\Repository\EntrepriseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EntrepriseController extends AbstractController
{
    #[Route('/entreprise', name: 'app_entreprise')]
    // public function index(EntityManagerInterface $entityManager): Response
    public function index(EntrepriseRepository $entrepriseRepository): Response
    {
        // $name = 'Elan Formation';
        // $tableau = ['1', '2', '3'];

        // $entreprises = $entityManager->getRepository(Entreprise::class)->findAll();
        // $entreprises = $entrepriseRepository->findAll();
        // -> SELECT * FROM entreprise ORDER BY raisonSociale ASC
        $entreprises = $entrepriseRepository->findBy(['ville' => 'strasbourg'], ['raisonSociale' => 'ASC']);
        return $this->render('entreprise/index.html.twig', [
            // 'name' => $name,
            // 'tableau' => $tableau,
            'entreprises' => $entreprises
            // 'controller_name' => 'EntrepriseController',
        ]);
    }
}
