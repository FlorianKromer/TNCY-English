<?php

namespace TNCY\SchoolBundle\Twig;


class TNCYSchoolExtension extends \Twig_Extension
{
	private $container;


    public function __construct($container)
    {
        $this->container = $container;
    }

	public function getMediaPublicUrl($media, $format)
	{
		if($media === NULL )
			return "";

		$provider = $this->container->get($media->getProviderName());
		
		return $provider->generatePublicUrl($media, $format);
	}

    public function jsonDecode($str) {
        return json_decode($str);
    }
    
	// public function getFilters()
	// {
	// 	return array(
	// 		new \Twig_SimpleFilter('media_public_url', array($this, 'getMediaPublicUrl')),
	// 		);
	// }

    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('media_public_url', array($this, 'getMediaPublicUrl')),
            new \Twig_SimpleFunction('jsonDecode', array($this, 'jsonDecode')),
        );
    }

	public function getName()
	{
		return 'tncyschool_extension';
	}
}
