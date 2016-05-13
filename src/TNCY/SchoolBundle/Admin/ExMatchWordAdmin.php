<?php
namespace TNCY\SchoolBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use TNCY\SchoolBundle\Entity\MatchWord;

class ExMatchWordAdmin extends Admin
{

    protected function configureFormFields(FormMapper $formMapper)
    {

        $formMapper->add('start', 'text')
                   ->add('end', 'text')
                   ->add('exercice', 'entity', array('required' => true, 'class' => 'TNCY\SchoolBundle\Entity\ExerciceMatch'))
        ;
    
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('start')
                       ->add('end');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('start')
                   ->addIdentifier('end')
                   ->addIdentifier('exercice');
                   ;
    }
}
