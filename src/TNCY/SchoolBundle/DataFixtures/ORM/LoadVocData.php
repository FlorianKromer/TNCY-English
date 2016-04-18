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
        

        //computer
        $topic = new VocTopic();
        $topic->setName('Computer');
        $manager->persist($topic);
        $manager->flush();
        $this->loadComputer($manager, $topic);

        //robots
        $topic = new VocTopic();
        $topic->setName('Robots');
        $manager->persist($topic);
        $manager->flush();
        $this->loadRobot($manager, $topic);

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

    public function loadComputer($manager, $topic)
    {
        $data = array('base de données'=>'database', 'la bureautique    '=>' office automation', 'circuit imprimé   '=>' printed circuit', 'copie de sauvegarde   '=>' backup (copy', 'données   '=>' data', 'effacer   '=>' to delete, to erase', 'un haut-parleur   '=>' a speaker', 'l\'écran   '=>' the screen', 'le clavier    '=>' the keyboard', 'une touche    '=>' a key', 'une imprimante    '=>' a printer', 'une disquette     '=>' a floppy disk', 'unité de disquette    '=>' floppy drive', 'les voyants   '=>' indicators', 'un graphique  '=>' a graph', 'matériel informatique     '=>' hardware', 'mémoriser     '=>' to store', 'mettre à jour     '=>' to upgrade, to update', 'mettre au point   '=>' to debug', 'mettre en route   '=>' to start up', 'réinitialiser     '=>' to reboot', 'un microprocesseur    '=>' a chip', 'un mot de passe   '=>' a password', 'octet     '=>' byte', 'un répertoire     '=>' a directory', 'un réseau     '=>' a network', 'un traitement de texte    '=>' a word processor', 'un tube électronique  '=>' a vacuum tube', 'une unité     '=>' a unit', 'un utilisateur    '=>' a user');
        foreach ($data as $key => $value) {
            $word = new VocWord();
            $word->setOriginal($key);
            $word->setTranslated($value);
            $word->setExemple("");
            $word->setVocTopic($topic);

            $manager->persist($word);

        }

        $manager->flush();
    }


    public function loadRobot($manager, $topic)
    {
        $data = array(" accomplir     "=>" to perform", " articulation  "=>" joint", " automatisation    "=>" automation", " autonome  "=>" self-controlled", " contrôler     "=>" to monitor", " défaut    "=>" fault", " efficace  "=>" efficient", " fonctionner   "=>" to operate", " intelligence artificielle (IA)    "=>" artificial intelligence (IA)", " mise en service   "=>" commissioning", " moderniser    "=>" to modernize", " robot     "=>" robot", " robotiser     "=>" to automate", );

        foreach ($data as $key => $value) {
            $word = new VocWord();
            $word->setOriginal($key);
            $word->setTranslated($value);
            $word->setExemple("");
            $word->setVocTopic($topic);

            $manager->persist($word);

        }

        $manager->flush();
    }



    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 35;
    }
}