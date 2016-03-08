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
use TNCY\SchoolBundle\Entity\Homework;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;

class HomeworkAdmin extends Admin
{
        public $supportsPreviewMode = true;
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', 'text', array('label' => 'Name'))
            ->add('content', 'sonata_simple_formatter_type', array(
                'format' => 'richhtml',
                'label' => 'Content'
            ))
            ->add('due_date', 'sonata_type_datetime_picker', array('label' => 'Due date'))
            // ->add('schoolClasses', 'sonata_type_collection', array(

            //     // Prevents the "Delete" option from being displayed
            //     'type_options' => array('delete' => false)
            // ), array(
            //     'edit' => 'inline',
            //     'inline' => 'table',
            //     'sortable' => 'position',
            // ))
            ->add('schoolClasses', 'sonata_type_model', array(
                'required' => false,
                 'class' => 'TNCY\SchoolBundle\Entity\SchoolClass',
                 'multiple' => true,
                 'btn_add' =>false,
                 ), array())
            ->add('exercices', 'entity', array(
                'required' => false,
                 'class' => 'TNCY\SchoolBundle\Entity\ExerciceAbstract',
                 'multiple' => true,
                 // 'btn_add' =>false,
                 ), array())

        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('due_date')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('due_date')

        ;
    }

    public function prePersist($homework)
    {
        $homework->setAuthor($this->securityToken->getToken()->getUser());
        $homework->setCreatedAt(new \DateTime());
        $homework->setUpdatedAt(new \DateTime());

    }

    public function preUpdate($homework)
    {
        $homework->setAuthor($this->securityToken->getToken()->getUser());
        $homework->setUpdatedAt(new \DateTime());
    }


    public function setSecurityToken(TokenStorage  $securityToken)
    {
        $this->securityToken = $securityToken;
    }

    /**
     * @return UserManagerInterface
     */
    public function getSecurityToken()
    {
        return $this->securityToken;
    }
}