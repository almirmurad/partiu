<?php
namespace src\controllers;

use core\ControllerGerenciador;
use src\handlers\LoginHandler;

class LoginController extends ControllerGerenciador {

    private $loggedUser;

    public function __construct()
    {   
        $this->loggedUser = LoginHandler::checkLogin();
  
    }


    public function signin() {
        $id = filter_input(INPUT_GET, 'partnerid');
        $pid =filter_input(INPUT_GET, 'parceria');
       
        $flash ='';
        if(!empty($_SESSION['flash'])){
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $this->render('signin',[
            'flash' => $flash,
            'id'=>$id,
            'pid'=>$pid
        ]);
    }
    public function signinAction(){
        $mail   = filter_input(INPUT_POST, 'mail', FILTER_VALIDATE_EMAIL);
        $pass   = filter_input(INPUT_POST, 'pass');

        if($mail && $pass){
            $token = LoginHandler::verifyLogin($mail, $pass);
            if($token){
                $_SESSION['token'] = $token;
                $this->redirect('/gerenciador');
            }else{
                $_SESSION['flash'] = "E-Mail e ou senha não conferem";
                $this->redirect('/login');
            }

        }else{
            $this->redirect('/login');
        }
    }

    public function signup($args){
        
        $id = $args['id'];
        $pid = $args['pid'];
        
        $flash ='';
        $page ="Cadastro de Usuarios";
        if(!empty($_SESSION['flash'])){
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $this->render('signup',[
            'flash' => $flash,
            'page'  => $page,
            'id' => $id,
            'pid'=>$pid,
            'loggedUser'=>$this->loggedUser,
        ]);
    }

    public function signout(){
        $_SESSION['token'] = '';
        $this->redirect('/login');
    }


}