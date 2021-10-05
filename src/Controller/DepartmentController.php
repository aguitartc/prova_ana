<?php

namespace App\Controller;

use App\Entity\Department;
use App\Repository\DepartmentRepository;
use App\Repository\PersonaRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function show(Request $request, Environment $twig, Department $department, PersonaRepository $personaRepository)
        {
            $offset     = max(0,$request->query->getInt('offset',0));
            $paginator  =  $personaRepository->getPersonaPaginator($department,$offset);

        return new Response($twig->render('department/show.html.twig',
                                            ['department'=>$department,
                                                'persones' => $paginator,
                                                'previous' => $offset - PersonaRepository::PAGINATOR_PER_PAGE,
                                                'next' => min(count($paginator), $offset +
                                                PersonaRepository::PAGINATOR_PER_PAGE),
                                            ]));
}

}
