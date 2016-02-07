<?php
namespace TNCY\SchoolBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use TNCY\SchoolBundle\Entity\Song;

class LoadSongData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $song = new Song();
        $song->setName('hello');
        $song->setArtist('ADELE');
        $song->setSoundCloundTrackId(230155983);
        $song->setGaps(['wondering','California']);

        $manager->persist($song);
        $manager->flush();


    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 30;
    }
}