<?php
namespace src\controllers;


use \core\ControllerGerenciador;
use src\handlers\LoginHandler;
use src\models\User;
use src\functions\FuncoesUteis;

class UsersController extends ControllerGerenciador {

    private $loggedUser;
    
    public function __construct()
    {
        $this->loggedUser = LoginHandler::checkLogin();
        if($this->loggedUser === false){
            $this->redirect('/login');
        }   
    }

    public function addUser() {
        $page = "Adicionar Usuário";
        $this->render('addUser', ['page' => $page,
        'loggedUser'=>$this->loggedUser]);
    }

    public function addUserAction() {
        

        $name   = filter_input(INPUT_POST, 'name');
        $mail   = filter_input(INPUT_POST, 'mail', FILTER_VALIDATE_EMAIL);
        $pass   = filter_input(INPUT_POST, 'pass');
        $phone  = filter_input(INPUT_POST, 'phone');
        $type   = filter_input(INPUT_POST, 'type');
        //$parceria = filter_input(INPUT_POST, 'parceria');
        $typesPartnerId = filter_input(INPUT_POST, 'typesPartner_id');
        
        // $avatar = $_FILES['avatar']['name'];  
        // echo"<pre>";
        // var_dump($_POST);
        // echo"</pre>";
        // echo $avatar;
        // exit;

    

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



            // if(LoginHandler::emailExists($mail) === false){
            //     $token = LoginHandler::addUser($name, $mail, $pass, $phone, $type, $avatar, $typesPartnerId);
            //     $_SESSION['token'] = $token;
                
            //     $this->redirect('/gerenciador');
            // }else{
            //     $_SESSION['E-Mail já cadastrado!'];
            //     $this->redirect('/registration');
            // }
        }
        // echo"<script>alert('Erro ao cadastrar Usuário!');</script>";
        // $this->redirect('/newUser');
    }

    public function listUsers(){
        $page = "Lista de Usuarios";
        $usuarios = User::select()->execute();
        $this->render('listUsers',[
            'loggedUser'=>$this->loggedUser,
            'usuarios' => $usuarios,
            'page'=>$page
        ]);
    }

    public function editUser($args){
        $flash = '';
        if(!empty($_SESSION['flash'])){
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }

        $page       = "Edição de Usuário";
        $usuario    = User::select()->find($args['id']);
        $this->render('editUser', [
            'loggedUser'=>$this->loggedUser,
            'page'      =>$page,
            'usuario'   =>$usuario,
            'flash'     =>$flash
        ]);
    }

    public function editUserAction($args){
        $id = $args['id'];
        $name   = filter_input(INPUT_POST, 'name');
        $mail   = filter_input(INPUT_POST, 'mail', FILTER_VALIDATE_EMAIL);
        $pass   = filter_input(INPUT_POST, 'pass');
        $phone  = filter_input(INPUT_POST, 'phone');
        $type   = filter_input(INPUT_POST, 'type');
        $avatar = $_FILES['avatar']['name'];
        
        if($name && $mail && $pass && $phone && $type && $avatar  ){

            $alterado = LoginHandler::editUser($name, $mail, $pass, $phone, $type, $avatar, $id);
            if($alterado === true){
                $_SESSION['flash'] = "Usuário aterado com sucesso!";
                $this->redirect('/user/'.$args['id'].'/editUser');
            }else{
                $_SESSION['flash'] = "Erro ao tentar alterar o usuário!";
                $this->redirect('/user/'.$args['id'].'/editUser'); 
            }
        }
        $_SESSION['flash'] = "Erro ao tentar alterar o usuário! Obs.:Preencha todos os campos.";
        $this->redirect( '/user/'.$args['id'].'/editUser');        
    }

    public function deleteUser($args){
        User::delete()->where('id', $args['id'])->execute();
        $this->redirect('/users');
    }

}