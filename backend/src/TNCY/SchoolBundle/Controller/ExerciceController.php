<?php

namespace TNCY\SchoolBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use TNCY\SchoolBundle\Entity\Contact;
use TNCY\SchoolBundle\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;


class ExerciceController extends Controller
{
    public function memoryAction()
    {
        return $this->render('TNCYSchoolBundle:Exercice:memory.html.twig');
    }

    public function songAction(Request $request)
    {

    	if ($request->getMethod() == 'GET') {
			$soundCloundTrackId = 230155983;
			$musixmatch = $this->get_musixmatch_lyrics("ADELE","hello","32f205fed3341ff325396c97340e50dd");
			$musixmatch = json_decode($musixmatch);
			$lyrics = $musixmatch->message->body->lyrics->lyrics_body;
			$lyrics = str_replace("\n", '<br>', $lyrics);
			$gaps = ['wondering','California'];

			foreach ($gaps as $key => $word) {
			    $lyrics = str_replace($word, '<input type="text" name="word-'.$key.'" data-answer="'.$word.'">', $lyrics);

			}

			return $this->render('TNCYSchoolBundle:Exercice:song.html.twig',array('lyrics'=>$lyrics,'soundCloundTrackId'=>$soundCloundTrackId));    	}
    	else{
    		//à voir si validation php ou javascript
    	}



    	
    }

    function get_musixmatch_lyrics($artist,$song,$apikey){
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