<?php
namespace src\controllers;

use core\ControllerGerenciador;
use src\handlers\LoginHandler;
use src\handlers\SubCatsHandler;
use src\models\Categorie;
use src\models\SubCategorie;

class SubCatsController extends ControllerGerenciador {

    private $loggedUser;
    
    public function __construct()
    {
        $this->loggedUser = LoginHandler::checkLogin();
        if($this->loggedUser === false){
            $this->redirect('/login');
        }   
    }

    public function addSubCat($args){
        $flash = '';
        if(!empty($_SESSION['flash'])){
                $flash = $_SESSION['flash'];
                $_SESSION['flash'] = '';
            }

        $cats = Categorie::select()->where('id', $args['id'])->one();
    
        $page = "Adicionar Subcategorias";
        $this->render('addSubCat', ['page' => $page,
        'loggedUser'=>$this->loggedUser,
        'cats'=>$cats,
        'flash'=>$flash  
        ]);
    }

    public function addSubCatAction($args) {
        $subCat   = filter_input(INPUT_POST, 'name');
        $description   = filter_input(INPUT_POST, 'description');
        $idCatAsc         = $args['id'];
        $img = $_FILES['img']['name']; 
        $userId = $this->loggedUser->id;
        
        if($subCat && $description){
            if(SubCatsHandler::subcatExists($subCat) === false){
                SubCatsHandler::addSubCat($subCat, $description, $img, $userId, $idCatAsc);
                $_SESSION['flash'] = "Subcategoria, $subCat cadastrada com sucesso!";
                $this->redirect('/cat/'.$idCatAsc.'/newSubCat');
            }else{
                $_SESSION['flash'] = "Subcategoria, $subCat já cadastrada!";
                $this->redirect('/cat/'.$idCatAsc.'/newSubCat');
            }
        }
        $_SESSION['flash'] = "Erro ao cadastrar a subcategoria $subCat!";
        $this->redirect('/cat/'.$idCatAsc.'/newSubCat');
    }

    public function listSubCat($args){
        $page = "Lista de Subcategorias";
        $subCats = Subcategorie::select()->where('id_cat_asc', $args['id'])->execute();
        $this->render('listSubCat',[
            'loggedUser'=>$this->loggedUser,
            'subCats' => $subCats,
            'page'=>$page
        ]);


    }

    public function editSubCat($args){
        $flash = '';
        if(!empty($_SESSION['flash'])){
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }

        $page       = "Edição de Subcategoria: Subcategoria ";
        $idCatAsc   = Subcategorie::select('id_cat_asc')->where('id', $args['id'])->one();
        $subCat        = Subcategorie::select()->find($args['id']);

        

        $this->render('editSubCat', [
            'loggedUser'=>$this->loggedUser,
            'page'      =>$page,
            'subCat'       =>$subCat,
            'flash'     =>$flash
        ]);
    }

    public function editSubCatAction($args){
        $id = $args['id'];

        $subCat   = filter_input(INPUT_POST, 'name');
        $description   = filter_input(INPUT_POST, 'description');
        $idCatAsc = filter_input(INPUT_POST, 'subCatAsc');
        $img = $_FILES['img']['name']; 
        $userId = $this->loggedUser->id;
        
        
        if($subCat && $description ){

            $alterado = SubCatsHandler::editSubCat($subCat, $description, $img, $id, $userId, $idCatAsc);
            if($alterado === true){
                $_SESSION['flash'] = "Subcategoria aterada com sucesso!";
                $this->redirect('/subCat/'.$args['id'].'/editSubCat');
            }else{
                $_SESSION['flash'] = "Erro ao tentar alterar a subcategoria!";
                $this->redirect('/subCat/'.$args['id'].'/editSubCat'); 
            }
        }
        $_SESSION['flash'] = "Erro ao tentar alterar a subcategoria! Obs.:Preencha todos os campos.";
        $this->redirect( '/subCat/'.$args['id'].'/editSubCat');        
    }


    public function deleteSubCat($args){
        $idCatAsc = SubCategorie::select('id_cat_asc')->where('id', $args['id'])->one();
        Subcategorie::delete()->where('id', $args['id'])->execute();
        $this->redirect('/cat/'.$idCatAsc['id_cat_asc'].'/listSubCat');
    }
}    