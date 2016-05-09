<?php

/*
 * This file is part of the Sonata package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace TNCY\SchoolBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;

use Sonata\NewsBundle\Model\CommentInterface;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadNewsData extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
{
    private $container;

    function getOrder()
    {
        return 6;
    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
//        $userManager = $this->getUserManager();
        $postManager = $this->getPostManager();

        $faker = $this->getFaker();

        $tags = array(
            'reporters' => null,
            'journalist' => null,
            'general' => null,
            'Korea' => null,
        );

        foreach($tags as $tagName => $null) {
            $tag = $this->getTagManager()->create();
            $tag->setEnabled(true);
            $tag->setName($tagName);

            $tags[$tagName] = $tag;
            $this->getTagManager()->save($tag);
        }

        $collection = $this->getCollectionManager()->create();
        $collection->setEnabled(true);
        $collection->setName('General');
        $this->getCollectionManager()->save($collection);

        foreach (range(1, 5) as $id) {
            $post = $postManager->create();
            $post->setAuthor($this->getReference('user.super_admin'));

            $post->setCollection($collection);
            $post->setAbstract("Foreign journalists leave a venue after being told that coverage plans had changed until further notice in Pyongyang, North Korea, May 8, 2016.");
            $post->setEnabled(true);
            $post->setTitle("North Korea Expels BBC Journalists");
            $post->setPublicationDateStart($faker->dateTimeBetween('-30 days', '-1 days'));

            $id = $this->getReference('sonata-media-0')->getId();

            $raw =<<<RAW
<p><img alt="picture" src="http://gdb.voanews.com/98F88DCD-70C3-43AA-AE29-309D8D082E90_w640_r1_s.jpg" style="height:360px; width:640px" /></p>

<p>North Korea has expelled a group of BBC reporters, <strong>apparently</strong> because the country was unhappy with their reports.</p>

<p>The BBC&rsquo;s Tokyo correspondent, Rupert Wingfield-Hayes, was detained Friday. His cameraman and producer were also detained as the group was about to leave North Korea.</p>

<p>The BBC reported that Wingfield-Hayes was <strong>interrogated</strong> by North Korean officials for eight hours and made to sign a statement. The team remained in Pyongyang before flying to Beijing on Monday. &nbsp;&nbsp;</p>

<p>The BBC reporters were in North Korea before the Workers&rsquo; Party Congress meeting in Pyongyang. They were also following a delegation of Nobel Prize winners who were visiting the country.</p>

<p>The team later joined about 130 other foreign reporters covering the Workers&rsquo; Party Congress. The event is the biggest political convention to be held in North Korea in 36 years</p>

<p>But the reporters covering the congress were kept away from party officials attending the meeting. The reporters also were closely <strong>monitored</strong> by North Korean representatives.</p>

<p>The party congress has tried to show unity and support for the policies of North Korean leader Kim Jong Un. Among those policies are development of both the economy and nuclear weapons.</p>

<p>During the congress, North Korean leader Kim Jong-Un declared his country was a nuclear state. However, he said North Korea would not use nuclear weapons unless its <strong>sovereignty</strong> is violated.</p>

<p>Kim said he is willing to consider normalizing ties with countries that have been hostile to North Korea in the past.</p>

<p>Experts said the North Korean leader did not offer any serious new proposals for reducing international tensions over the country&rsquo;s nuclear program.</p>

<p>South Korea&rsquo;s Defense Ministry rejected Kim&rsquo;s <strong>assertion</strong> that North Korea is a nuclear power.</p>

<p>&ldquo;It is a consistent position of us and the international community that we do not recognize North Korea as a nuclear state,&rdquo; said a defense ministry spokesman. He said that Seoul will continue to push efforts to make North Korea give up its nuclear program through <strong>sanctions</strong> and pressure.</p>

<p>The United Nations placed strong new sanctions on North Korea in March for its latest nuclear test in January and a rocket launch earlier this year.</p>

<p>Korea expert Bruce Bennett from the RAND Corporation told VOA the North does not need nuclear weapons for its defense.</p>

<p>Bennett pointed out that North Korea did not have nuclear weapons for many years after the end of the Korean War in 1953. He said during that time, it was not attacked by the United States.&nbsp;</p>

<p>He also warned that once North Korea starts with a small number of nuclear weapons, that number could keep growing.</p>

<p>&ldquo;If they have more than a few, they&rsquo;re not purely defensive, they&rsquo;re starting to field an offensive capability. And that&rsquo;s bad news for North Korea because they may eventually push the U.S. to do something about it.&rdquo;</p>

<p>Bennett added that North Korea lacks credibility on the nuclear issue because it has broken agreements and shared nuclear technology with other countries.</p>

<p>Another expert, Bong Young-shik from the Asan Institute for Policy Studies in Seoul, doubts the commitment made by Kim Jong-Un at the congress.</p>

<p>&ldquo;I think that proposal needs to be weighed to see if it carries any <strong>significance</strong>, or it is just cover for the sake of proposing to the world that the North Korean regime might be interested in a reduction of tension.&rdquo;</p>

<p>I&rsquo;m Mario Ritter.</p>

<p>&nbsp;</p>

<p><em>Brian Padden and Victor Beattie reported on this story for VOANews.com. Youmi Kim in Seoul also contributed to the report. Bryan Lynn adapted this story for Learning English. Mario Ritter was the editor.</em></p>

<p><em>We want to hear from you. Write to us in the Comments section, and post on <a href="http://www.facebook.com/voalearningenglish" target="_blank">our Facebook page</a>.</em></p>

<p>________________________________________________________________</p>

<p><strong>Words in This Story</strong></p>

<p>&nbsp;</p>

<p><strong>apparently </strong><em>&ndash; adv.</em> according to what you have heard or read, or to the way something appears</p>

<p><strong>interrogate </strong><em>&ndash; v.</em> to ask somebody a lot of questions over a long period of time, sometimes in an aggressive way</p>

<p><strong>monitor </strong><em>&ndash; v.</em> to watch closely or keep track of</p>

<p><strong>sovereignty </strong><em>&ndash; n.</em> complete power to govern a country</p>

<p><strong>assertion</strong><em> &ndash; n.</em> a statement that you strongly believe something to be true</p>

<p><strong>sanction</strong><em>&ndash; n.</em> an official order that restricts trade or contacts with a country</p>

<p><strong>significance</strong><em> &ndash; n.</em> the importance of something, especially when it has an impact on something in the future</p>

RAW
;


            $post->setRawContent($raw);
            $post->setContentFormatter('richhtml');

            $post->setContent($this->getPoolFormatter()->transform($post->getContentFormatter(), $post->getRawContent()));
            $post->setCommentsDefaultStatus(CommentInterface::STATUS_VALID);

            foreach($tags as $tag) {
                $post->addTags($tag);
            }

            foreach(range(1, $faker->randomDigit + 2) as $commentId) {
                $comment = $this->getCommentManager()->create();
                $comment->setEmail($faker->email);
                $comment->setName($faker->name);
                $comment->setStatus(CommentInterface::STATUS_VALID);
                $comment->setMessage($faker->sentence(25));
                $comment->setUrl($faker->url);

                $post->addComments($comment);
            }

            $postManager->save($post);
        }
    }

    public function getPoolFormatter()
    {
        return $this->container->get('sonata.formatter.pool');
    }

    /**
     * @return \Sonata\CoreBundle\Model\ManagerInterface
     */
    public function getTagManager()
    {
        return $this->container->get('sonata.classification.manager.tag');
    }

    /**
     * @return \Sonata\CoreBundle\Model\ManagerInterface
     */
    public function getCollectionManager()
    {
        return $this->container->get('sonata.classification.manager.collection');
    }

    /**
     * @return \Sonata\NewsBundle\Model\PostManagerInterface
     */
    public function getPostManager()
    {
        return $this->container->get('sonata.news.manager.post');
    }

    /**
     * @return \Sonata\NewsBundle\Model\CommentManagerInterface
     */
    public function getCommentManager()
    {
        return $this->container->get('sonata.news.manager.comment');
    }

    /**
     * @return \Faker\Generator
     */
    public function getFaker()
    {
        return $this->container->get('faker.generator');
    }
}