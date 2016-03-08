<?php

namespace TNCY\SchoolBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Sonata\CoreBundle\Validator\ErrorElement;
use TNCY\SchoolBundle\Entity\Song;

class ExSongAdmin extends Admin
{
    /** @var \Symfony\Component\DependencyInjection\ContainerInterface */
    private $container;


    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', 'text', array('label' => 'Name'))
            ->add('artist', 'text', array('label' => 'Artist'))
            ->add('gaps', 'sonata_type_native_collection', array('label' => 'Word gaps','allow_add'=>true,'allow_delete'=>true))
            ->add('soundCloundTrackEmbed', 'textarea', array('label' => 'Song iframe embed','help'=>"Vous pouvez trouver d'une chanson sur <a href='https://soundcloud.com/'>https://soundcloud.com/</a>. "))
            ->add('lyrics', 'textarea', array('label' => 'Lyrics','help'=>"This fields will be automatically filled if the song was found",'required'=>false))

            ->setHelps(array(
               'title' => ""
            ));

        ;
    }

    public function validate(ErrorElement $errorElement, $song)
    {
        if(empty($song->getLyrics())){
            $musixmatchApi = $this->container->get('tncy_school.musixmatchapi');
            $musixmatch = json_decode($musixmatchApi->get_musixmatch_lyrics($song->getArtist(),$song->getName()));
            if ($musixmatch->message->header->status_code == 200) {
                $lyrics = $musixmatch->message->body->lyrics->lyrics_body;
                $song->setLyrics($lyrics);
            }
            else{
                $error = "Error: Any lyrics was found for ".$song->getArtist()." : ".$song->getName();
                $errorElement
                    ->with('name')
                        ->addViolation($error)
                    ->end()
                    ->with('artist')
                        ->addViolation($error)
                    ->end()
                    ;
            }
        }
        //TODO: rajouter un message si les mots à trouver est vide => error


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
        $lesson->setAuthor($this->securityToken->getToken()->getUser());
        $lesson->setCreatedAt(new \DateTime());
        $lesson->setUpdatedAt(new \DateTime());

    }

    public function preUpdate($lesson)
    {
        $lesson->setAuthor($this->securityToken->getToken()->getUser());
        $lesson->setUpdatedAt(new \DateTime());
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

    public function setContainer (\Symfony\Component\DependencyInjection\ContainerInterface $container) {
        $this->container = $container;
    }
}