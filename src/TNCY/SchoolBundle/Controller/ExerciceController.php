<?php

namespace TNCY\SchoolBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use TNCY\SchoolBundle\Form\VocabularyType;
use TNCY\SchoolBundle\Entity\Memory;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;


class ExerciceController extends Controller
{
    public function resultAction(Request $request)
    {
        $id ="";
        $result="";
        if ('POST' === $request->getMethod())
        {
            //             $form->handleRequest($request);

            // $form->bind($request); //Symfony 2.1.x

            $id = $request->get('id');
            $result = $request->get('result');
        }
        else{
            throw $this->createNotFoundException('Should be a post request');

        }

        $repository = $this
        ->getDoctrine()
        ->getManager()
        ->getRepository('TNCYSchoolBundle:ExerciceResult')
        ;
        $exResult = $repository->find($id);
        if ($exResult != null) {
            $exResult->setResult($result);
            $this->getDoctrine()->getManager()->persist($exResult);
            $this->getDoctrine()->getManager()->flush();
            return new JsonResponse(json_decode(true));

        }
        else{
            throw $this->createNotFoundException('exercice not found');
        }

    }

    public function findAction($id)
    {
        $repository = $this
        ->getDoctrine()
        ->getManager()
        ->getRepository('TNCYSchoolBundle:ExerciceResult')
        ;
        $exResult = $repository->find($id);
        if ($exResult != null) {
            switch (get_class($exResult->getExercice()) ) {
                case 'TNCY\SchoolBundle\Entity\Memory':
                    return $this->redirectToRoute('tncy_school_memory', array('idExerciceResult'=>$exResult->getId(),'idExercice'=>$exResult->getExercice()->getId()));
                    break;
                case 'TNCY\SchoolBundle\Entity\Song':
                    return $this->redirectToRoute('tncy_school_song', array('idExerciceResult'=>$exResult->getId(),'idExercice'=>$exResult->getExercice()->getId()));
                    break;
                default:
                    # code...
                    break;
            }
        }
        print get_class($exResult->getExercice()) ;
    }

    public function memoryAction($idExercice, $idExerciceResult)
    {
        return $this->render('TNCYSchoolBundle:Exercice:memory.html.twig',array('idExerciceResult'=>$idExerciceResult,'exerciceId'=>$idExercice));
    }



    public function memoryDataAction($id)
    {

		$repository = $this
		->getDoctrine()
		->getManager()
		->getRepository('TNCYSchoolBundle:Memory')
		;
        $memory = $repository->find($id);
        if (! isset($memory)) {
            $listMemory = $repository->findAll();
            $random = array_rand($listMemory, $id);
            $memory = $listMemory[$random];
        }

        // var_dump($memory->getItems()[0]);
		$serializedEntity = $this->container->get('serializer')->serialize($memory->getItems(), 'json');
		return new JsonResponse(json_decode($serializedEntity));
    }


    public function songAction(Request $request,$idExerciceResult,$idExercice)
    {

    	if ($request->getMethod() == 'GET') {

            $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('TNCYSchoolBundle:Song')
            ;
            $song = $repository->find($idExercice);
            if(! isset($song)){
                $listSong = $repository->findAll();
                $random = array_rand($listSong, 1);
                $song = $listSong[$random];
            }


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

            
			return $this->render('TNCYSchoolBundle:Exercice:song.html.twig',array('lyrics'=>$lyrics,'soundCloundTrackEmbed'=>$soundCloundTrackEmbed,'idExerciceResult'=>$idExerciceResult));
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