<?php
namespace TNCY\SchoolBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use TNCY\SchoolBundle\Entity\VocTopic;
use TNCY\SchoolBundle\Entity\VocWord;

class LoadVocData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $topic = new VocTopic();
        $topic->setName('à table');

        $manager->persist($topic);
        $manager->flush();


        $this->loadCooking($manager, $topic);


    }


    public function loadCooking($manager, $topic)
    {
        $word = new VocWord();
        $word->setOriginal('beurre');
        $word->setTranslated('butter');
        $word->setExemple('in a skillet, saute celery and onion in butter until tender.');
        $word->setVocTopic($topic);

        $manager->persist($word);
        $manager->flush();

        $word = new VocWord();
        $word->setOriginal('eau');
        $word->setTranslated('water');
        $word->setExemple('the water is hot');
        $word->setVocTopic($topic);

        $manager->persist($word);
        $manager->flush();

    }


    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 35;
    }
}