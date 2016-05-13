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

        $formMapper->add('items', 'sonata_type_collection', array(
                'type_options' => array(
                    // Prevents the "Delete" option from being displayed
                    'delete' => false,
                    'delete_options' => array(
                        // You may otherwise choose to put the field but hide it
                        'type'         => 'hidden',
                        // In that case, you need to fill in the options as well
                        'type_options' => array(
                            'mapped'   => false,
                            'required' => false,
                        )
                    )
                )
            ), array(
                'edit' => 'inline',
                'inline' => 'table',
                'sortable' => 'position',
                'by_reference' => true
            ))
            ->add('vocTopic', 'sonata_type_model', array(
                'required' => true,
                 'class' => 'TNCY\SchoolBundle\Entity\VocTopic',
                 'multiple' => false,
                 'btn_add' =>false,
                 ), array())
            ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('vocTopic');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('id')
                   ->add('vocTopic')
                   ->add('items');
                   ;
    }
}
