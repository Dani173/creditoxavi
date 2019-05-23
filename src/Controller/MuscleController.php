<?php

namespace App\Controller;

use App\Entity\Exercise;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Musclegroups;

class MuscleController extends AbstractController
{
    /**
     * @Route("/muscle", name="muscle")
     */
    public function index()
    {
        $musclegroups = $this->getDoctrine()->getRepository(Musclegroups::class)->findAll();

        return $this->render('muscle/index.html.twig', [
            'musclegroup' => $musclegroups,
        ]);
    }
    /**
     * @Route("/muscle/{id}/show", name="exercisemuscle")
     */
    public function showExercisesbyMuscle(Request $request, $id)
    {

        $exercises = $this->getDoctrine()->getRepository(Exercise::class)->findBy(
            array(
                'muscle'=> $id
            )
        );



        return $this->render('muscle/exercisemuscle.html.twig', [
            'exercises' => $exercises


        ]);
    }


}
