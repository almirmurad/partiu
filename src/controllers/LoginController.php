<?php
namespace src\controllers;

use core\ControllerGerenciador;
use src\handlers\LoginHandler;

class LoginController extends ControllerGerenciador {


    public function signin() {
        $flash ='';
        if(!empty($_SESSION['flash'])){
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $this->render('signin',[
            'flash' => $flash
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

    public function signup(){
        $flash ='';
        $page ="Cadstro de Usuarios";
        if(!empty($_SESSION['flash'])){
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $this->render('addUser',[
            'flash' => $flash,
            'page'  => $page
        ]);
    }

    public function signout(){
        $_SESSION['token'] = '';
        $this->redirect('/login');
    }


}