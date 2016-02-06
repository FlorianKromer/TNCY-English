<?php

namespace TNCY\SchoolBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Application\Sonata\UserBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadAdminData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $test_password = 'azerty';

        $factory = $this->container->get('security.encoder_factory');


        /** @var $manager \FOS\UserBundle\Doctrine\UserManager */
        $manager = $this->container->get('fos_user.user_manager');

        /** @var $user \Application\Sonata\UserBundle\Entity\User */
        $user = $manager->createUser();

        $user->setUsername('superadmin');
        $user->setEmail('superadmin@example.com');
        $user->setFirstname('Super');
        $user->setLastname('Admin');
        $user->setRoles(array('ROLE_SUPER_ADMIN'));
        $user->setEnabled(true);
        $encoder = $factory->getEncoder($user);
        $password = $encoder->encodePassword($test_password, $user->getSalt());
        $user->setPassword($password);

        $manager->updateUser($user);

        $this->addReference('user.super_admin', $user);

        unset($user);

        /** @var $user \Application\Sonata\UserBundle\Entity\User */
        $user = $manager->createUser();

        $user->setUsername('admin');
        $user->setPlainPassword($test_password);
        $user->setEmail('admin@example.com');
        $user->setFirstname('Regular');
        $user->setLastname('Admin');
        $user->setRoles(array('ROLE_ADMIN'));
        $user->setEnabled(true);
        $encoder = $factory->getEncoder($user);
        $password = $encoder->encodePassword($user->getPlainPassword(), $user->getSalt());
        $user->setPassword($password);

        $manager->updateUser($user);

        $this->addReference('user.admin', $user);

        // $faker = \Faker\Factory::create();

        // for ($i = 0; $i < 10; $i++)
        // {
        //     /** @var $user \Application\Sonata\UserBundle\Entity\User */
        //     $user = $manager->createUser();

        //     $user->setUsername($faker->userName);
        //     $user->setPlainPassword($test_password);
        //     $user->setEmail($faker->safeEmail);
        //     $user->setFirstname($faker->firstName);
        //     $user->setLastname($faker->lastName);
        //     $user->setRoles(array('ROLE_USER'));
        //     $user->setEnabled(true);
        //     $encoder = $factory->getEncoder($user);
        //     $password = $encoder->encodePassword($user->getPlainPassword(), $user->getSalt());
        //     $user->setPassword($password);

        //     $manager->updateUser($user);

        //     $this->addReference('user.demo_'.$i, $user);
        // }
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 1;
    }
}
