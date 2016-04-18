<?php

namespace TNCY\SchoolBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Application\Sonata\UserBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use TNCY\SchoolBundle\Entity\Teacher;

class LoadTeacherData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
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

        $nom = array('DUVAL','RONDEAU','FESTOR','test'  );
        $prenom = array('Muriel','Zahra','Olivier','tncy'  );
        $email = array('muriel.duval@telecomnancy.eu','zahra.rondeau@telecomnancy.eu','olivier.festor@telecomnancy.eu','test.tncy@telecomnancy.eu'  );

        for ($i=0; $i < count($nom); $i++) { 
                $user = new Teacher();

                $user->setUsername($prenom[$i].'.'.$nom[$i]);
                $user->setPlainPassword($test_password);
                $user->setEmail($email[$i]);
                $user->setFirstname($prenom[$i]);
                $user->setLastname($nom[$i]);
                $user->setRoles(array('ROLE_SONATA_USER_ADMIN_TEACHER_STAFF'));
                $user->addGroup($this->getReference('schoolClass.T'));
                $user->setEnabled(true);
                $encoder = $factory->getEncoder($user);
                $password = $encoder->encodePassword($user->getPlainPassword(), $user->getSalt());
                $user->setPassword($password);

                $manager->updateUser($user);
                $this->addReference('user.teacher_'.$user->getId(), $user);
        }



    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 15;
    }
}
