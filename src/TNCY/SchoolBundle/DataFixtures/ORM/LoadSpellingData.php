<?php
namespace TNCY\SchoolBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use TNCY\SchoolBundle\Entity\Spelling;

class LoadSpellingData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $spell = new Spelling();
        $spell->setOriginal('parler');
        $spell->setProposals(['speeck','speack','speak']);

        $manager->persist($spell);
        $manager->flush();


    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 25;
    }
}