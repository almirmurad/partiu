<?php
namespace src\controllers;

use \core\ControllerGerenciador;
use src\handlers\LoginHandler;
use src\handlers\NewsHandler;
use src\models\Noticia;
use src\functions\FuncoesUteis;


class NewsController extends ControllerGerenciador {

    private $loggedUser;
    
    public function __construct()
    {
        $this->loggedUser = LoginHandler::checkLogin();
        if($this->loggedUser === false){
            $this->redirect('/login');
        }   
    }

    public function addNews() {
        $categoria = NewsHandler::newsCat();
        $this->render('addNews',[
            'page' => 'Cadastro de Notícias', 
            'loggedUser'=>$this->loggedUser,
            'subCats'=>$categoria
        ]);


    }

    public function addNewsAction() {
        $user_id = $this->loggedUser->id;
        $title   = filter_input(INPUT_POST, 'title');
        $description   = filter_input(INPUT_POST, 'description');
        $text   = filter_input(INPUT_POST, 'text');
        $source   = filter_input(INPUT_POST, 'source');
        $categorie_id    = filter_input(INPUT_POST, 'subCatAsc');

        if($title && $description && $text && $legend_img1 && $legend_img2 && $source && $categorie_id){
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
             $caminho = "media/uploads/imgs/news";
             if(!is_dir($caminho)){
                 //se não não existir cria
                 mkdir($caminho, 0777);
             }
             //gera todas as imagens no tamanho específicado
             $imgNames = FuncoesUteis::editImg($fotosNames, 420, 300, $caminho);
             if(isset($imgNames) && !empty($imgNames)){
                 //se gerou insere no banco de dados e retorna ao dashboard
                NewsHandler::addNewsAction($user_id, $title, $description, $text, $legend_img1, $legend_img2, $source, $categorie_id, $imgNames);
                $this->redirect('/gerenciador');   
                }else{
                    $this->redirect('/newsNews');
                }
        }
        
    }

    public function listNews() {

        $page = "Lista de Notícias";
        $news = Noticia::select()->execute();
        $this->render('listNews',[
            'loggedUser'=>$this->loggedUser,
            'news' => $news,
            'page'=>$page
        ]);

    }

    public function editNews($args){
        $flash = '';
        if(!empty($_SESSION['flash'])){
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }

        $page       = "Edição de Notícias";
        $news    = Noticia::select()->find($args['id']);
        $this->render('editNews', [
            'loggedUser'=>$this->loggedUser,
            'page'      =>$page,
            'news'   =>$news,
            'flash'     =>$flash
        ]);
    }

    public function editNewsAction($args){
        $id = $args['id'];
        $user_id = $this->loggedUser->id;
        $title   = filter_input(INPUT_POST, 'title');
        $description   = filter_input(INPUT_POST, 'description');
        $text   = filter_input(INPUT_POST, 'text');
        $source   = filter_input(INPUT_POST, 'source');
        $cover = $_FILES['cover']['name'];
        $foto1   = $_FILES['foto1']['name'];
        $legend_img1    = filter_input(INPUT_POST, 'legend_img1');
        $foto2   = $_FILES['foto2']['name'];
        $legend_img2    = filter_input(INPUT_POST, 'legend_img2');
        $categorie_id    = filter_input(INPUT_POST, 'subCatAsc');
        
        if($title && $description && $text && $cover && $foto1 && $legend_img1 && $foto2 && $legend_img2 && $source && $categorie_id){

            $alterado = NewsHandler::editNews($id, $title, $description, $text, $cover, $foto1, $legend_img1, $foto2, $legend_img2, $source, $user_id, $categorie_id);
            
            if($alterado === true){
                $_SESSION['flash'] = "Notícia aterada com sucesso!";
                $this->redirect('/news/'.$args['id'].'/editNews');
            }else{
                $_SESSION['flash'] = "Erro ao tentar alterar a notícia!";
                $this->redirect('/news/'.$args['id'].'/editNews'); 
            }
        }
        $_SESSION['flash'] = "Erro ao tentar alterar a notícia! Obs.:Preencha todos os campos.";
        $this->redirect( '/news/'.$args['id'].'/editNews');        
    }

    public function deleteNews($args){
        Noticia::delete()->where('id', $args['id'])->execute();
        $this->redirect('/news');
    }

    
   
}