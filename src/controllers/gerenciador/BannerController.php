<?php
namespace src\controllers\gerenciador;

use core\ControllerGerenciador;
use src\models\Banner;
use src\models\Partner;
use src\models\BannerPosition;
use src\handlers\LoginHandler;
use src\handlers\gerenciador\BannerHandler;
use src\handlers\PartnerHandler;
use src\functions\FuncoesUteis;

class BannerController extends ControllerGerenciador{

    private $loggedUser;
    
    public function __construct()
    {
        $this->loggedUser = LoginHandler::checkLogin();
        if($this->loggedUser === false){
            $this->redirect('/login');
        }   
    }
    
    public function addBanner(){
        $page = "Banners";
        $positions = BannerHandler::getPositions();
        $partners = PartnerHandler::getPartners($this->loggedUser->id);
        $this->render('addBanner', ['page' => $page,
        'partners'=>$partners,
        'loggedUser'=>$this->loggedUser, 
        'positions'=>$positions]);
    }

    public function addBannerAction() {  
        
        $user_id = $this->loggedUser->id;
        
        $title   = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_ADD_SLASHES);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_ADD_SLASHES);
        $position = filter_input(INPUT_POST, 'position', FILTER_SANITIZE_ADD_SLASHES);
        $url = filter_input(INPUT_POST, 'url', FILTER_SANITIZE_ADD_SLASHES);
        $image = $_FILES['img']['name'];
        $advertiser_id = filter_input(INPUT_POST, 'advertiser_id', FILTER_SANITIZE_ADD_SLASHES);
        $partner_id = filter_input(INPUT_POST, 'partner_id', FILTER_SANITIZE_ADD_SLASHES);
        $width = filter_input(INPUT_POST, 'width', FILTER_SANITIZE_ADD_SLASHES);
        $height = filter_input(INPUT_POST, 'height', FILTER_SANITIZE_ADD_SLASHES);
        $createdAt = filter_input(INPUT_POST, 'created_at', FILTER_SANITIZE_ADD_SLASHES);
        $expiresAt = filter_input(INPUT_POST, 'expires_at', FILTER_SANITIZE_ADD_SLASHES);

        //   

        if($user_id && $title && $description && $position && $url && $image && $width && $height && $createdAt && $expiresAt ){
                
                $fotosNames = [];
                foreach($_FILES as $img){
                   if(isset ($img['type'])){
                        if(in_array($img['type'],['image/jpeg', 'image/jpg', 'image/png'])){
                            $fotosNames[] = $img;
                        }
                   } 
                }
                //verifica se existe a pasta imagens específica para pacotes 
                $caminho = "media/uploads/imgs/banners";
                if(!is_dir($caminho)){
                    //se não não existir cria
                    mkdir($caminho, 0777);
                }
                //gera todas as imagens no tamanho específicado
            $imgNames = FuncoesUteis::editImg($fotosNames, $width, $height, $caminho);
            if(isset($imgNames) && !empty($imgNames)){

                // echo"<pre>";
                // print_r($imgNames);
                // echo $imgNames[0];
                // exit;
                    
                //se gerou insere no banco de dados e retorna ao dashboard
                BannerHandler::addBannerAction($user_id, $title, $description, $position, $url, $imgNames[0], $advertiser_id, $partner_id, $width, $height, $createdAt, $expiresAt);
                $this->redirect('/gerenciador');      
                
            }
            else{
                    //se não gerou retorna ao formulario
                    $this->redirect('/newBanner');
                } 

            
             }else{
                    //se não gerou retorna ao formulario
                    $this->redirect('/newBanner');
                }   
              
    }   

    public function listBanner(){

        $page = "Lista de Banners";
        $banners = BannerHandler::selectAllTypes();
        $partnerId = Partner::select('id')->where('user_id', $this->loggedUser->id)->one();
        $bannersPartner = BannerHandler::getByPartner($partnerId);
        
        $this->render('listBanner',[
            'loggedUser'=>$this->loggedUser,
            'bannersPartner' => $bannersPartner,
            'banners' => $banners,
            'page'=>$page,
            'partner'=>$partnerId,
        ]);

    }

    public function editBanner($args){
        $flash = '';
        if(!empty($_SESSION['flash'])){
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $banner    = BannerHandler::getById($args['id']);
        //FuncoesUteis::log($banner, "Banner Buscado com sucesso!");
        $positions = BannerHandler::getPositions();
        
        $partners = PartnerHandler::getPartners($this->loggedUser->id);
        $page       = "Edição de Banners";
        
        $this->render('editBanner', [
            'loggedUser'    =>$this->loggedUser,
            'positions'     =>$positions,
            'page'          =>$page,
            'banner'        =>$banner,
            'flash'         =>$flash,
            'partners'      =>$partners
        ]);
    }

    public function editBannerAction($args){

        $user_id = $this->loggedUser->id;

        $title   = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_ADD_SLASHES);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_ADD_SLASHES);
        $position = filter_input(INPUT_POST, 'position', FILTER_SANITIZE_ADD_SLASHES);
        $url = filter_input(INPUT_POST, 'url', FILTER_SANITIZE_ADD_SLASHES);
        $image = $_FILES['img']['name'];
        $advertiser_id = filter_input(INPUT_POST, 'advertiser_id', FILTER_SANITIZE_ADD_SLASHES);
        $partner_id = filter_input(INPUT_POST, 'partner_id', FILTER_SANITIZE_ADD_SLASHES);
        $width = filter_input(INPUT_POST, 'width', FILTER_SANITIZE_ADD_SLASHES);
        $height = filter_input(INPUT_POST, 'height', FILTER_SANITIZE_ADD_SLASHES);
        $createdAt = filter_input(INPUT_POST, 'created_at', FILTER_SANITIZE_ADD_SLASHES);
        $expiresAt = filter_input(INPUT_POST, 'expires_at', FILTER_SANITIZE_ADD_SLASHES);

        if($user_id && $title && $description && $position && $url && $image && $width && $height && $createdAt && $expiresAt ){
                
                $fotosNames = [];
                foreach($_FILES as $img){
                   if(isset ($img['type'])){
                        if(in_array($img['type'],['image/jpeg', 'image/jpg', 'image/png'])){
                            $fotosNames[] = $img;
                        }
                   } 
                }
                //verifica se existe a pasta imagens específica para pacotes 
                $caminho = "media/uploads/imgs/banners";
                if(!is_dir($caminho)){
                    //se não não existir cria
                    mkdir($caminho, 0777);
                }
                //gera todas as imagens no tamanho específicado
            $imgNames = FuncoesUteis::editImg($fotosNames, $width, $height, $caminho);
            if(isset($imgNames) && !empty($imgNames)){

                // echo"<pre>";
                // print_r($imgNames);
                // echo $imgNames[0];
                // exit;
                    
                //se gerou insere no banco de dados e retorna ao dashboard
                BannerHandler::editBannerAction($user_id, $title, $description, $position, $url, $imgNames[0], $advertiser_id, $partner_id, $width, $height, $createdAt, $expiresAt);
                $this->redirect('/gerenciador');      
                
            }
            else{
                    //se não gerou retorna ao formulario
                    $this->redirect('/newBanner');
                } 

            
             }else{
                    //se não gerou retorna ao formulario
                    $this->redirect('/newBanner');
                }   
              

    }
    public function deleteBanner($args){
        //package::delete()->where('partner_id',$args['id'])->execute();
        $deleted = BannerHandler::deleteBanner($args);
        ($deleted) ? $this->redirect('/banner') : $this->redirect('/gerenciador');
        
    }
}


