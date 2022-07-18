<?php
namespace src\controllers;

use \core\ControllerGerenciador;
use src\handlers\LoginHandler;
use src\handlers\PartnerHandler;
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
        
        $this->render('addPartner',[
            
            'page' => 'Cadastro de Parceiros', 
            'loggedUser'=>$this->loggedUser
        ]);
    }

    public function addPartnerAction() {  
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

        // echo"<pre>";     
        // print_r($_POST);
        //    exit;
        if($name && $cpf && $user_id && $phone && $email && $adress && $number && $complement && $district && $city && $state && $country && $postalCode && $description && $about && $url && $whats && $face && $insta){
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
                PartnerHandler::addPartnerAction($imgNames, $name, $cpf, $cnpj, $user_id, $phone, $email, $adress, $number, $complement, $district, $city, $state, $country, $postalCode, $description, $about, $url, $whats, $face, $insta);
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

    public function editPackage($args){
        $flash = '';
        if(!empty($_SESSION['flash'])){
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $package    = Package::select()->find($args['id']);
        //$subCatId = $package['categorie_id'];
        //$subCat        = Subcategorie::select()->Where('id', $subCatId)->one();
        $page       = "Edição de Pacotes";
        
        $this->render('editPackage', [
            'loggedUser'=>$this->loggedUser,
            'page'      =>$page,
            'package'     =>$package,
            'flash'     =>$flash,
            //'subCat'    =>$subCat
        ]);
    }

    public function editPackageAction($args){
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
        //$categorie_id    = filter_input(INPUT_POST, 'subCatAsc');
        $destino = filter_input(INPUT_POST, 'destination');
        $estado = filter_input(INPUT_POST, 'state');
        $pais = filter_input(INPUT_POST, 'country');
        $saidaDe = filter_input(INPUT_POST, 'exit_from');
        $dataSaida = filter_input(INPUT_POST, 'going_on');
        $dataRetorno = filter_input(INPUT_POST, 'return_in');
        $expiraEm = filter_input(INPUT_POST, 'expires_at');
        $preco = str_replace(",",".",str_replace(".","",filter_input(INPUT_POST, 'price')));
        
        //echo"<pre>";
        //print_r($preco);
        //exit;

        //1.532,32
        
        if($id && $title && $description && $text && $cover && $img1 && $img2 && $img3 && $img4 && $user_id && $destino && $estado && $pais && $saidaDe && $dataSaida && $dataRetorno && $expiraEm && $preco){

            $alterado = PackageHandler::editPackage($id, $title, $description, $text, $cover, $img1, $img2, $img3, $img4, $user_id, $destino, $estado, $pais, $saidaDe, $dataSaida, $dataRetorno, $expiraEm, $preco);
            if($alterado === true){
                $_SESSION['flash'] = "Pacote de Viagem aterado com sucesso!";
                $this->redirect('/package/'.$args['id'].'/editPackage');
            }else{
                $_SESSION['flash'] = "Erro ao tentar alterar o Pacote de Viagem!";
                $this->redirect('/package/'.$args['id'].'/editPackage'); 
            }
        }
        $_SESSION['flash'] = "Erro ao tentar alterar o Pacote de Viagem! Obs.:Preencha todos os campos.";
        $this->redirect( '/package/'.$args['id'].'/editPackage');        
    }


    public function deletePartner($args){
        package::delete()->where('partner_id',$args['id'])->execute();
        Partner::delete()->where('id', $args['id'])->execute();
        $this->redirect('/partner');
    }
   
}