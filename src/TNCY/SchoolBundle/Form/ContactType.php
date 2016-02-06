<?php

namespace TNCY\SchoolBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name','text', array('label' => 'Nom',
            	'attr' => array('class' => 'form-control')))
            ->add('mail', 'email', array('label' => 'Email',
            	'attr' => array('class' => 'form-control')))
            ->add('subject', 'text', array('label' => 'Sujet',
            	'attr' => array('class' => 'form-control')))
            ->add('content', 'textarea', array(
            	'label' => 'Message',
            	'attr' => array('class' => 'form-control')))
            ->add('submit', 'submit', array(
	            'label' => 'Envoyer',
	            'attr'  => array('class' => 'btn btn-success')))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TNCY\SchoolBundle\Entity\Contact'
        ));
    }

    public function getName()
    {
        return 'Contact';
    }
}