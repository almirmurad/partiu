<?php
namespace src\controllers\gerenciador;

use core\ControllerGerenciador;
use src\models\BannerPosition;
use src\handlers\LoginHandler;
use src\handlers\gerenciador\BannerPositionHandler;

class BannerPositionController extends ControllerGerenciador{

    private $loggedUser;
    
    public function __construct()
    {
        $this->loggedUser = LoginHandler::checkLogin();
        if($this->loggedUser === false){
            $this->redirect('/login');
        }   
    }
    
    public function addBannerPosition(){
        $page = "Posição de Banners";
        $this->render('addBannerPosition', ['page' => $page,
        'loggedUser'=>$this->loggedUser]);
    }

    public function addBannerPositionAction() {  
        
        $user_id = $this->loggedUser->id;
        
        $title   = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_ADD_SLASHES);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_ADD_SLASHES);
        $position = filter_input(INPUT_POST, 'position', FILTER_SANITIZE_ADD_SLASHES);
        $page = filter_input(INPUT_POST, 'page', FILTER_SANITIZE_ADD_SLASHES);
        $priceClick = filter_input(INPUT_POST, 'price_click', FILTER_SANITIZE_ADD_SLASHES);
        $priceViews = filter_input(INPUT_POST, 'price_views', FILTER_SANITIZE_ADD_SLASHES);
        $priceDays = filter_input(INPUT_POST, 'price_days', FILTER_SANITIZE_ADD_SLASHES);
        $width = filter_input(INPUT_POST, 'width', FILTER_SANITIZE_ADD_SLASHES);
        $height = filter_input(INPUT_POST, 'height', FILTER_SANITIZE_ADD_SLASHES);
        $createdAt = filter_input(INPUT_POST, 'created_at', FILTER_SANITIZE_ADD_SLASHES);
        $expiresAt = filter_input(INPUT_POST, 'expires_at', FILTER_SANITIZE_ADD_SLASHES);

        // echo"<pre>";
        // print_r($_POST);
        // echo"$user_id";
        // exit;


        if($user_id && $title && $description && $position && $page && $width && $height && $createdAt && $expiresAt ){

                // echo"<pre>";
                // print_r($_POST);
                // echo"chegou aqui";
                // exit;
                
    
                //se gerou insere no banco de dados e retorna ao dashboard
                BannerPositionHandler::addBannerPositionAction( $user_id, $title, $description, $position, $page, $priceClick, $priceViews, $priceDays, $width, $height, $createdAt, $expiresAt);
                $this->redirect('/gerenciador');      
            
             }else{
                    //se não gerou retorna ao formulario
                    $this->redirect('/newBannerPosition');
                }   
              
    }   

    public function listBannerPosition(){

        $page = "Lista de Posições de banners";
        $bannerPositions = BannerPositionHandler::selectAllTypes();
        
        $this->render('listBannerPosition',[
            'loggedUser'=>$this->loggedUser,
            'bannerPosition' => $bannerPositions,
            'page'=>$page
        ]);

    }

    // public function editPartnerType($args){
    //     $flash = '';
    //     if(!empty($_SESSION['flash'])){
    //         $flash = $_SESSION['flash'];
    //         $_SESSION['flash'] = '';
    //     }
    //     $partnerType    = Typespartner::select()->find($args['id']);
    //     //$subCatId = $partner['categorie_id'];
    //     //$subCat        = Subcategorie::select()->Where('id', $subCatId)->one();
    //     $page       = "Edição de Tipo de Parceria";
        
    //     $this->render('editPartnerType', [
    //         'loggedUser'=>$this->loggedUser,
    //         'page'      =>$page,
    //         'partnerType'     =>$partnerType,
    //         'flash'     =>$flash,
    //         //'subCat'    =>$subCat
    //     ]);
    // }

    // public function editPartnerTypeAction($args){

    //     $user_id = $this->loggedUser->id;
    //     $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_ADD_SLASHES);
    //     $title   = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_ADD_SLASHES);
 
    //     if($title && $user_id && $description){
    
    //             //se gerou insere no banco de dados e retorna ao dashboard
    //             PartnerTypeHandler::editPartnertypeAction( $title, $user_id, $description, $args['id']);
    //             $this->redirect('/gerenciador');      
            
    //          }else{
    //                 //se não gerou retorna ao formulario
    //                 $this->redirect('/newPartnerType');
    //             }

    // }
    public function deleteBannerPosition($args){
        //package::delete()->where('partner_id',$args['id'])->execute();
        BannerPosition::delete()->where('id', $args['id'])->execute();
        $this->redirect('/bannerPosition');
    }
}