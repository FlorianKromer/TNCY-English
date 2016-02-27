<?php

namespace TNCY\SchoolBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Security\Core\SecurityContextInterface;
use TNCY\SchoolBundle\Entity\Lesson;

class ExSongAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', 'text', array('label' => 'Name'))
            ->add('artist', 'text', array('label' => 'Artist'))
            ->add('gaps', 'sonata_type_native_collection', array('label' => 'Word gaps','allow_add'=>true,'allow_delete'=>true))
            ->add('soundCloundTrackEmbed', 'textarea', array('label' => 'Chanson iframe embed'))

            ->setHelps(array(
               'title' => "Vous pouvez trouver d'une chanson sur https://soundcloud.com/. "
            ));

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
            ->add('artist')
            ->add('author')
            ->add('created_at')
            ->add('updated_at')

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