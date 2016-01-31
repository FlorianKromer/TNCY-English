<?php

namespace TNCY\SchoolBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Security\Core\SecurityContextInterface;
use TNCY\SchoolBundle\Entity\Lesson;

class LessonAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', 'text', array('label' => 'Name'))
            ->add('draft', 'checkbox', array(
                'label' => 'Draft',
                'required' => false
            ))
            ->add('topic', 'choice', array('label' => 'Topic','choices'=>Lesson::$CONST_TOPIC))

            ->add('content', 'sonata_simple_formatter_type', array(
                'format' => 'richhtml',
                'label' => 'Contenu',
                'ckeditor_context'     => 'my_config',
            ))
            ->add('summary', 'text', array('label' => 'Sommaire'))


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
            ->add('author')
            ->add('created_at')
            ->add('updated_at')
            ->add('draft')
        ;
    }

    public function prePersist($lesson)
    {
        $lesson->setAuthor($this->securityContext->getToken()->getUser());
        $lesson->setCreatedAt(new \DateTime());
        $lesson->setUpdatedAt(new \DateTime());

    }

    public function preUpdate($lesson)
    {
        $lesson->setAuthor($this->securityContext->getToken()->getUser());
        $lesson->setUpdatedAt(new \DateTime());
    }


    public function setSecurityContext(SecurityContextInterface  $securityContext)
    {
        $this->securityContext = $securityContext;
    }

    /**
     * @return UserManagerInterface
     */
    public function getSecurityContext()
    {
        return $this->securityContext;
    }
}