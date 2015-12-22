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

class SchoolClassAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $q = $this->modelManager->getEntityManager('TNCY\SchoolBundle\Entity\Subject')
            ->createQuery('SELECT s
            FROM TNCY\SchoolBundle\Entity\Subject s');
        $formMapper
            ->add('name', 'text', array('label' => 'Nom'))
            ->add('subjects', 'sonata_type_model', array(
                    'multiple' => true,
                    'required' => false,
                    'by_reference' => false,
                    'empty_value' => 'Choose an subject',
                    'query' => $q,
                    'compound' => false,
                    'class' => 'TNCY\SchoolBundle\Entity\Subject'
                ))
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