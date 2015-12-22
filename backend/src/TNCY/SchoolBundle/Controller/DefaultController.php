<?php

namespace TNCY\SchoolBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use TNCY\SchoolBundle\Entity\Contact;
use TNCY\SchoolBundle\Form\ContactType;
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
                ->setBody($this->renderView('BRSiteBundle:Default:mail.html.twig', array('contact' => $contact)),'text/html')
                ;
                $this->get('mailer')->send($message);
                $this->get('session')->getFlashBag()->add('notice', 'Votre message a bien été envoyé');

            }
        }
        return $this->render('TNCYSchoolBundle:Default:contact.html.twig',array('form' => $form->createView()));

	}

	public function aboutAction()
	{
		return $this->render('TNCYSchoolBundle:Default:contact.html.twig');
	}
}
