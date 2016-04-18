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
        $this->loadBeIng($manager);
        $this->loadComparatif($manager);
        //$this->loadRandom($manager);
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

    public function loadBeIng($manager)
    {
                $topic = new Lesson();
        $topic->setName('BE + ING');
        $topic->setContent('<h1><strong>Pr&eacute;sent en BE + ING: cours </strong></h1>

<p><br />
<strong>Le pr&eacute;sent en BE + -ING</strong></p>

<p>&nbsp;</p>

<p><strong>autrefois appel&eacute; &#39;pr&eacute;sent continu&#39;/&#39;pr&eacute;sent progressif&#39; </strong></p>

<p><strong>Regardez cette image : </strong><img src="http://www.anglaisfacile.com/free/news/1foot.gif" style="height:160px; width:200px" /></p>

<p>&nbsp;</p>

<p><strong>- What are they doing? (Que sont-ils en train de faire?)</strong><br />
<strong>- They are playing football. (Ils jouent au football).</strong></p>

<p><strong>Principal emploi: action en cours au moment o&ugrave; l&#39;on parle.</strong></p>

<p><strong>Syntaxe: Auxiliaire BE (conjugu&eacute; au pr&eacute;sent) + Verbe en -ing</strong><br />
<strong>Exemple: </strong><br />
<strong>I am playing football.</strong><br />
<strong>You are playing football.</strong><br />
<strong>He/She/It is playing football.</strong><br />
<strong>We are playing football.</strong><br />
<strong>You are playing football.</strong><br />
<strong>They are playing football.</strong></p>

<p>&nbsp;</p>

<p><strong>N&eacute;gation: I am not playing football, you are not playing football...</strong></p>

<p><strong>Question: Am I playing football? Are you playing football? Is he playing football? ...</strong></p>

<p><strong>R&eacute;ponses:</strong><br />
<strong>Are they playing football?</strong></p>

<div>
<table border="1" cellpadding="0" cellspacing="0" style="width:85%">
    <tbody>
        <tr>
            <td><strong>R&eacute;ponse longue:</strong></td>
            <td><strong>Yes, they&#39;re playing football.</strong></td>
            <td><strong>No, they aren&#39;t playing football.</strong></td>
        </tr>
        <tr>
            <td><strong>R&eacute;ponse courte:</strong></td>
            <td><strong>Yes, they are.</strong></td>
            <td><strong>No, they aren&#39;t.</strong></td>
        </tr>
    </tbody>
</table>

<p>&nbsp;</p>
</div>
');
        $topic->setSummary('Pr&eacute;sent en BE + ING: cours');
        $topic->setTopic(Lesson::$CONST_TOPIC['CONJUGATION']);
        $author = $this->getReference('user.super_admin');
        $topic->setAuthor($author);
        $manager->persist($topic);
        $manager->flush();
    }

public function loadComparatif($manager)
{
        $topic = new Lesson();
        $topic->setName('Le comparatif');
        $topic->setContent('<h1><strong>Le comparatif</strong></h1>

<p><strong><strong>R&eacute;gle:<br />
On utilise le comparatif pour comparer 2 choses et mettre en valeur la sup&eacute;riorit&eacute;, l&#39;inf&eacute;riorit&eacute; ou l&#39;&eacute;galit&eacute; d&#39;un terme par rapport &agrave; un autre. </strong></strong></p>

<table align="center" border="1" cellpadding="5" cellspacing="0" style="width:75%">
    <tbody>
        <tr>
            <td>&nbsp;</td>
            <td>
            <p><strong><strong>Adjectifs courts ( 1 - 2 syllabes)</strong></strong></p>
            </td>
            <td>
            <p><strong><strong>Adjectifs longs (3+ syllabes)</strong></strong></p>
            </td>
        </tr>
        <tr>
            <td>
            <p><strong><strong>sup&eacute;riorit&eacute;<br />
            (plus... que)</strong></strong></p>
            </td>
            <td>
            <p><strong><strong>ADJ + -ER than<br />
            fast &gt; X is faster than Y.</strong></strong></p>
            </td>
            <td>
            <p><strong><strong>MORE + ADJ than<br />
            expensive &gt; X is more expensive than Y.</strong></strong></p>
            </td>
        </tr>
        <tr>
            <td>
            <p><strong><strong>&eacute;galit&eacute;<br />
            (aussi... que)</strong></strong></p>
            </td>
            <td colspan="2">
            <div>
            <p><strong><strong>as ADJ as<br />
            big &gt; X is as big as Y.</strong></strong></p>
            </div>
            </td>
        </tr>
        <tr>
            <td>
            <p><strong><strong>inf&eacute;riorit&eacute;<br />
            (moins... que)</strong></strong></p>
            </td>
            <td colspan="2">
            <div>
            <p><strong><strong>less ADJ than<br />
            beautiful &gt; X is less beautiful than Y.</strong></strong></p>
            </div>
            </td>
        </tr>
    </tbody>
</table>

<div style="clear:both;">&nbsp;</div>

<p>&nbsp;</p>

<p><strong><strong>Exemples:<br />
Jean is taller than Catherine.<br />
Philippe is less tall than Jean.<br />
Le&iuml;la is as tall as Jean. </strong></strong></p>

<p><strong><strong>young --&gt; younger ; tall --&gt; taller ; old --&gt; older </strong></strong></p>

<p><strong><strong>NOTES:<br />
&gt; Si l&#39;adjectif se termine par &quot;-y&quot;, le &quot;-y&quot; se transforme en &quot;-i&quot;:<br />
heavy --&gt; heavier<br />
early --&gt; earlier<br />
busy --&gt; busier<br />
healthy --&gt; healthier<br />
chilly --&gt; chillier </strong></strong></p>

<p><strong><strong>&gt; Si l&#39;adjectif se termine d&eacute;j&agrave; par &quot;-e&quot;, on ne rajoute que &quot;-r&quot;:<br />
wise --&gt; wiser<br />
large --&gt; larger<br />
simple --&gt; simpler<br />
late --&gt; later </strong></strong></p>

<p><strong><strong>&gt; Si l&#39;adjectif se termine par Consonne-Voyelle-Consonne, on redouble la consonne finale:<br />
big --&gt; bigger<br />
thin --&gt; thinner<br />
hot --&gt; hotter </strong></strong></p>

<p><strong><strong>&gt; Comparatifs irr&eacute;guliers, &agrave; apprendre par coeur:<br />
good --&gt; better<br />
bad --&gt; worse<br />
far --&gt; farther</strong></strong></p>

<p>&nbsp;</p>
');
        $topic->setSummary('Le comparatif');
        $topic->setTopic(Lesson::$CONST_TOPIC['ORTHOGRAPH']);
        $author = $this->getReference('user.super_admin');
        $topic->setAuthor($author);
        $manager->persist($topic);
        $manager->flush();
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
        ');
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