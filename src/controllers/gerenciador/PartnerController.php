<?php
namespace src\controllers\gerenciador;

use \core\ControllerGerenciador;
use src\handlers\LoginHandler;
use src\handlers\PartnerHandler;
use src\handlers\gerenciador\PartnerTypeHandler;
use src\models\Partner;
use src\models\Package;
use src\functions\FuncoesUteis;

class PartnerController extends ControllerGerenciador {

    private $loggedUser;
    
    public function __construct()
    {
        $this->loggedUser = LoginHandler::checkLogin();
        if($this->loggedUser === false){
            $this->redirect('/login');
        }   
    }

    public function addPartner() {

        $partnersTypes = PartnerTypeHandler::selectAllTypes();
        
        $this->render('addPartner',[

            'partners' => $partnersTypes,
            'page' => 'Cadastro de Parceiros', 
            'loggedUser'=>$this->loggedUser
        ]);
    }

    public function addPartnerAction() {  
        $name   = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_ADD_SLASHES);
        $cpf   = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_ADD_SLASHES);
        $cnpj   = filter_input(INPUT_POST, 'cnpj', FILTER_SANITIZE_ADD_SLASHES);
        $partner_type_id = filter_input(INPUT_POST, 'partner_type_id', FILTER_SANITIZE_ADD_SLASHES);
        $user_id = $this->loggedUser->id;
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_ADD_SLASHES);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_ADD_SLASHES);
        $adress = filter_input(INPUT_POST, 'adress', FILTER_SANITIZE_ADD_SLASHES);
        $number = filter_input(INPUT_POST, 'number', FILTER_SANITIZE_ADD_SLASHES);
        $complement = filter_input(INPUT_POST, 'complement', FILTER_SANITIZE_ADD_SLASHES);
        $district = filter_input(INPUT_POST, 'district', FILTER_SANITIZE_ADD_SLASHES);
        $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_ADD_SLASHES);
        $state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_ADD_SLASHES);
        $country = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_ADD_SLASHES);
        $postalCode = filter_input(INPUT_POST, 'postal_code', FILTER_SANITIZE_ADD_SLASHES);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_ADD_SLASHES);
        $about = filter_input(INPUT_POST, 'about', FILTER_SANITIZE_ADD_SLASHES);
        $url = filter_input(INPUT_POST, 'url', FILTER_SANITIZE_ADD_SLASHES);
        $whats = filter_input(INPUT_POST, 'whats', FILTER_SANITIZE_ADD_SLASHES);
        $face = filter_input(INPUT_POST, 'face', FILTER_SANITIZE_ADD_SLASHES);
        $insta = filter_input(INPUT_POST, 'insta', FILTER_SANITIZE_ADD_SLASHES);

        // echo"<pre>";     
        // print_r($_POST);
        //    exit;
        if($name && $cpf && $partner_type_id && $user_id && $phone && $email && $adress && $number && $complement && $district && $city && $state && $country && $postalCode && $description && $about && $url && $whats && $face && $insta){
           //pega as imagens e cria um array com todas
           
            $fotosNames = [];
            foreach($_FILES as $img){
               if(isset ($img['type'])){
                    if(in_array($img['type'],['image/jpeg', 'image/jpg', 'image/png'])){
                        $fotosNames[] = $img;
                    }
               } 
            }

            //verifica se existe a pasta imagens específica para parceiro 
            $pathPartners = "media/uploads/imgs/partners";
            
            if(!is_dir($pathPartners)){//se não não existir cria
                mkdir($pathPartners, 0777);
            }
            //ultimo cadastrado no banco
            $lastId = Partner::select('id')->last();

            if($lastId === false)//Se não houver nenhum parceiro cria o caminho para pasta id_1
            {
                $pathId = "media/uploads/imgs/partners/id_1";
            }else{
                $pathId = "media/uploads/imgs/partners/id_".$lastId['id'] + 1;
            }
            if(!is_dir($pathId)){//se não não existir cria
                mkdir($pathId, 0777);
            }
            //gera todas as imagens no tamanho específicado
            $imgNames = FuncoesUteis::editImg($fotosNames, 420, 300, $pathId);
            if(isset($imgNames) && !empty($imgNames)){
                //se gerou insere no banco de dados e retorna ao dashboard
                PartnerHandler::addPartnerAction($imgNames, $name, $cpf, $partner_type_id, $cnpj, $user_id, $phone, $email, $adress, $number, $complement, $district, $city, $state, $country, $postalCode, $description, $about, $url, $whats, $face, $insta);
                $this->redirect('/gerenciador');      
            }
            else{
                    //se não gerou retorna ao formulario
                    $this->redirect('/newPartner');
                }          
        }   
    }

    public function listPartners() {

        $page = "Lista de Parceiros";
        $partners = Partner::select()->execute();
        $this->render('listPartners',[
            'loggedUser'=>$this->loggedUser,
            'partners' => $partners,
            'page'=>$page
        ]);

    }

    public function editPartner($args){
        $flash = '';
        if(!empty($_SESSION['flash'])){
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $partner    = Partner::select()->find($args['id']);
        //$subCatId = $partner['categorie_id'];
        //$subCat        = Subcategorie::select()->Where('id', $subCatId)->one();
        $page       = "Edição de Parceiros";
        
        $this->render('editPartner', [
            'loggedUser'=>$this->loggedUser,
            'page'      =>$page,
            'partner'     =>$partner,
            'flash'     =>$flash,
            //'subCat'    =>$subCat
        ]);
    }

    public function editPartnerAction($args){
        $name   = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_ADD_SLASHES);
        $cpf   = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_ADD_SLASHES);
        $cnpj   = filter_input(INPUT_POST, 'cnpj', FILTER_SANITIZE_ADD_SLASHES);
        $user_id = $this->loggedUser->id;
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_ADD_SLASHES);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_ADD_SLASHES);
        $adress = filter_input(INPUT_POST, 'adress', FILTER_SANITIZE_ADD_SLASHES);
        $number = filter_input(INPUT_POST, 'number', FILTER_SANITIZE_ADD_SLASHES);
        $complement = filter_input(INPUT_POST, 'complement', FILTER_SANITIZE_ADD_SLASHES);
        $district = filter_input(INPUT_POST, 'district', FILTER_SANITIZE_ADD_SLASHES);
        $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_ADD_SLASHES);
        $state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_ADD_SLASHES);
        $country = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_ADD_SLASHES);
        $postalCode = filter_input(INPUT_POST, 'postal_code', FILTER_SANITIZE_ADD_SLASHES);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_ADD_SLASHES);
        $about = filter_input(INPUT_POST, 'about', FILTER_SANITIZE_ADD_SLASHES);
        $url = filter_input(INPUT_POST, 'url', FILTER_SANITIZE_ADD_SLASHES);
        $whats = filter_input(INPUT_POST, 'whats', FILTER_SANITIZE_ADD_SLASHES);
        $face = filter_input(INPUT_POST, 'face', FILTER_SANITIZE_ADD_SLASHES);
        $insta = filter_input(INPUT_POST, 'insta', FILTER_SANITIZE_ADD_SLASHES);

        
        if($name && $cpf && $user_id && $phone && $email && $adress && $number && $complement && $district && $city && $state && $country && $postalCode && $description && $about && $url && $whats && $face && $insta){

            $fotosNames = [];
            foreach($_FILES as $img){
               if(isset ($img['type'])){
                    if(in_array($img['type'],['image/jpeg', 'image/jpg', 'image/png'])){
                        $fotosNames[] = $img;
                    }
               } 
            }
            
            $idPartner = $args['id'];
            //verifica se existe a pasta imagens específica para parceiro 
            $pathId = "media/uploads/imgs/partners/id_".$idPartner;
            
            if(!is_dir($pathId = "media/uploads/imgs/partners/id_".$idPartner)){//se não não existir cria
                mkdir($pathId, 0777);
            }else{
                $apagado = FuncoesUteis::apagarTudo($pathId);
                if($apagado == true){
                    //gera todas as imagens no tamanho específicado
                    $imgNames = FuncoesUteis::editImg($fotosNames, 420, 300, $pathId);
                }
            }
            
            $alterado = PartnerHandler::editPartner($imgNames, $name, $cpf, $user_id, $phone, $email, $adress, $number, $complement, $district, $city, $state, $country, $postalCode, $description, $about, $url, $whats, $face, $insta, $idPartner);
            if($alterado === true){
                $_SESSION['flash'] = "Parceiro aterado com sucesso!";
                $this->redirect('/partner/'.$args['id'].'/editPartner');
            }else{
                $_SESSION['flash'] = "Erro ao tentar alterar o Parceiro!";
                $this->redirect('/partner/'.$args['id'].'/editPartner'); 
            }
        }
        $_SESSION['flash'] = "Erro ao tentar alterar o Parceiro! Obs.:Preencha todos os campos.";
        $this->redirect( '/partner/'.$args['id'].'/editPartner');        
    }


    public function deletePartner($args){
        package::delete()->where('partner_id',$args['id'])->execute();
        Partner::delete()->where('id', $args['id'])->execute();
        $this->redirect('/partner');
    }
   
}