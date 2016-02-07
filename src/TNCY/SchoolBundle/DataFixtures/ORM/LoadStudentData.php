<?php

namespace TNCY\SchoolBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Application\Sonata\UserBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Finder\Finder;
use TNCY\SchoolBundle\Entity\Student;

class LoadStudentData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    // change these options about the file to read


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

        $factory = $this->container->get('security.encoder_factory');


        /** @var $manager \FOS\UserBundle\Doctrine\UserManager */
        $manager = $this->container->get('fos_user.user_manager');


        $this->load1A($manager);
        $this->load2A_A($manager);



    }


    public function load2A_A($manager)
    {
        $test_password = 'azerty';
        $factory = $this->container->get('security.encoder_factory');

        $finder = new Finder();


        $finder = Finder::create()
            ->name('liste_apprentis_2a_2015-2016.csv')
            ->in(__DIR__.'/../data/files');

        $rows = $this->parseCSV($finder);

        foreach ($rows as $key => $student) {
            
            /** @var $user \Application\Sonata\UserBundle\Entity\User */
            $user = new Student();
            $user->setSchoolClass($this->getReference('schoolClass.2A_A'));
            $user->setUsername($student[1].'.'.$student[2]);
            $user->setPlainPassword($test_password);
            $user->setEmail($student[4]);
            $user->setFirstname($student[1]);
            $user->setLastname($student[2]);
            // $user->setRoles(array('ROLE_USER'));
            $user->addGroup($this->getReference('schoolClass.2A_A'));
            $user->setEnabled(true);
            $encoder = $factory->getEncoder($user);
            $password = $encoder->encodePassword($user->getPlainPassword(), $user->getSalt());
            $user->setPassword($password);

            $manager->updateUser($user);
        }
    }

    public function load1A($manager)
    {
        $test_password = 'azerty';
        $factory = $this->container->get('security.encoder_factory');
        $finder = new Finder();


        $finder = Finder::create()
            ->name('liste_1a_2015-2016.csv')
            ->in(__DIR__.'/../data/files');

        $rows = $this->parseCSV($finder);

        foreach ($rows as $key => $student) {
            
            /** @var $user \Application\Sonata\UserBundle\Entity\User */
            $user = new Student();
            $user->setSchoolClass($this->getReference('schoolClass.1A_'.mb_strtoupper($student[4])));
            $user->setUsername($student[1].'.'.$student[2]);
            $user->setPlainPassword($test_password);
            $user->setEmail($student[5]);
            $user->setFirstname($student[1]);
            $user->setLastname($student[2]);
            // $user->setRoles(array('ROLE_USER'));
            $user->addGroup($this->getReference('schoolClass.1A_'.mb_strtoupper($student[4])));
            $user->setEnabled(true);
            $encoder = $factory->getEncoder($user);
            $password = $encoder->encodePassword($user->getPlainPassword(), $user->getSalt());
            $user->setPassword($password);

            $manager->updateUser($user);
        }
    }

    private function parseCSV($finder)

    {

        $ignoreFirstLine = false;



        foreach ($finder as $file) { $csv = $file; }


        $rows = array();


        if (($handle = fopen($csv->getRealPath(), "r")) !== FALSE) {

            $i = 0;

            while (($data = fgetcsv($handle, null, ";")) !== FALSE) {

                $i++;

                if ($ignoreFirstLine && $i == 1) { continue; }

                for ($j=0; $j < count($data); $j++) { 
                    $data[$j] = utf8_encode($data[$j]);
                }
                $rows[] = $data;

            }

            fclose($handle);

        }


        return $rows;

    }
    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 14;
    }
}
