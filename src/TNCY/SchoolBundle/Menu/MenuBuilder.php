<?php
namespace TNCY\SchoolBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Translation\TranslatorInterface;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;

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
        // $user = $this->securityContext->getToken()->getUser();


        $menu = $this->factory->createItem('root');
        $menu->setChildrenAttributes(array('class' => 'nav navbar-nav navbar-left menu__list'));
        //$menu->addChild('Accueil', array('route' => 'tncy_school_index'));
        //$menu->addChild('News', array('route' => 'sonata_news_archive'));
        $menu->addChild('Language', array('label' => 'Exercices'))
                    ->setAttribute('dropdown', true);
        $menu['Language']->addChild('J\'apprends l\'anglais niveau 1', array('route' => 'tncy_school_about'))
                    ->setAttribute('class', 'dropdown-header');
        $menu['Language']->addChild('Exercice: Song', array('route' => 'tncy_school_song'))
                    ->setAttribute('icon', 'fa fa-plus');
        $menu['Language']->addChild('Exercice: Memory', array('route' => 'tncy_school_memory'))
                    ->setAttribute('icon', 'fa fa-plus');
        $menu['Language']->addChild('Exercice: vocabulary', array('route' => 'tncy_school_vocabulary'))
                    ->setAttribute('icon', 'fa fa-plus');
        $menu['Language']->addChild('Exercice: match', array('route' => 'tncy_school_match'))
                    ->setAttribute('icon', 'fa fa-plus');
        $menu->addChild('Leçons', array('route' => 'tncy_school_lessons'));
        if($this->securityContext->isGranted('ROLE_ADMIN')){
            $menu->addChild('Administration', array('route' => 'sonata_admin_dashboard'));
        }  
        $menu->addChild('Contact', array('route' => 'tncy_school_contact'));


        return $menu;
    }

    /**
     * @param Request $request
     * @return \Knp\Menu\ItemInterface
     */
    public function createUserMenu(Request $request)
    {
        $user = $this->securityContext->getToken()->getUser();


        $menu = $this->factory->createItem('root');
        $menu->setChildrenAttributes(array('class' => 'nav navbar-nav navbar-right'));



        $menu->addChild('Dashboard', array('route' => 'tncy_school_dashboard'));
          

        // $menu['User']->addChild('Aide', array('route' => 'tncy_school_about'))
        //             ->setAttribute('icon', 'fa fa-question-circle');
        // $menu['User']->addChild('Raccourcis clavier', array('route' => 'tncy_school_about'))
        //             ->setAttribute('icon', 'fa fa-keyboard-o');
        if($this->securityContext->isGranted('IS_AUTHENTICATED_FULLY')){

            $menu->addChild($user->getUsername(), ['route' => 'tncy_school_profile','routeParameters' => array('id' => $user->getId())])
                    ->setAttribute('icon', 'fa fa-user')
                    ->setAttribute('dropdown', true);
            $menu[$user->getUsername()]->addChild('Déconnexion', array('route' => 'sonata_user_security_logout'))
                    ->setAttribute('icon', 'fa fa-keyboard-o');
        }
        else
            $menu->addChild('Connexion', array('route' => 'sonata_user_security_login'))
                    ->setAttribute('icon','fa fa-sign-in');

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
