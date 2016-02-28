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
        $song->setSoundCloundTrackEmbed('<iframe width="100%" height="450" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/230155983&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>');
        $song->setGaps(['wondering','California']);
        $song->setLyrics(
            "Hello,\n
it's me\n
I was wondering if after all these years\n
You'd like to meet,\n
to go over\n
Everything\n

\nThey say that time's supposed to heal ya\n
But I ain't done much healing\n
Hello, can you hear me?\n
I'm in California dreaming about who we used to be\n

\nWhen we were younger\n
and free\n

\nI've forgotten how it felt before the world fell at our feet\n
There's such a difference\n
between us\n
And a million miles\n

\nHello from the other side\n
I must've called a thousand times\n
to tell you I'm sorry\n
for everything that I've done\n
...\n");
        $author = $this->getReference('user.super_admin');
        $song->setAuthor($author);
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