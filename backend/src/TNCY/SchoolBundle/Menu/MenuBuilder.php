<?php
namespace TNCY\SchoolBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Translation\TranslatorInterface;
use Symfony\Component\Security\Core\SecurityContextInterface;

class MenuBuilder
{
    private $factory;
    private $translator;
    private $securityContext;

    /**
     * @param FactoryInterface $factory
     * @param TranslatorInterface $translator
     * @param SecurityContext $securityContext
     */
    public function __construct(FactoryInterface $factory, TranslatorInterface $translator,SecurityContextInterface  $securityContext )
    {
        $this->factory = $factory;
        $this->translator = $translator;
        if (isset($securityContext)) {
            $this->securityContext = $securityContext;
        }
    }

    /**
     * @param Request $request
     * @return \Knp\Menu\ItemInterface
     */
    public function createMainMenu(Request $request)
    {
        $user = $this->securityContext->getToken()->getUser();


        $menu = $this->factory->createItem('root');
        $menu->setChildrenAttributes(array('class' => 'nav navbar-nav navbar-right'));
        $menu->addChild('Accueil', array('route' => 'tncy_school_index'));
        $menu->addChild('News', array('route' => 'tncy_school_news'));
        $menu->addChild('À propos', array('route' => 'tncy_school_about'));
        $menu->addChild('Contact', array('route' => 'tncy_school_contact'));

        if($this->securityContext->isGranted('IS_AUTHENTICATED_FULLY'))
            $menu->addChild($user->getUsername(), ['route' => 'tncy_school_profile','routeParameters' => array('id' => $user->getId())]);
        else
            $menu->addChild('Connexion', array('route' => 'hwi_oauth_connect'));

        return $menu;
    }

    /**
     * @param Request $request
     */
    public function createProfileMenu(Request $request)
    {
        $user = $this->securityContext->getToken()->getUser();

        $menu = $this->factory->createItem('root');
        $menu->setChildrenAttributes(array('class' => 'nav nav-pills'));

        $menu->addChild('Home', array('route' => 'tncy_school_index'));
        if($this->securityContext->isGranted('IS_AUTHENTICATED_FULLY'))
            $menu->addChild('Profile', ['route' => 'tncy_school_profile','routeParameters' => array('id' => $user->getId())]);
        else
            $menu->addChild('login', array('route' => 'hwi_oauth_connect'));
        $menu->addChild('Social', array('route' => 'tncy_school_facebook','routeParameters' => array('id' => $user->getId())));
        $menu->addChild('Github', array('route' => 'tncy_school_github','routeParameters' => array('id' => $user->getId())));

        return $menu;

    }
}
