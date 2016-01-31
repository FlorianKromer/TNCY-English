<?php

namespace TNCY\SchoolBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use TNCY\SchoolBundle\Entity\Memory;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;


class ExerciceController extends Controller
{
    public function memoryAction()
    {
        return $this->render('TNCYSchoolBundle:Exercice:memory.html.twig');
    }

    public function memoryDataAction()
    {
		$repository = $this
		->getDoctrine()
		->getManager()
		->getRepository('TNCYSchoolBundle:Memory')
		;

		$listMemory = $repository->findAll();

		$serializedEntity = $this->container->get('serializer')->serialize($listMemory, 'json');
		return new JsonResponse(json_decode($serializedEntity));
    }

}