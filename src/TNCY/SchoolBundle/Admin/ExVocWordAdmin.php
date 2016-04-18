<?php
namespace TNCY\SchoolBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use TNCY\SchoolBundle\Entity\VocWord;

class ExVocWordAdmin extends Admin
{

    protected function configureFormFields(FormMapper $formMapper)
    {

        $formMapper->add('original', 'text')
                   ->add('translated', 'text')
                   ->add('exemple', 'text')
                   ->add('vocTopic', 'sonata_type_model', array(
                    'class' => 'TNCY\SchoolBundle\Entity\VocTopic',
                    'property' => 'name',
        ))
    ;;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('original')
                       ->add('translated');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('original')
                   ->addIdentifier('translated')
                   ->add('exemple', 'text')
                   ->addIdentifier('topic');
                   ;
    }
}
