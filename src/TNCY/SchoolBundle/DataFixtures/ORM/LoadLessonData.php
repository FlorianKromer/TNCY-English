<?php
namespace TNCY\SchoolBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

use TNCY\SchoolBundle\Entity\Lesson;

class LoadLessonData extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
{
    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 40;
    }

    public function load(ObjectManager $manager)
    {
        
        $this->loadOpinion($manager);

        $this->loadRandom($manager);
    }

    public function loadRandom($manager)
    {
        $faker = $this->getFaker();

        for ($i=0; $i < 10; $i++) { 
            # code...
            $topic = new Lesson();
            $topic->setName($faker->sentence(6));
            $topic->setContent($faker->text(1000));
            $topic->setSummary($faker->sentence(30));
            $topic->setTopic(Lesson::$CONST_TOPIC['VOCABULARY']);
            $author = $this->getReference('user.super_admin');
            $topic->setAuthor($author);
            $manager->persist($topic);
            $manager->flush();
        }

    }

    public function loadOpinion($manager)
    {
        $topic = new Lesson();
        $topic->setName('Exprimer son opinion');
        $topic->setContent('
<h1>Expressions pour exprimer son opinion</h1>

<h2>Comme vous pourrez le voir, ces expressions sont g&eacute;n&eacute;ralement plac&eacute;es au d&eacute;but de la phrase (comme en fran&ccedil;ais) de mani&egrave;re &agrave; introduire nos propos.</h2>

<p>
<strong>I think that (Je pense que)</strong><br />
<br />
I think that we must book the flight in advance. <img class="icone" src="http://www.eguens.com/v2/images/ico_fleche_d.png" /> Je pense que nous devrions r&eacute;server le vol en avance.<br />
<br />
<br />
<br />
<strong>I don&#39;t think / believe that (Je ne pense / crois pas que)</strong><br />
<br />
I don&rsquo;t believe that we should wait anymore to sign the contract. <img class="icone" src="http://www.eguens.com/v2/images/ico_fleche_d.png" /> Je ne crois pas que nous devrions attendre encore pour signer le contrat.<br />
<br />
<br />
<br />
<strong>In my opinion / To me ( A mon avis )</strong><br />
<br />
In my opinion, the situation has reached a compromised level. <img class="icone" src="http://www.eguens.com/v2/images/ico_fleche_d.png" /> A mon avis, la situation a atteint un seuil compromettant.<br />
<br />
To me, we should move forward with the adopted plan. <img class="icone" src="http://www.eguens.com/v2/images/ico_fleche_d.png" /> A mon avis, nous devrions avancer avec le plan adopt&eacute;.<br />
<br />
<br />
<br />
<strong>According to (Selon)</strong><br />
<br />
According to the Minister, the recession will end in the second semester of 2012. <img class="icone" src="http://www.eguens.com/v2/images/ico_fleche_d.png" /> Selon le Ministre, la r&eacute;cession prendra fin au second semestre 2012.<br />
<br />
<img class="icone" src="http://www.eguens.com/v2/images/ico_note.png" /> Attention, pour introduire son avis on nous apprend souvent en cours &agrave; utiliser &quot;According to me&quot;, mais j&#39;ai par la suite souvent entendu dire que cette expression avait un caract&egrave;re pr&eacute;tentieux (&agrave; moins que vous ne soyez une r&eacute;f&eacute;rence dans le domaine en question).<br />
<br />
<br />
<br />
<strong>We could argue that (On peut soutenir que)</strong><br />
<br />
We could argue that legalizing drug consumption would have less negative impacts on society. <img class="icone" src="http://www.eguens.com/v2/images/ico_fleche_d.png" /> On peut soutenir que legaliser la consommation de drogue aura moins d&rsquo;impacts negatifs sur la soci&eacute;t&eacute;.<br />
<br />
<br />
<br />
<strong>I must say / admit that ( Je dois dire que)</strong><br />
<br />
I must say that I agree with the previous statement. <img class="icone" src="http://www.eguens.com/v2/images/ico_fleche_d.png" /> Je dois dire que je suis d&rsquo;accord avec la d&eacute;claration pr&eacute;c&eacute;dente.<br />
<br />
<br />
<br />
<strong>As far as I am concerned (me concernant)</strong><br />
<br />
As far as I am concerned, I am not driving this car. <img class="icone" src="http://www.eguens.com/v2/images/ico_fleche_d.png" /> Me concernant, je ne conduirai pas cette voiture.<br />
<br />
<br />
<br />
<strong>Let&rsquo;s consider (consid&eacute;rons)</strong><br />
<br />
Let&rsquo;s consider first all the facts before making any judgments. <img class="icone" src="http://www.eguens.com/v2/images/ico_fleche_d.png" /> Consid&eacute;rons d&rsquo;abord tous les faits avant de faire tout jugement.</p>
'

            );
        $topic->setSummary('Expressions pour exprimer son opinion');
        $topic->setTopic(Lesson::$CONST_TOPIC['VOCABULARY']);
        $author = $this->getReference('user.super_admin');
        $topic->setAuthor($author);
        $manager->persist($topic);
        $manager->flush();

    }



        public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
        /**
     * @return \Faker\Generator
     */
    public function getFaker()
    {
        return $this->container->get('faker.generator');
    }
}