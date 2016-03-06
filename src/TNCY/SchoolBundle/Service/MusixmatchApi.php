<?php
namespace TNCY\SchoolBundle\Service;


class MusixmatchApi
{
    /** @var \Symfony\Component\DependencyInjection\ContainerInterface */
    private $container;
    
    public function setContainer (\Symfony\Component\DependencyInjection\ContainerInterface $container) {
        $this->container = $container;
    }

	function  get_musixmatch_lyrics($artist,$song){
        $apikey = $this->container->getParameter('musixmatch');
        $artist = str_replace(' ', '%20', $artist);
        $song = str_replace(' ', '%20', $song);
        $url = ("http://api.musixmatch.com/ws/1.1/matcher.lyrics.get?q_track=".$song."&q_artist=".$artist."&apikey=".$apikey);
        $ch = curl_init();
        //config curl
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $result = curl_exec($ch);
        curl_close($ch);
        return str_replace("******* This Lyrics is NOT for Commercial use *******","",$result); 
    }
}