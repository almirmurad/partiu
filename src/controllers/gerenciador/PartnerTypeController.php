<?php
namespace src\controllers\gerenciador;

use core\ControllerGerenciador;
use src\models\Typespartner;
use src\handlers\LoginHandler;
use src\handlers\gerenciador\PartnerTypeHandler;

class PartnerTypeController extends ControllerGerenciador{

    private $loggedUser;
    
    public function __construct()
    {
        $this->loggedUser = LoginHandler::checkLogin();
        if($this->loggedUser === false){
            $this->redirect('/login');
        }   
    }
    
    public function addPartnerType(){
        $page = "Tipos de Parceria";
        $this->render('addPartnerType', ['page' => $page,
        'loggedUser'=>$this->loggedUser]);
    }

    public function addPartnerTypeAction() {  
        
        $user_id = $this->loggedUser->id;
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_ADD_SLASHES);
        $title   = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_ADD_SLASHES);
 
        if($title && $user_id && $description){
    
                //se gerou insere no banco de dados e retorna ao dashboard
                PartnerTypeHandler::addPartnertypeAction( $title, $user_id, $description);
                $this->redirect('/gerenciador');      
            
             }else{
                    //se não gerou retorna ao formulario
                    $this->redirect('/newPartnerType');
                }   
              
    }   

    public function listPartnersType(){

        $page = "Lista de Tipos de Parcerias";
        $partnersType = PartnerTypeHandler::selectAllTypes();
        
        $this->render('listPartnersType',[
            'loggedUser'=>$this->loggedUser,
            'partnersType' => $partnersType,
            'page'=>$page
        ]);

    }

    public function editPartnerType($args){
        $flash = '';
        if(!empty($_SESSION['flash'])){
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $partnerType    = Typespartner::select()->find($args['id']);
        //$subCatId = $partner['categorie_id'];
        //$subCat        = Subcategorie::select()->Where('id', $subCatId)->one();
        $page       = "Edição de Tipo de Parceria";
        
        $this->render('editPartnerType', [
            'loggedUser'=>$this->loggedUser,
            'page'      =>$page,
            'partnerType'     =>$partnerType,
            'flash'     =>$flash,
            //'subCat'    =>$subCat
        ]);
    }

    public function editPartnerTypeAction($args){

        $user_id = $this->loggedUser->id;
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_ADD_SLASHES);
        $title   = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_ADD_SLASHES);
 
        if($title && $user_id && $description){
    
                //se gerou insere no banco de dados e retorna ao dashboard
                PartnerTypeHandler::editPartnertypeAction( $title, $user_id, $description, $args['id']);
                $this->redirect('/gerenciador');      
            
             }else{
                    //se não gerou retorna ao formulario
                    $this->redirect('/newPartnerType');
                }

    }
    public function deletePartnerType($args){
        //package::delete()->where('partner_id',$args['id'])->execute();
        TypesPartner::delete()->where('id', $args['id'])->execute();
        $this->redirect('/partnersType');
    }
}


