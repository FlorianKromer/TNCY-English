<?php
namespace TNCY\SchoolBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use TNCY\SchoolBundle\Entity\Memory;

class LoadMemoryData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $names = ['apple', 'bag', 'bedroom', 'boy', 'cellphone', 'city', 'computer', 'duck', 'game', 'girl', 'map', 'meeting', 'mouse', 'paper', 'pencil', 'picture' ];
        $img = ['monsters-01.png', 'monsters-02.png', 'monsters-03.png', 'monsters-04.png', 'monsters-05.png', 'monsters-06.png', 'monsters-07.png', 'monsters-08.png', 'monsters-09.png', 'monsters-10.png', 'monsters-11.png', 'monsters-12.png', 'monsters-13.png', 'monsters-14.png', 'monsters-15.png', 'monsters-16.png', ];
    
        foreach ($names as $key => $value) {
            $memory = new Memory();
            $memory->setName($names[$key]);
            $memory->setImg($img[$key]);
            $manager->persist($memory);
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