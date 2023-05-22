<?php
namespace src\controllers\site;


use \core\ControllerSite;
use src\handlers\LoginHandler;
use src\models\User;
use src\functions\FuncoesUteis;

class UserControllerSite extends ControllerSite {

    public function addUserAction() {
        
        $name   = filter_input(INPUT_POST, 'name');
        $mail   = filter_input(INPUT_POST, 'mail', FILTER_VALIDATE_EMAIL);
        $pass   = filter_input(INPUT_POST, 'pass');
        $phone  = filter_input(INPUT_POST, 'phone');
        $type   = filter_input(INPUT_POST, 'type');
        $typesPartnerId = filter_input(INPUT_POST, 'typesPartner_id');
    

        if($name && $mail && $pass && $phone && $type ){

            //pega as imagens e cria um array com todas
            $fotosNames = [];
            foreach($_FILES as $img){
               if(isset ($img['type'])){
                    if(in_array($img['type'],['image/jpeg', 'image/jpg', 'image/png'])){
                        $fotosNames[] = $img;
                    }
               } 
            }
            
            //verifica se existe a pasta imagens específica para pacotes 
            $caminho = "assets/img/img_admin/avatar";
            if(!is_dir($caminho)){
                //se não não existir cria
                mkdir($caminho, 0777);
            }
            //gera todas as imagens no tamanho específicado
            $imgNames = FuncoesUteis::editImg($fotosNames, 420, 300, $caminho);
         
            if(isset($imgNames) && !empty($imgNames)){
                //se gerou insere no banco de dados e retorna ao dashboard

                if(LoginHandler::emailExists($mail) === false){
                        $token = LoginHandler::addUser($name, $mail, $pass, $phone, $type, $imgNames, $typesPartnerId);
                        $_SESSION['token'] = $token;
                        
                        $this->redirect('/gerenciador');
                    }else{
                        $_SESSION['E-Mail já cadastrado!'];
                        $this->redirect('/registration');
                    }      
            }
            else{
                    //se não gerou retorna ao formulario
                    $this->redirect('/registration');
                } 
           
        }

    }






}