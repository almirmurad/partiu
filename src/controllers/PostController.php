<?php
namespace src\controllers;

use \core\ControllerGerenciador;
use src\handlers\LoginHandler;
use src\handlers\PostHandler;
use src\models\Post;
use src\models\Subcategorie;
use src\functions\FuncoesUteis;


class PostController extends ControllerGerenciador {

    private $loggedUser;
    
    public function __construct()
    {
        $this->loggedUser = LoginHandler::checkLogin();
        if($this->loggedUser === false){
            $this->redirect('/login');
        }   
    }

    public function addPost() {
        $subCats        = Subcategorie::select()->where('id_cat_asc', '4')->execute();
        $this->render('addPost',[
            'subCats' =>$subCats,
            'page' => 'Cadastro de Posts', 
            'loggedUser'=>$this->loggedUser
        ]);
    }

    public function addPostAction() {  
        $title   = filter_input(INPUT_POST, 'title');
        $description   = filter_input(INPUT_POST, 'description');
        $text   = filter_input(INPUT_POST, 'text');
        $user_id = $this->loggedUser->id;
        $categorie_id    = filter_input(INPUT_POST, 'subCatAsc');
        
        if($title && $description && $text && $user_id && $categorie_id){
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
            $caminho = "media/uploads/imgs/posts";
            if(!is_dir($caminho)){
                //se não não existir cria
                mkdir($caminho, 0777);
            }
            //gera todas as imagens no tamanho específicado
            $imgNames = FuncoesUteis::editImg($fotosNames, 420, 300, $caminho);
            if(isset($imgNames) && !empty($imgNames)){
                //se gerou insere no banco de dados e retorna ao dashboard
                PostHandler::addPostAction($title, $description, $text, $user_id, $categorie_id, $imgNames);
                $this->redirect('/gerenciador');
            }else{
                $this->redirect('/newPost');
            }  
        }      
    }

    public function listPosts() {

        $page = "Lista de Posts";
        $posts = PostHandler::getPosts();
        $this->render('listPosts',[
            'loggedUser'=>$this->loggedUser,
            'posts' => $posts,
            'page'=>$page
        ]);

    }

    public function editPost($args){
        $flash = '';
        if(!empty($_SESSION['flash'])){
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $posts    = Post::select()->find($args['id']);
        $subCatId = $posts['categorie_id'];
        $subCat        = Subcategorie::select()->Where('id', $subCatId)->one();
        $page       = "Edição de Postagens do Blog";
        
        $this->render('editPost', [
            'loggedUser'=>$this->loggedUser,
            'page'      =>$page,
            'posts'     =>$posts,
            'flash'     =>$flash,
            'subCat'    =>$subCat
        ]);
    }

    public function editPostAction($args){
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
        $categorie_id    = filter_input(INPUT_POST, 'subCatAsc');
        
        if($title && $description && $text && $cover && $img1 && $img2 && $img3 && $img4 && $user_id && $categorie_id){

            $alterado = PostHandler::editPost($id, $title, $description, $text, $cover, $img1, $img2, $img3, $img4, $user_id, $categorie_id);
            if($alterado === true){
                $_SESSION['flash'] = "Post aterado com sucesso!";
                $this->redirect('/post/'.$args['id'].'/editPost');
            }else{
                $_SESSION['flash'] = "Erro ao tentar alterar o post!";
                $this->redirect('/post/'.$args['id'].'/editPost'); 
            }
        }
        $_SESSION['flash'] = "Erro ao tentar alterar o post! Obs.:Preencha todos os campos.";
        $this->redirect( '/post/'.$args['id'].'/editPost');        
    }


    public function deletePost($args){
        Post::delete()->where('id', $args['id'])->execute();
        $this->redirect('/post');
    }
   
}