<?php

namespace TNCY\SchoolBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use TNCY\SchoolBundle\Entity\Memory;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;


class ExerciceController extends Controller
{
    public function memoryAction()
    {
        return $this->render('TNCYSchoolBundle:Exercice:memory.html.twig');
    }

    public function memoryDataAction()
    {
		$repository = $this
		->getDoctrine()
		->getManager()
		->getRepository('TNCYSchoolBundle:Memory')
		;

		$listMemory = $repository->findAll();

		$serializedEntity = $this->container->get('serializer')->serialize($listMemory, 'json');
		return new JsonResponse(json_decode($serializedEntity));
    }


    public function songAction(Request $request)
    {

    	if ($request->getMethod() == 'GET') {

            $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('TNCYSchoolBundle:Song')
            ;

            $listSong = $repository->findAll();
            $random = array_rand($listSong, 1);
            $song = $listSong[$random];
            // var_dump($song);
			$soundCloundTrackEmbed = $song->getSoundCloundTrackEmbed();
			$musixmatch = $this->get_musixmatch_lyrics($song->getArtist(),$song->getName(),"32f205fed3341ff325396c97340e50dd");
			$musixmatch = json_decode($musixmatch);
            // var_dump($musixmatch);
            if ($musixmatch->message->header->status_code == 200) {
                $lyrics = $musixmatch->message->body->lyrics->lyrics_body;
                $lyrics = str_replace("\n", '<br>', $lyrics);
                $gaps = $song->getGaps();

                foreach ($gaps as $key => $word) {
                    $htmlContent = '
                     <input type="text" name="word-'.$key.'" data-answer="'.$word.'" >';
                    $lyrics = str_ireplace($word, $htmlContent, $lyrics);

                }
            }
            else{
                $lyrics = "Error: Any lyrics was found for ".$song->getArtist()." : ".$song->getName();
                $soundCloundTrackEmbed = "";
            }


			return $this->render('TNCYSchoolBundle:Exercice:song.html.twig',array('lyrics'=>$lyrics,'soundCloundTrackEmbed'=>$soundCloundTrackEmbed));    	}
    	else{
    		//à voir si validation php ou javascript
    	}



    	
    }

    function get_musixmatch_lyrics($artist,$song,$apikey){
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