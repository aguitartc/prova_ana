<?php

namespace App\Controller;

use App\Entity\Department;
use App\Repository\DepartmentRepository;
use App\Repository\PersonaRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;



class DepartmentController extends AbstractController
{
    /**
     * @Route("/departments", name="homepage")
     */
    public function index(Environment $twig, DepartmentRepository $departmentRepository)
    {
        return new Response($twig->render('department/index.html.twig',['departments'=>$departmentRepository->findAll()]));
    }

    /**
     * @Route("/department/{id}", name="department")
     */
    public function show(Environment $twig, Department $department, PersonaRepository $personaRepository)
        {
        return new Response($twig->render('department/show.html.twig',
                                            ['department'=>$department,'persones'=>$personaRepository->findBy(['department'=>$department],['nom'=> 'DESC']),
                                            ]));
}

}
