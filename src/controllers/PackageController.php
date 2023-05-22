<?php
namespace src\controllers;

use \core\ControllerGerenciador;
use src\handlers\LoginHandler;
use src\handlers\PackageHandler;
use src\models\Subcategorie;
use src\models\Package;
use src\models\Partner;
use src\functions\FuncoesUteis;

class PackageController extends ControllerGerenciador {

    private $loggedUser;
    
    public function __construct()
    {
        $this->loggedUser = LoginHandler::checkLogin();
        if($this->loggedUser === false){
            $this->redirect('/login');
        }   
    }

    public function addPackage() {
        $partners = Partner::select()->execute();
        $partnerUserId = Partner::select()->where('user_id',$this->loggedUser->id)->one();
        // echo"<pre>";
        // echo $_GET['userId'];
        // var_dump($partners);
        // echo"parceiro pelo id";
        // var_dump($partnerUserId);
        // echo"<pre>";
        // exit;
        $this->render('addPackage',[
            'partners'=>$partners,
            'partnerUserId'=> $partnerUserId,
            'page' => 'Cadastro de Pacotes', 
            'loggedUser'=>$this->loggedUser
        ]);
    }

    public function addPackageAction() {  
        

        $title   = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_ADD_SLASHES);
        $description   = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_ADD_SLASHES);
        $text   = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_ADD_SLASHES);
        $user_id = $this->loggedUser->id;
        $destino = filter_input(INPUT_POST, 'destination', FILTER_SANITIZE_ADD_SLASHES);
        $estado = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_ADD_SLASHES);
        $pais = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_ADD_SLASHES);
        $saidaDe = filter_input(INPUT_POST, 'exit_from', FILTER_SANITIZE_ADD_SLASHES);
        $dataSaida = filter_input(INPUT_POST, 'going_on');
        $dataRetorno = filter_input(INPUT_POST, 'return_in');
        $expiraEm = filter_input(INPUT_POST, 'expires_at');
        $preco = str_replace(",",".",str_replace(".","",filter_input(INPUT_POST, 'price')));
        $installments = filter_input(INPUT_POST, 'installments');
        $fee = str_replace(",",".",str_replace(".","",filter_input(INPUT_POST, 'fee')));
        $parceiro = filter_input(INPUT_POST, 'partner_id', FILTER_SANITIZE_ADD_SLASHES);
        $active = filter_input(INPUT_POST, 'active', FILTER_SANITIZE_ADD_SLASHES);
        $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_ADD_SLASHES);
        $link = filter_input(INPUT_POST, 'link', FILTER_SANITIZE_ADD_SLASHES);
        $link_title = filter_input(INPUT_POST, 'link_title', FILTER_SANITIZE_ADD_SLASHES);

        // echo $active;
        // exit;
        
        
        if($active && $title && $description && $text && $user_id && $destino && $estado && $pais && $saidaDe && $dataSaida && $dataRetorno && $expiraEm && $preco && $parceiro ){
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
            $caminho = "media/uploads/imgs/packages";
            if(!is_dir($caminho)){
                //se não não existir cria
                mkdir($caminho, 0777);
            }
            //gera todas as imagens no tamanho específicado
            $imgNames = FuncoesUteis::editImg($fotosNames, 420, 300, $caminho);
            if(isset($imgNames) && !empty($imgNames)){
                //se gerou insere no banco de dados e retorna ao dashboard
                PackageHandler::addPackageAction($title, $description, $text, $imgNames, $user_id, $destino, $estado, $pais, $saidaDe, $dataSaida, $dataRetorno, $expiraEm, $preco, $parceiro, $installments, $fee, $active, $status, $link, $link_title);
                $this->redirect('/gerenciador');      
            }
            else{
                    //se não gerou retorna ao formulario
                    $this->redirect('/newsNews');
                }          
        }   
    }

    public function listPackages() {

        $page = "Lista de Pacotes do parceiro: ".$this->loggedUser->name;
        $partnerId = Partner::select('id')->where('user_id', $this->loggedUser->id)->one();
        
        $packages = PackageHandler::getPackage();
        $packagesPartner = PackageHandler::getPackageIdPartner($partnerId);
        
        $partners = Partner::select()->execute();
        // echo"<pre>";
        // print_r($packagesPartner);
        // exit;


        $this->render('listPackages',[
            'loggedUser'=>$this->loggedUser,
            'packagesPartner'=>$packagesPartner,
            'packages' => $packages,
            'partners' => $partnerId,
            'page'=>$page
        ]);

    }

    public function listPackagesPartner() {
        $partnerId = Partner::select('id')->where('user_id', $this->loggedUser->id)->one();
        $page = "Lista de Pacotes do sei la parceiro: ".$this->loggedUser->name;
        
        
        // pacote por parceiro SELECT * FROM partners where user_id = 16
        

        var_dump($partnerId);
        exit;
        $this->render('listPackages',[
            'loggedUser'=>$this->loggedUser,
            'packages' => $packages,
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
        $partners = Partner::select()->execute();
        //$subCatId = $package['categorie_id'];
        //$subCat        = Subcategorie::select()->Where('id', $subCatId)->one();
        $page       = "Edição de Pacotes";
        
        $this->render('editPackage', [
            'loggedUser'=>$this->loggedUser,
            'page'      =>$page,
            'package'     =>$package,
            'partners' => $partners,
            'flash'     =>$flash,
            //'subCat'    =>$subCat
        ]);
    }

    public function editPackageAction($args){
        $id = $args['id'];
        $title   = filter_input(INPUT_POST, 'title');
        $description   = filter_input(INPUT_POST, 'description');
        $text   = filter_input(INPUT_POST, 'text');
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
        $parceiro = filter_input(INPUT_POST, 'partner_id', FILTER_SANITIZE_ADD_SLASHES);
        $installments = filter_input(INPUT_POST, 'installments');
        $fee = str_replace(",",".",str_replace(".","",filter_input(INPUT_POST, 'fee')));
        $active = filter_input(INPUT_POST, 'active', FILTER_SANITIZE_ADD_SLASHES);
        $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_ADD_SLASHES);
        $link = filter_input(INPUT_POST, 'link', FILTER_SANITIZE_ADD_SLASHES);
        $link_title = filter_input(INPUT_POST, 'link_title', FILTER_SANITIZE_ADD_SLASHES);
        
        // echo"<pre>";
        // print_r($_POST);
        // echo "id = ". $id ." User id " .$user_id." Status ".$status." Link ".$link;
        // exit;

        if($id && $title && $description && $text && $user_id && $destino && $estado && $pais && $saidaDe && $dataSaida && $dataRetorno && $expiraEm && $preco && $parceiro && $installments && $fee && $active){
            //pega as imagens e cria um array com todas
        //     echo"<pre>";
        // print_r($preco);
        // echo "entrou?";
        // exit;
          
            $fotosNames = [];
            foreach($_FILES as $img){
               if(isset ($img['type'])){
                    if(in_array($img['type'],['image/jpeg', 'image/jpg', 'image/png'])){
                        $fotosNames[] = $img;
                    }
               } 
            }
            //verifica se existe a pasta imagens específica para pacotes 
            $caminho = "media/uploads/imgs/packages";
            if(!is_dir($caminho)){
                //se não não existir cria
                mkdir($caminho, 0777);
            }
            //gera todas as imagens no tamanho específicado
            $imgNames = FuncoesUteis::editImg($fotosNames, 420, 300, $caminho);
            if(isset($imgNames) && !empty($imgNames)){
                //se gerou insere no banco de dados e retorna ao dashboard
                $alterado = PackageHandler::editPackage($id, $title, $description, $text, $imgNames, $user_id, $destino, $estado, $pais, $saidaDe, $dataSaida, $dataRetorno, $expiraEm, $preco, $parceiro, $installments, $fee, $active, $link, $link_title);               
                // $this->redirect('/gerenciador');      
                if($alterado === true){
                    $_SESSION['flash'] = "Pacote de Viagem aterado com sucesso!";
                    $this->redirect('/package/'.$args['id'].'/editPackage');
                }else{
                    $_SESSION['flash'] = "Erro ao tentar alterar o Pacote de Viagem!";
                    $this->redirect('/package/'.$args['id'].'/editPackage'); 
                }
            }
            else{
                $_SESSION['flash'] = "Não gerou as Imagens.";
                $this->redirect('/package/'.$args['id'].'/editPackage'); 
            }
            
            
        }
        $_SESSION['flash'] = "Erro ao tentar alterar o Pacote de Viagem! Obs.:Preencha todos os campos.";
        $this->redirect( '/package/'.$args['id'].'/editPackage');        
    }


    public function deletePackage($args){
        Package::delete()->where('id', $args['id'])->execute();
        $this->redirect('/package');
    }

    public function more($args){

        $page = "Mais Informações do Pacote";
        $packages = PackageHandler::readPackage($args);
        $partners = Partner::select()->execute();
        $this->render('moreInfoPackage',[
            'loggedUser'=>$this->loggedUser,
            'packages' => $packages,
            'partners' => $partners,
            'page'=>$page
        ]);

    }
   
}