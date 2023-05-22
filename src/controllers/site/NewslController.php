<?php
namespace src\controllers\site;

use core\ControllerSite;
use src\handlers\site\NewslSiteHandler;
class NewslController extends ControllerSite{

    public function addNewsl() {
       
        
        $email = filter_input(INPUT_POST,'mail',FILTER_VALIDATE_EMAIL);
        $nome = filter_input(INPUT_POST,'name',FILTER_SANITIZE_SPECIAL_CHARS);
        $telefone = filter_input(INPUT_POST,'phone',FILTER_VALIDATE_INT);
        $check = (filter_input(INPUT_POST, 'check')) ? $check =1 : $check=0 ;

        if($email && $check){

            NewslSiteHandler::insertNewsl($email,$nome,$telefone,$check);
            $_SESSION['flash'] = "Email (".$email.") cadastrada com sucesso!";
            $this->redirect('/');

        }else{

            $_SESSION['flash'] = "Oscampos E-mail e Aceito são obrigatórios!";
            $this->redirect('/');

        }

        

    }

}