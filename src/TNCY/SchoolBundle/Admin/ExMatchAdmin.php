<?php
namespace TNCY\SchoolBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use TNCY\SchoolBundle\Entity\MatchWord;

class ExMatchAdmin extends Admin
{

    protected function configureFormFields(FormMapper $formMapper)
    {

        $formMapper->add('start', 'text')
                   ->add('end', 'text')
                   ->add('vocTopic', 'sonata_type_model', array(
                    'class' => 'TNCY\SchoolBundle\Entity\VocTopic',
                    'property' => 'name',
        ))
    ;;
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
                   ->addIdentifier('topic');
                   ;
    }
}
