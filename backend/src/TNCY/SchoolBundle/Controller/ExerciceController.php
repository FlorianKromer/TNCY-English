<?php

namespace TNCY\SchoolBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use TNCY\SchoolBundle\Entity\Contact;
use TNCY\SchoolBundle\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;


class ExerciceController extends Controller
{
    public function memoryAction()
    {
        return $this->render('TNCYSchoolBundle:Exercice:memory.html.twig');
    }
}