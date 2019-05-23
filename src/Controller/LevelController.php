<?php

namespace App\Controller;

use App\Entity\Exercise;
use App\Entity\Level;
use App\Entity\Routine;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class LevelController extends AbstractController
{
    /**
     * @Route("/level", name="app_level")
     */
    public function index()
    {
        $levels = $this->getDoctrine()->getRepository(Level::class)->findAll();
        return $this->render('level/index.html.twig', [
            'levels' => $levels,
        ]);
    }

    /**
     * @Route("/level/{id}/show", name="level")
     */
    public function showLevel(Request $request, $id)
    {
        $levels = $this->getDoctrine()->getRepository(Routine::class)->findBy(
            array(
                'level'=> $id
            )
        );
        return $this->render('level/levelshow.html.twig', [
            'levels' => $levels


        ]);
    }

    /**
     * @Route("/level/{id}/routine", name="routine_exercises")
     */
    public function showExerciseRoutine(Request $request, $id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $db = $em->getConnection();

        $query = "select exercise.name,exercise.series,exercise.repetitions
FROM routine
INNER JOIN exercise_routine
ON routine.id = exercise_routine.routine_id
INNER JOIN exercise
ON exercise_routine.exercise_id = exercise.id
WHERE routine_id = $id; ";
        $stmt = $db->prepare($query);
        $params = array();
        $stmt->execute($params);
        $levels=$stmt->fetchAll();

        /*$levels = $this->getDoctrine()->getRepository(Exercise::class)->findBy(
            array(
                'routine'=> $id
            ));*/

        return $this->render('level/routines.html.twig', [
            'levels' => $levels

        ]);
    }
}
