<?php

namespace TNCY\SchoolBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use TNCY\SchoolBundle\Form\VocabularyType;
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
        $random = array_rand($listMemory, 1);
        $memory = $listMemory[$random];
        // var_dump($memory->getItems()[0]);
		$serializedEntity = $this->container->get('serializer')->serialize($memory->getItems(), 'json');
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
			$soundCloundTrackEmbed = $song->getSoundCloundTrackEmbed();
            if (! empty($song->getLyrics())) {
                $lyrics = str_replace("\n", '<br>', $song->getLyrics());
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

    public function vocabularyAction(Request $request)
    {

        if ($request->getMethod() == 'GET') {
            $repository = $this
                ->getDoctrine()
                ->getManager()
                ->getRepository('TNCYSchoolBundle:VocWord');

            $vocs = $repository->findAll();
            
            $wordList = [];

            foreach ($vocs as $voc) {
                $wordList[$voc->getTranslated()] = $voc->getOriginal();
            }

            return $this->render('TNCYSchoolBundle:Exercice:vocabulary.html.twig',array('wordList'=>$wordList));
        }
        else {
            return null;
        }
    }

    public function matchAction(Request $request)
    {
        $repository = $this
                ->getDoctrine()
                ->getManager()
                ->getRepository('TNCYSchoolBundle:MatchWord');

        $phrases = $repository->findAll();

        $start = [];
        $end = [];
        $correc = [];
        foreach ($phrases as $phrase) {
            $start[] = $phrase->getStart();
            $end[] = $phrase->getEnd();
            $correc[$phrase->getStart()] = $phrase->getEnd();
        }
        shuffle($end);
        return $this->render('TNCYSchoolBundle:Exercice:match.html.twig',array('start'=>$start, 'end' => $end, 'correc' => $correc));        
    }
}