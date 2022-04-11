<?php
namespace src\controllers;

use \core\ControllerGerenciador;
use \src\handlers\LoginHandler;

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
        $this->render('home', [
            'page' => $page,
            'loggedUser'=>$loggedUser
        ]);
    }

}