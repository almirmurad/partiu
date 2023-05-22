<?php
namespace src\controllers;

use \core\ControllerGerenciador;
use \src\handlers\LoginHandler;
use \src\handlers\gerenciador\DashboardHandler;

class CmsController extends ControllerGerenciador {

    private $loggedUser;
    
    public function __construct()
    {
        $this->loggedUser = LoginHandler::checkLogin();
        if($this->loggedUser === false){
            $this->redirect('/login');
        }   
    }

    public function index() {
        $page = "Dashboard";
        $loggedUser = $this->loggedUser = LoginHandler::checkLogin();
        $packageDash = DashboardHandler::packageDash();
        $newsDash = DashboardHandler::newsDash();
        $partnerDash = DashboardHandler::partnerDash();
        $postDash = DashboardHandler::postDash();
        $roadmapDash = DashboardHandler::roadmapDash();
        $eventDash = DashboardHandler::eventDash();
        $userDash = DashboardHandler::userDash();
        $newsletterDash = DashboardHandler::newsletterDash();
        $bannerDash = DashboardHandler::bannerDash();

        // echo"<pre>";
        // print_r($packageDash);
        // exit;
               
        $this->render('home', [
            'page' => $page,
            'loggedUser'=>$loggedUser,
            'totalPack'=>$packageDash['total'],
            'totalActive'=>$packageDash['totalActive'],
            'totalForaPrazo' =>$packageDash['totalForaPrazo'],
            'totalNews'=>$newsDash['total'],
            'totalNewsActive'=>$newsDash['totalActive'],
            'totalPartner'=>$partnerDash['total'],
            'totalPartnerActive'=>$partnerDash['totalActive'],
            'totalPost'=>$postDash['total'],
            'totalPostActive'=>$postDash['totalActive'],
            'totalRoadmap'=>$roadmapDash['total'],
            'totalRoadmapActive'=>$roadmapDash['totalActive'],
            'totalEvent'=>$eventDash['total'],
            'totalEventActive'=>$eventDash['totalActive'],
            'totalUser'=>$userDash['total'],
            'totalUserActive'=>$userDash['totalActive'],
            'totalNewsletter'=>$newsletterDash['total'],
            'totalBanner'=>$bannerDash['total'],
            'totalBannerActive'=>$bannerDash['totalActive'],
        ]);
    }

}