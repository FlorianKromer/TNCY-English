<?php

/*
 * This file is part of the Sonata project.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace TNCY\SchoolBundle\Block;

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\BlockBundle\Block\BaseBlockService;
use Sonata\BlockBundle\Block\BlockContextInterface;
use Sonata\BlockBundle\Model\BlockInterface;
use Sonata\CoreBundle\Model\Metadata;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityManager;
/**
 * @author     Thomas Rabaix <thomas.rabaix@sonata-project.org>
 */
class HomeworkBlockService extends BaseBlockService
{
    private $em;
    
    public function __construct($name, $templating, EntityManager $entityManager)
    {
            parent::__construct($name, $templating);
            $this->em = $entityManager;
    }
    /**
     * {@inheritdoc}
     */
    public function execute(BlockContextInterface $blockContext, Response $response = null)
    {
        // $settings = array_merge($this->getDefaultSettings(), $blockContext->getSettings());

        $myentityrepository = $this->em->getRepository('TNCYSchoolBundle:ExerciceResult');

            $query = $this->em
            ->createQueryBuilder()
            ->select( 'exerciceResult')
            ->from('TNCYSchoolBundle:ExerciceResult', 'exerciceResult')
            ->leftJoin('TNCYSchoolBundle:Homework', 'homework', 'WITH', 'exerciceResult.homework = homework')
            ->where('exerciceResult.homework = :h')
            ->setParameter('h', $blockContext->getSettings()['homeworkId'])
            ->getQuery();
            $results = $query->getResult();
            
        return $this->renderResponse($blockContext->getTemplate(), array(
            'block'     => $blockContext->getBlock(),
            'settings'  => $blockContext->getSettings(),
            'results'   =>  $results
        ), $response);
    }

    /**
     * {@inheritdoc}
     */
    public function buildEditForm(FormMapper $formMapper, BlockInterface $block)
    {
        $formMapper->add('settings', 'sonata_type_immutable_array', array(
            'keys' => array(
                array('content', 'textarea', array()),
            ),
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureSettings(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'content'  => 'Insert your custom content here',
            'template' => 'TNCYSchoolBundle:Block:homework_block.html.twig',
            'homeworkId' => 0,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockMetadata($code = null)
    {
        return new Metadata($this->getName(), (!is_null($code) ? $code : $this->getName()), false, 'SonataBlockBundle', array(
            'class' => 'fa fa-file-text-o',
        ));
    }
}
