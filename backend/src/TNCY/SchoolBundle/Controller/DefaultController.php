<?php

namespace TNCY\SchoolBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use TNCY\SchoolBundle\Entity\Contact;
use TNCY\SchoolBundle\Entity\Lesson;
use TNCY\SchoolBundle\Form\ContactType;
use TNCY\SchoolBundle\Form\LessonType;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TNCYSchoolBundle:Default:index.html.twig');
    }

    public function newsAction()
    {
        return $this->render('TNCYSchoolBundle:Default:index.html.twig');
    }

    public function contactAction(Request $request)
    {
        $contact = new Contact();
        $form = $this->createForm(new ContactType(), $contact);
        if ($request->getMethod() == 'POST') {

            $form->handleRequest($request);

            if ($form->isValid()) {

                $message = \Swift_Message::newInstance()
                ->setSubject('Message de '. $contact->getName())
                ->setFrom($contact->getMail())
                ->setTo($this->container->getParameter('sendTo'))
                ->setBody($this->renderView('TNCYSchoolBundle:Default:mail.html.twig', array('contact' => $contact)),'text/html')
                ;
                $this->get('mailer')->send($message);
                $this->get('session')->getFlashBag()->add('notice', 'Votre message a bien été envoyé');

            }
        }
        return $this->render('TNCYSchoolBundle:Default:contact.html.twig',array('form' => $form->createView()));

    }

    public function aboutAction()
    {
        return $this->render('TNCYSchoolBundle:Default:index.html.twig');
    }

    public function dashboardAction()
    {

        $user = $this->get('security.context')->getToken()->getUser();
        
        if (!$user) {
            return $this->render('TNCYSchoolBundle:Default:dashboard.html.twig');
        }
        else{
            return $this->render('TNCYSchoolBundle:Default:dashboard-connected.html.twig');
        }
    }


    public function lessonsAction(Request $request)
    {
        $contact = new Lesson();
        $form = $this->createForm(new LessonType(), $contact);
        if ($request->getMethod() == 'POST') {

            $form->handleRequest($request);

            if ($form->isValid()) {

                $parameters = array(
                    'name' => $lesson->name, 
                    'topic' => $lesson->topic, 
                );

                $em    = $this->get('doctrine.orm.entity_manager');
                $dql   = "SELECT l FROM TNCYSchoolBundle:Lesson l WHERE name LIKE :name AND topic=:topic";
                $query = $em->createQuery($dql)->setParameters($parameters);

                $paginator  = $this->get('knp_paginator');
                $pagination = $paginator->paginate(
                $query, /* query NOT result */
                $request->query->getInt('page', 1)/*page number*/,
                10/*limit per page*/
                );

                return $this->render('TNCYSchoolBundle:Default:lessons.html.twig',array('form' => $form->createView(),'pagination' => $pagination));
            }
        }
        $em    = $this->get('doctrine.orm.entity_manager');
        $dql   = "SELECT l FROM TNCYSchoolBundle:Lesson l ";
        $query = $em->createQuery($dql);

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
        $query, /* query NOT result */
        $request->query->getInt('page', 1)/*page number*/,
        10/*limit per page*/
        );

        return $this->render('TNCYSchoolBundle:Default:lessons.html.twig',array('form' => $form->createView(),'pagination' => $pagination));
    }
}
