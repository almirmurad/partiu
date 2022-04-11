<?php
namespace src\controllers;

use \core\ControllerGerenciador;
use src\handlers\LoginHandler;
use src\handlers\RMHandler;
use src\models\RoadMap;
use src\models\Subcategorie;
use src\functions\FuncoesUteis;

class RMController extends ControllerGerenciador {

    private $loggedUser;
    
    public function __construct(){
        $this->loggedUser = LoginHandler::checkLogin();
        if($this->loggedUser === false){
            $this->redirect('/login');
        }   
    }

    public function addRoadMap() {
        $subCats        = Subcategorie::select()->execute();
        $this->render('addRoadMap',[
            'subCats' =>$subCats,
            'page' => 'Cadastro de Roteiros', 
            'loggedUser'=>$this->loggedUser
        ]);
    }

    public function addRoadMapAction(){
        $title          = filter_input(INPUT_POST, 'title');
        $description    = filter_input(INPUT_POST, 'description');
        $text           = filter_input(INPUT_POST, 'text');
        $subCatId       = filter_input(INPUT_POST, 'subCatAsc'); 
        $user_id        = $this->loggedUser->id;
       
        if($title && $description && $text && $subCatId){
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
            $caminho = "media/uploads/imgs/road-map";
            if(!is_dir($caminho)){
                //se não não existir cria
                mkdir($caminho, 0777);
            }
            //gera todas as imagens no tamanho específicado
            $imgNames = FuncoesUteis::editImg($fotosNames, 420, 300, $caminho);
            if(isset($imgNames) && !empty($imgNames)){
            //se gerou insere no banco de dados e retorna ao dashboard
                RMHandler::addRMAction($title, $description, $text, $user_id, $subCatId, $imgNames);
                $this->redirect('/gerenciador');
                        
            }else{
                $this->redirect('/newsNews');
            }
        }       
    }

    public function editRoadMap($args){
        $flash = '';
        if(!empty($_SESSION['flash'])){
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }

        $page       = "Edição de Roteiro";
        $roadMaps    = RoadMap::select()->find($args['id']);
        $subCatId = $roadMaps['subcategorie_id'];
        $subCat        = Subcategorie::select()->Where('id', $subCatId)->one();

        $this->render('editRoadMap', [
            'loggedUser'=>$this->loggedUser,
            'page'      =>$page,
            'roadMaps'   =>$roadMaps,
            'flash'     =>$flash,
            'subCat'=>$subCat
        ]);
    }

    public function editRoadMapAction($args){
        $id = $args['id'];
        $user_id = $this->loggedUser->id;
        $title   = filter_input(INPUT_POST, 'title');
        $description   = filter_input(INPUT_POST, 'description');
        $text   = filter_input(INPUT_POST, 'text');
        $cover = $_FILES['cover']['name'];
        $foto1   = $_FILES['foto1']['name'];
        $foto2   = $_FILES['foto2']['name'];
        $foto3   = $_FILES['foto3']['name'];
        $foto4   = $_FILES['foto4']['name'];
        $subCat  = filter_input(INPUT_POST, 'subCatAsc');
        
        if($title && $description && $text && $cover && $foto1 && $foto2 && $foto3 && $foto4 && $subCat){

            $alterado = RMHandler::editRoadMap($id, $title, $description, $text, $cover, $foto1, $foto2, $foto3, $foto4, $user_id, $subCat);
            if($alterado === true){
                $_SESSION['flash'] = "Roteiro aterada com sucesso!";
                $this->redirect('/roadMap/'.$args['id'].'/editRoadMap');
            }else{
                $_SESSION['flash'] = "Erro ao tentar alterar o roteiro!";
                $this->redirect('/roadMap/'.$args['id'].'/editRoadMap'); 
            }
        }
        $_SESSION['flash'] = "Erro ao tentar alterar o roteiro! Obs.:Preencha todos os campos.";
        $this->redirect( '/roadMap/'.$args['id'].'/editRoadMap');      
    }

    public function listRoadMap(){
        $page = "Lista de Roteiros";
        $roadMaps = RoadMap::select()->execute();
        $roadMaps = RMHandler::findRedator($roadMaps);
        
        $this->render('listRoadMap',[
            'loggedUser'=>$this->loggedUser,
            'roadMaps' => $roadMaps,
            'page'=>$page
        ]);
    }

    public function deleteRoadMap($args){
        RoadMap::delete()->where('id', $args['id'])->execute();
        $this->redirect('/roadMap');
    }
    
}