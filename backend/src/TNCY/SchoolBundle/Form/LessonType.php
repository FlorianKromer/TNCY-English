<?php

namespace TNCY\SchoolBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use TNCY\SchoolBundle\Entity\Lesson;

class LessonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name','text', array('label' => 'Nom',
            	'attr' => array('class' => 'form-control')))
            ->add('topic', 'choice', array('label' => 'Thème',
                'choices'  => Lesson::$CONST_TOPIC,
            	'attr' => array('class' => 'form-control select')))
            ->add('submit', 'submit', array(
	            'label' => 'Envoyer',
	            'attr'  => array('class' => 'btn btn-raised btn-success')))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TNCY\SchoolBundle\Entity\Lesson'
        ));
    }

    public function getName()
    {
        return 'Lesson';
    }
}