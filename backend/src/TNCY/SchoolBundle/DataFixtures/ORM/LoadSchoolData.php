<?php
namespace TNCY\SchoolBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use TNCY\SchoolBundle\Entity\School;

class LoadSchoolData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $school = new School();
        $school->setName('TNCY');
        $school->setCity('Nancy');
        $school->setEmail('contact@tncy.net');
        $school->setZipCode('54000');
        $school->setAddress('10 rue pierre chalnot');

        $manager->persist($school);
        $manager->flush();

        $this->addReference('school', $school);

    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 1;
    }
}