<?php
namespace TNCY\SchoolBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use TNCY\SchoolBundle\Entity\Homework;

class LoadHomeworkData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $homework = new Homework();
        $homework->setName('exemple 1');
        $homework->setContent('description contenu exemple 1');
        $school = $this->getReference('schoolClass.2A_A');

        $homework->addSchoolClass($school);

        $memory = $this->getReference('ex.memory');
        $homework->addExercice($memory);
        $song = $this->getReference('ex.song');
        $homework->addExercice($song);

        $homework->setDueDate(new \DateTime());


        $author = $this->getReference('user.super_admin');
        $homework->setAuthor($author);

        $manager->persist($homework);
        $manager->flush();

    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 60;
    }
}