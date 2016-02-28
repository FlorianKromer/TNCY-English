<?php
namespace TNCY\SchoolBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use TNCY\SchoolBundle\Entity\Memory;
use TNCY\SchoolBundle\Entity\MemoryItem;

class LoadMemoryData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $this->loadFruits($manager);

    }

    public function loadFruits($manager)
    {
        $names = ['apple', 'apricot', 'banana', 'blackberry', 'cassis', 'cherry', 'red grapes', 'green grapes', 'lemon', 'orange', 'yellow pear', 'green pear', 'plum', 'raspberry', 'strawberry', 'watermelon' ];

        $img = ['apple.jpg', 'apricot.jpg', 'banana.jpg', 'blackberry.jpg', 'cassis.jpg', 'cherry.jpg', 'red-grapes.jpg', 'green-grapes.jpg', 'lemon.jpg', 'orange.jpg', 'yellow-pear.jpg', 'green-pear.jpg', 'plum.jpg', 'raspberry.jpg', 'strawberry.jpg', 'watermelon.jpg', ];
        
        $memory = new Memory();
        $memory->setTopic("fruits");
        $memory->setDescription("discover our fruits");
        $manager->persist($memory);
        $manager->flush();
        foreach ($names as $key => $value) {
            $memoryItem = new MemoryItem();
            $memoryItem->setName($names[$key]);
            $memoryItem->setImg($img[$key]);
            $memoryItem->setTopic($memory);
            $manager->persist($memoryItem);
            $manager->flush();
        }
    }
    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 20;
    }
}