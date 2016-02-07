<?php
namespace TNCY\SchoolBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use TNCY\SchoolBundle\Entity\SchoolClass;
use Application\Sonata\UserBundle\Entity\Group;

class LoadSchoolClassData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $groupes = ['1A apprentis', '2A apprentis', '3A apprentis', '1A Groupe 1', '1A Groupe 2', '1A Groupe 3', '1A Groupe 4', '1A Groupe 5'];
        $codes = ['1A_A', '2A_A', '3A_A', '1A_G1', '1A_G2', '1A_G3', '1A_G4', '1A_G5'];

        for ($i=0; $i < count($groupes); $i++) { 
            
            $schoolClass = new SchoolClass();
            $schoolClass->setSchool($this->getReference('school'));
            $schoolClass->setName($groupes[$i]);
            $schoolClass->setCode($codes[$i]);
            $schoolClass->setRoles(['ROLE_SONATA_USER_ADMIN_STUDENT_GUEST','ROLE_USER']);

            $this->addReference('schoolClass.'.$codes[$i], $schoolClass);
            $manager->persist($schoolClass);
            $manager->flush();
        }

        //add a goup for teacher
        $teachGroup='Teacher';
        $code = 'T';
        $group = new Group($teachGroup,['ROLE_SONATA_USER_ADMIN_TEACHER_EDITOR','ROLE_USER','ROLE_SONATA_ADMIN']);
        $this->addReference('schoolClass.'.$code, $group);
        $manager->persist($group);
        $manager->flush();
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 12;
    }
}