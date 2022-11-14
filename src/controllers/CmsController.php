<?php
namespace src\controllers;

use \core\ControllerGerenciador;
use \src\handlers\LoginHandler;
use \src\handlers\PackageHandler;

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
        $dash = PackageHandler::dash();
        
        // echo"<pre>";
        // print_r($dash);
        // exit;
               
        $this->render('home', [
            'page' => $page,
            'loggedUser'=>$loggedUser,
            'totalPack'=>$dash['total'],
            'totalActive'=>$dash['totalActive'],
            'totalForaPrazo' =>$dash['totalForaPrazo'],
        ]);
    }

}