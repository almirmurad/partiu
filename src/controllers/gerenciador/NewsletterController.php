<?php
namespace src\controllers\gerenciador;

use core\ControllerGerenciador;
use src\models\Newsletter;
use src\handlers\LoginHandler;
use src\handlers\gerenciador\NewsletterHandler;

class NewsletterController extends ControllerGerenciador{

    private $loggedUser;
    
    public function __construct()
    {
        $this->loggedUser = LoginHandler::checkLogin();
        if($this->loggedUser === false){
            $this->redirect('/login');
        }   
    }
    
    
    public function listNewsl(){

        $page = "Lista de contatos para newsletter";
        $newsletter = NewsletterHandler::getNewsletter();
        
        $this->render('listNewsletter',[
            'loggedUser'=>$this->loggedUser,
            'newsletter' => $newsletter,
            'page'=>$page
        ]);

    }

    
    public function deleteNewsl($args){
        //package::delete()->where('partner_id',$args['id'])->execute();
        NewsletterHandler::deleteNewsletter($args['id']);
        $this->redirect('/newsletter');
    }
}


