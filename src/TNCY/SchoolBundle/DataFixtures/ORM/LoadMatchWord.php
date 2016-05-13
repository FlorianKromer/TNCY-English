<?php
namespace TNCY\SchoolBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use TNCY\SchoolBundle\Entity\VocTopic;
use TNCY\SchoolBundle\Entity\MatchWord;
use TNCY\SchoolBundle\Entity\ExerciceMatch;

class LoadMatchWord extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $this->loadIdioms($manager);
    }


    public function loadIdioms($manager)
    {
        $topic = new VocTopic();
        $topic->setName('Smart Idioms');
        $manager->persist($topic);
        $manager->flush();

        $ex = new ExerciceMatch();
        $ex->setExercice($topic);
        $author = $this->getReference('user.super_admin');
        $ex->setAuthor($author);
        $manager->persist($ex);
        $manager->flush();

        $word = new MatchWord();
        $word->setStart('A penny for');
        $word->setEnd('your thoughts');
        $word->setExercice($ex);
        $manager->persist($word);
        $manager->flush();

        $word = new MatchWord();
        $word->setStart('Actions speak ');
        $word->setEnd('louder than words');
        $word->setExercice($ex);
        $manager->persist($word);
        $manager->flush();


        $word = new MatchWord();
        $word->setStart('Costs an arm');
        $word->setEnd('and a leg');
        $word->setExercice($ex);
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