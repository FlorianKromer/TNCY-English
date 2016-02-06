<?php
/**
 * Created by PhpStorm.
 * User: Florian
 * Date: 08/02/2015
 * Time: 10:19
 */
namespace TNCY\SchoolBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use TNCY\SchoolBundle\Entity\Subject;

class SubjectAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', 'text', array('label' => 'name'))
            ->add('theme', 'choice', array('label' => 'theme','choices'=>Subject::$THEMES))
            ->add('schoolClasses', 'sonata_type_model', array(
                    'multiple' => true,
                    'required' => false,
                    'btn_delete'    => false,             //or hide the button.
                    'class' => 'TNCY\SchoolBundle\Entity\SchoolClass'
                ))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('theme')
//            ->add('schoolClasses')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
//            ->add('schoolClasses')
            ->add('theme')
        ;
    }
}