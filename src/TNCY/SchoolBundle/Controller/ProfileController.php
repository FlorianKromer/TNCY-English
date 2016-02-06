<?php

namespace TNCY\SchoolBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;

class ProfileController extends Controller
{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function marksAction($id)
    {
        $userManager = $this->get('fos_user.user_manager');

        $user = $userManager->find($id);

        if (!$user) {
            throw $this->createNotFoundException('The user does not exist');
        }
        return $this->render('TNCYSchoolBundle:Profile:profile_school.html.twig',array("user"=>$user));
    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function userAction($id)
    {

        $userManager = $this->get('fos_user.user_manager');

        $user = $userManager->find($id);

        if (!$user) {
            throw $this->createNotFoundException('The user does not exist');
        }

        return $this->render('TNCYSchoolBundle:Profile:profile_home.html.twig',array("user"=>$user));
    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function githubUserAction($id)
    {

        $userManager = $this->get('fos_user.user_manager');

        $user = $userManager->find($id);

        if (!$user) {
            throw $this->createNotFoundException('The user does not exist');
        }

        $repositories = $this->getGithubUserRepositories($user->getGithub());
        return $this->render('TNCYSchoolBundle:Profile:profile_github.html.twig',array("user"=>$user,"repositories"=>json_decode($repositories,true)));
    }

    /**
     * @param $name
     * @return mixed
     */
    public function getGithubUserRepositories($name){
        return $this->githubRequest('users/FlorianKromer/repos');
    }

    /**
     * @param $url
     * @return mixed
     */
    public function githubRequest($url){
        $base = 'https://api.github.com/';
        $ch = curl_init();
        //config curl
        curl_setopt($ch, CURLOPT_URL, $base.$url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch,CURLOPT_USERAGENT,'Awesome-Octocat-App');

        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function facebookUserAction($id)
    {

        $userManager = $this->get('fos_user.user_manager');

        $user = $userManager->find($id);

        if (!$user) {
            throw $this->createNotFoundException('The user does not exist');
        }
        FacebookSession::setDefaultApplication($this->container->getParameter('client_facebook_id'), $this->container->getParameter('client_facebook_secret'));


        $session = new FacebookSession($this->container->getParameter('client_facebook_id').'|'.$this->container->getParameter('client_facebook_secret'));
        if($session) {

            $request = new FacebookRequest($session, 'GET', '/1206746375?fields=id,name,picture');
            $response = $request->execute();
            $graphObject = $response->getGraphObject();

        }
//        $facebook = $this->getFacebookUserInformations($user->getFacebookUid());
        return $this->render('TNCYSchoolBundle:Profile:profile_social.html.twig',array("user"=>$user,"facebook"=>json_decode($response->getRawResponse(),true)));
    }
    /**
     * @param $name
     * @return mixed
     */
    public function getFacebookUserInformations($name){
        return $this->facebookRequest('me?fields=id,name,address,about,age_range,bio,birthday,context,cover,education,favorite_teams,favorite_athletes,email,gender');
    }
    /**
     * @param $url
     * @return mixed
     */
    public function facebookRequest($url){
        $base = 'https://graph.facebook.com/';
        $ch = curl_init();
        //config curl
        curl_setopt($ch, CURLOPT_URL, $base.$url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }
}