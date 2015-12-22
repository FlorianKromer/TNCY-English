<?php

/**
 * This file is part of the <name> project.
 *
 * (c) <yourname> <youremail>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Application\Sonata\ClassificationBundle\Entity;

use Sonata\ClassificationBundle\Entity\BaseCollection as BaseCollection;
use Sonata\ClassificationBundle\Model\ContextInterface;
use Sonata\MediaBundle\Model\MediaInterface;

/**
 * This file has been generated by the Sonata EasyExtends bundle ( http://sonata-project.org/bundles/easy-extends )
 *
 * References :
 *   working with object : http://www.doctrine-project.org/projects/orm/2.0/docs/reference/working-with-objects/en
 *
 * @author <yourname> <youremail>
 */
class Collection extends BaseCollection
{
    /**
     * @var integer $id
     */
    protected $id;

    /**
     * @var \Application\Sonata\ClassificationBundle\Entity\Context
     */
    protected $context;

    /**
     * @var \Application\Sonata\MediaBundle\Entity\Media
     */
    protected $media;

    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set context
     *
     * @param \Application\Sonata\ClassificationBundle\Entity\Context $context
     * @return Collection
     */
    public function setContext(ContextInterface $context = null)
    {
        $this->context = $context;

        return $this;
    }

    /**
     * Get context
     *
     * @return \Application\Sonata\ClassificationBundle\Entity\Context 
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * Set media
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $media
     * @return Collection
     */
    public function setMedia(MediaInterface $media = null)
    {
        $this->media = $media;

        return $this;
    }

    /**
     * Get media
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media 
     */
    public function getMedia()
    {
        return $this->media;
    }
}