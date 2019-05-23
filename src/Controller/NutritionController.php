<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class NutritionController extends AbstractController
{
    /**
     * @Route("/nutrition", name="nutrition")
     */
    public function index()
    {
        return $this->render('nutrition/index.html.twig', [
            'controller_name' => 'NutritionController',
        ]);
    }
}
