<?php
namespace TNCY\SchoolBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use TNCY\SchoolBundle\Entity\SchoolClass;

class LoadSchoolClassData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $groupes = ['1A apprentis', '2A apprentis', '3A apprentis', '1A Groupe 1', '1A Groupe 2', '1A Groupe 3', '1A Groupe 4', '1A Groupe 5'];
        $codes = ['1A_A', '2A_A', '3A_A', '1A_G1', '1A_G2', '1A_G3', '1A_G4', '1A_G5'];

        for ($i=0; $i < count($groupes); $i++) { 
            
            $school = new SchoolClass();
            $school->setSchool($this->getReference('school'));
            $school->setName($groupes[$i]);
            $school->setCode($codes[$i]);

            $this->addReference('schoolClass.demo_'.$codes[$i], $school);
            $manager->persist($school);
            $manager->flush();
        }


    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 7;
    }
}