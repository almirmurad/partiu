<?php
namespace src\controllers;

use \core\ControllerGerenciador;
use src\handlers\LoginHandler;
use src\handlers\PackageHandler;
use src\models\Subcategorie;
use src\models\Package;
use src\functions\FuncoesUteis;

class PackageController extends ControllerGerenciador {

    private $loggedUser;
    
    public function __construct()
    {
        $this->loggedUser = LoginHandler::checkLogin();
        if($this->loggedUser === false){
            $this->redirect('/login');
        }   
    }

    public function addPackage() {
        
        $this->render('addPackage',[
            
            'page' => 'Cadastro de Pacotes', 
            'loggedUser'=>$this->loggedUser
        ]);
    }

    public function addPackageAction() {  
        $title   = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_ADD_SLASHES);
        $description   = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_ADD_SLASHES);
        $text   = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_ADD_SLASHES);
        $user_id = $this->loggedUser->id;
        $destino = filter_input(INPUT_POST, 'destination', FILTER_SANITIZE_ADD_SLASHES);
        $estado = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_ADD_SLASHES);
        $pais = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_ADD_SLASHES);
        $saidaDe = filter_input(INPUT_POST, 'exit_from', FILTER_SANITIZE_ADD_SLASHES);
        $dataSaida = filter_input(INPUT_POST, 'going_on');
        $dataRetorno = filter_input(INPUT_POST, 'return_in');
        $expiraEm = filter_input(INPUT_POST, 'expires_at');
        $preco = str_replace(",",".",str_replace(".","",filter_input(INPUT_POST, 'price')));
        
        if($title && $description && $text && $user_id && $destino && $estado && $pais && $saidaDe && $dataSaida && $dataRetorno && $expiraEm && $preco){
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
            $caminho = "media/uploads/imgs/packages";
            if(!is_dir($caminho)){
                //se não não existir cria
                mkdir($caminho, 0777);
            }
            //gera todas as imagens no tamanho específicado
            $imgNames = FuncoesUteis::editImg($fotosNames, 420, 300, $caminho);
            if(isset($imgNames) && !empty($imgNames)){
                //se gerou insere no banco de dados e retorna ao dashboard
                PackageHandler::addPackageAction($title, $description, $text, $imgNames, $user_id, $destino, $estado, $pais, $saidaDe, $dataSaida, $dataRetorno, $expiraEm, $preco);
                $this->redirect('/gerenciador');      
            }
            else{
                    //se não gerou retorna ao formulario
                    $this->redirect('/newsNews');
                }          
        }   
    }

    public function listPackages() {

        $page = "Lista de Pacotes";
        $packages = Package::select()->execute();
        $this->render('listPackages',[
            'loggedUser'=>$this->loggedUser,
            'packages' => $packages,
            'page'=>$page
        ]);

    }

    public function editPackage($args){
        $flash = '';
        if(!empty($_SESSION['flash'])){
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $package    = Package::select()->find($args['id']);
        //$subCatId = $package['categorie_id'];
        //$subCat        = Subcategorie::select()->Where('id', $subCatId)->one();
        $page       = "Edição de Pacotes";
        
        $this->render('editPackage', [
            'loggedUser'=>$this->loggedUser,
            'page'      =>$page,
            'package'     =>$package,
            'flash'     =>$flash,
            //'subCat'    =>$subCat
        ]);
    }

    public function editPackageAction($args){
        $id = $args['id'];
        $title   = filter_input(INPUT_POST, 'title');
        $description   = filter_input(INPUT_POST, 'description');
        $text   = filter_input(INPUT_POST, 'text');
        $cover = $_FILES['cover']['name'];
        $img1   = $_FILES['img1']['name'];
        $img2   = $_FILES['img2']['name'];
        $img3   = $_FILES['img3']['name'];
        $img4   = $_FILES['img4']['name'];
        $user_id = $this->loggedUser->id;
        //$categorie_id    = filter_input(INPUT_POST, 'subCatAsc');
        $destino = filter_input(INPUT_POST, 'destination');
        $estado = filter_input(INPUT_POST, 'state');
        $pais = filter_input(INPUT_POST, 'country');
        $saidaDe = filter_input(INPUT_POST, 'exit_from');
        $dataSaida = filter_input(INPUT_POST, 'going_on');
        $dataRetorno = filter_input(INPUT_POST, 'return_in');
        $expiraEm = filter_input(INPUT_POST, 'expires_at');
        $preco = str_replace(",",".",str_replace(".","",filter_input(INPUT_POST, 'price')));
        
        //echo"<pre>";
        //print_r($preco);
        //exit;

        //1.532,32
        
        if($id && $title && $description && $text && $cover && $img1 && $img2 && $img3 && $img4 && $user_id && $destino && $estado && $pais && $saidaDe && $dataSaida && $dataRetorno && $expiraEm && $preco){

            $alterado = PackageHandler::editPackage($id, $title, $description, $text, $cover, $img1, $img2, $img3, $img4, $user_id, $destino, $estado, $pais, $saidaDe, $dataSaida, $dataRetorno, $expiraEm, $preco);
            if($alterado === true){
                $_SESSION['flash'] = "Pacote de Viagem aterado com sucesso!";
                $this->redirect('/package/'.$args['id'].'/editPackage');
            }else{
                $_SESSION['flash'] = "Erro ao tentar alterar o Pacote de Viagem!";
                $this->redirect('/package/'.$args['id'].'/editPackage'); 
            }
        }
        $_SESSION['flash'] = "Erro ao tentar alterar o Pacote de Viagem! Obs.:Preencha todos os campos.";
        $this->redirect( '/package/'.$args['id'].'/editPackage');        
    }


    public function deletePackage($args){
        Package::delete()->where('id', $args['id'])->execute();
        $this->redirect('/package');
    }
   
}