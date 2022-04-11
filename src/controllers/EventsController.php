<?php
namespace src\controllers;

use \core\ControllerGerenciador;
use src\handlers\LoginHandler;
use src\handlers\EventsHandler;
use src\models\Subcategorie;
use src\models\Event;
use src\functions\FuncoesUteis;
class EventsController extends ControllerGerenciador {

    private $loggedUser;
    
    public function __construct()
    {
        $this->loggedUser = LoginHandler::checkLogin();
        if($this->loggedUser === false){
            $this->redirect('/login');
        }   
    }

    public function addEvent() {
        
        $this->render('addEvent',[
            'page' => 'Cadastro de Eventos', 
            'loggedUser'=>$this->loggedUser
        ]);
    }

    public function addEventAction() {  
        $title   = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_ADD_SLASHES);
        $description   = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_ADD_SLASHES);
        $text   = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_ADD_SLASHES);
        $cover = $_FILES['cover']['name'];
        $img1   = $_FILES['img1']['name'];
        $img2   = $_FILES['img2']['name'];
        $img3   = $_FILES['img3']['name'];
        $img4   = $_FILES['img4']['name'];
        $link   = filter_input(INPUT_POST, 'link');
        $user_id = $this->loggedUser->id;
        //$categorie_id    = filter_input(INPUT_POST, 'subCatAsc');
        $expiraEm = filter_input(INPUT_POST, 'expires_at');

        if($title && $description && $text && $user_id && $expiraEm){
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
            $caminho = "media/uploads/imgs/events";
            if(!is_dir($caminho)){
                //se não não existir cria
                mkdir($caminho, 0777);
            }
            //gera todas as imagens no tamanho específicado
            $imgNames = FuncoesUteis::editImg($fotosNames, 420, 300, $caminho);
            if(isset($imgNames) && !empty($imgNames)){
                //se gerou insere no banco de dados e retorna ao dashboard
                EventsHandler::addEventAction($title, $description, $text, $user_id, $link, $expiraEm, $imgNames);
                $this->redirect('/gerenciador');      
            }
            else{
                    //se não gerou retorna ao formulario
                    $this->redirect('/newsNews');
                } 
    }
}

    public function listEvents() {

        $page = "Lista de Pacotes";
        $events = Event::select()->execute();
        $this->render('listEvents',[
            'loggedUser'=>$this->loggedUser,
            'events' => $events,
            'page'=>$page
        ]);

    }

    public function editEvent($args){
        $flash = '';
        if(!empty($_SESSION['flash'])){
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $event    = Event::select()->find($args['id']);
        //$subCatId = $Event['categorie_id'];
        //$subCat        = Subcategorie::select()->Where('id', $subCatId)->one();
        $page       = "Edição de Pacotes";
        
        $this->render('editEvent', [
            'loggedUser'=>$this->loggedUser,
            'page'      =>$page,
            'event'     =>$event,
            'flash'     =>$flash,
            //'subCat'    =>$subCat
        ]);
    }

    public function editEventAction($args){
        $id = $args['id'];
        $title   = filter_input(INPUT_POST, 'title');
        $description   = filter_input(INPUT_POST, 'description');
        $text   = filter_input(INPUT_POST, 'text');
        $cover = $_FILES['cover']['name'];
        $img1   = $_FILES['img1']['name'];
        $img2   = $_FILES['img2']['name'];
        $img3   = $_FILES['img3']['name'];
        $img4   = $_FILES['img4']['name'];
        $link   = filter_input(INPUT_POST, 'link');
        $user_id = $this->loggedUser->id;
        //$categorie_id    = filter_input(INPUT_POST, 'subCatAsc');
        
        $expiraEm = filter_input(INPUT_POST, 'expires_at');
        //$preco = str_replace(",",".",str_replace(".","",filter_input(INPUT_POST, 'price')));

        if($id && $title && $description && $text && $user_id && $expiraEm){

            $alterado = EventsHandler::editEvent($id, $title, $description, $text, $cover, $img1, $img2, $img3, $img4, $link, $user_id, $expiraEm);
            if($alterado === true){
                $_SESSION['flash'] = "Pacote de Viagem aterado com sucesso!";
                $this->redirect('/event/'.$args['id'].'/editEvent');
            }else{
                $_SESSION['flash'] = "Erro ao tentar alterar o Pacote de Viagem!";
                $this->redirect('/event/'.$args['id'].'/editEvent'); 
            }
        }
        $_SESSION['flash'] = "Erro ao tentar alterar o Pacote de Viagem! Obs.:Preencha todos os campos.";
        $this->redirect( '/event/'.$args['id'].'/editEvent');        
    }

    public function deleteEvent($args){
        Event::delete()->where('id', $args['id'])->execute();
        $this->redirect('/event');
    }
   
}