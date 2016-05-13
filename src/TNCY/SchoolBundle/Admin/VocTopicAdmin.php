<?php
namespace TNCY\SchoolBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use TNCY\SchoolBundle\Entity\VocWord;

class VocTopicAdmin extends Admin
{

    protected function configureFormFields(FormMapper $formMapper)
    {

        $formMapper->add('name', 'text')
    ;;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('name')

                   ;
    }
}
