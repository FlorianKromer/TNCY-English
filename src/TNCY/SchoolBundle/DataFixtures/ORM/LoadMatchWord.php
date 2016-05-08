<?php
namespace TNCY\SchoolBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use TNCY\SchoolBundle\Entity\VocTopic;
use TNCY\SchoolBundle\Entity\MatchWord;

class LoadMatchWord extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $topic = new VocTopic();
        $topic->setName('Smart Idioms');

        $manager->persist($topic);
        $manager->flush();


        $this->loadIdioms($manager, $topic);
    }


    public function loadIdioms($manager, $topic)
    {
        $word = new MatchWord();
        $word->setStart('A penny for');
        $word->setEnd('your thoughts');
        $word->setVocTopic($topic);
        $manager->persist($word);
        $manager->flush();

        $word = new MatchWord();
        $word->setStart('Actions speak ');
        $word->setEnd('louder than words');
        $word->setVocTopic($topic);
        $manager->persist($word);
        $manager->flush();


        $word = new MatchWord();
        $word->setStart('Costs an arm');
        $word->setEnd('and a leg');
        $word->setVocTopic($topic);
        $manager->persist($word);
        $manager->flush();
    }


    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 50;
    }
}