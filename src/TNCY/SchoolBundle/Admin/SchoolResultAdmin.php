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
use TNCY\SchoolBundle\Entity\SchoolClass;
use TNCY\SchoolBundle\Entity\SchoolResult;
class SchoolResultAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper

            ->add('user', 'sonata_type_model_list', array(
                    'required' => true,
                    'class' => 'Application\Sonata\UserBundle\Entity\User',
                    'btn_delete'    => false,             //or hide the button.
                ))
            ->add('subject', 'sonata_type_model_list', array(
                    'required' => true,
                    'class' => 'TNCY\SchoolBundle\Entity\Subject',
                    'btn_delete'    => false,             //or hide the button.
                ))

            ->add('affinity', 'choice', array('label' => 'Affinity','choices'=>SchoolResult::$AFFINITY))
            ->add('average', 'number', array('label' => 'Average'))

        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('affinity')
            ->add('average')
            ->add('user')
            ->add('subject')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('affinity')
            ->addIdentifier('average')
            ->add('subject')
            ->add('user')
        ;
    }
}