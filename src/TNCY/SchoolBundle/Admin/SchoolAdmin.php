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

class SchoolAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', 'text', array('label' => 'Name'))
            ->add('address', 'sonata_simple_formatter_type', array(
                'format' => 'richhtml',
                'label' => 'Adresse'
            ))
            ->add('city', 'text', array('label' => 'City'))
            ->add('zipCode', 'text', array('label' => 'ZipCode'))
            ->add('email', 'text', array('label' => 'Email'))

        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
        ;
    }
}