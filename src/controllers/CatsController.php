<?php
namespace src\controllers;

use core\ControllerGerenciador;
use src\handlers\LoginHandler;
use src\handlers\CatsHandler;
use src\models\Categorie;

class CatsController extends ControllerGerenciador {


    private $loggedUser;
    
    public function __construct()
    {
        $this->loggedUser = LoginHandler::checkLogin();
        if($this->loggedUser === false){
            $this->redirect('/login');
        }   
    }

    public function index() {
        $page = "Lista de Categorias";
        $cats = Categorie::select()->execute();
        $this->render('categories',[
            'loggedUser'=>$this->loggedUser,
            'cats' => $cats,
            'page'=>$page
        ]);

    }

    public function addCat(){
        $flash = '';
        if(!empty($_SESSION['flash'])){
                $flash = $_SESSION['flash'];
                $_SESSION['flash'] = '';
            }

        $page = "Adicionar Categoria";
        $this->render('addCats', ['page' => $page,
        'loggedUser'=>$this->loggedUser,
        'flash'=>$flash  
        ]);
    }

    public function addCatAction() {
        $cat   = filter_input(INPUT_POST, 'name');
        $description   = filter_input(INPUT_POST, 'description');
        $cover = $_FILES['img']['name']; 
        $userId = $this->loggedUser->id;
        
        if($cat && $description){
            if(CatsHandler::catsExists($cat) === false){
                CatsHandler::addCat($cat, $description, $cover, $userId);
                $_SESSION['flash'] = "Categoria cadastrada com sucesso!";
                $this->redirect('/newCat');
            }else{
                $_SESSION['flash'] = "Categoria já cadastrada!";
                $this->redirect('/newCat');
            }
        }
        $_SESSION['flash'] = "Erro ao cadastrar a categoria $cat!";
        $this->redirect('/newCat');
    }

    public function editCat($args){
        $flash = '';
        if(!empty($_SESSION['flash'])){
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }

        $page       = "Edição de Categoria";
        $cat        = Categorie::select()->find($args['id']);
        $this->render('editCat', [
            'loggedUser'=>$this->loggedUser,
            'page'      =>$page,
            'cat'       =>$cat,
            'flash'     =>$flash
        ]);
    }

    public function editCatAction($args){
        $id = $args['id'];
        $cat   = filter_input(INPUT_POST, 'name');
        $description   = filter_input(INPUT_POST, 'description');
        $cover = $_FILES['img']['name']; 
        $userId = $this->loggedUser->id;
        
        if($cat && $description ){

            $alterado = CatsHandler::editCat($cat, $description, $cover, $id, $userId);
            if($alterado === true){
                $_SESSION['flash'] = "Categoria aterada com sucesso!";
                $this->redirect('/cat/'.$args['id'].'/editCat');
            }else{
                $_SESSION['flash'] = "Erro ao tentar alterar a categoria!";
                $this->redirect('/cat/'.$args['id'].'/editCat'); 
            }
        }
        $_SESSION['flash'] = "Erro ao tentar alterar a categoria! Obs.:Preencha todos os campos.";
        $this->redirect( '/cat/'.$args['id'].'/editCat');        
    }

    public function deleteCat($args){
        Categorie::delete()->where('id', $args['id'])->execute();
        $this->redirect('/categories');
    }

}