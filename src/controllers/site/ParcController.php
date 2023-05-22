<?php
namespace src\controllers\site;

use core\ControllerSite;

use src\handlers\LoginHandler;
use src\handlers\site\SubCatsSiteHandler;
use src\handlers\site\PartnerSiteHandler;
use src\handlers\site\PartnershipSiteHandler;
use src\handlers\site\EventsSiteHandler;
use src\handlers\site\BannerSiteHandler;
use src\handlers\gerenciador\PartnerTypeHandler;

class ParcController extends ControllerSite{

    private $loggedUser;

    public function __construct()
    {   
        $this->loggedUser = LoginHandler::checkLogin();
  
    }
    
    public function readPartner($args){
        //busca as informações dos parceiros para montar a página do parceiro no site
        $partner = PartnerSiteHandler::readPartner($args['id']);
        $categories = SubCatsSiteHandler::catsRoadMap();
        $eventsFoot = EventsSiteHandler::eventsFoot();
        $internalBanner = BannerSiteHandler::bannerPublicityInternals();
        $publicityFoot = BannerSiteHandler::publicityFoot();
        $this->render('readPartner',['page'=>'Parceiros',
                'data'=>$partner,
                'categories'=>$categories,
                'eventsFoot'=>$eventsFoot,
                'internalPublicity'=>$internalBanner,
                'publicityFoot'=>$publicityFoot,
                'loggedUser'=>$this->loggedUser,
            ]);
    }

    public function index(){
        //página de parcerias
        $categories = SubCatsSiteHandler::catsRoadMap();
        $eventsFoot = EventsSiteHandler::eventsFoot();
        $internalBanner = BannerSiteHandler::bannerPublicityInternals();
        $publicityFoot = BannerSiteHandler::publicityFoot();
        $partnerTypes = PartnerTypeHandler::selectAllTypes();
        $this->render('parcerias',['page'=>'Parcerias',
                'categories'=>$categories,
                'eventsFoot'=>$eventsFoot,
                'internalPublicity'=>$internalBanner,
                'publicityFoot'=>$publicityFoot,
                'parcerias'=>$partnerTypes,
                'loggedUser'=>$this->loggedUser,
            ]);
    }

    public function verParceria($args){
        $partnerships = PartnershipSiteHandler::readPartnership($args['id']);
        $categories = SubCatsSiteHandler::catsRoadMap();
        $eventsFoot = EventsSiteHandler::eventsFoot();
        $internalBanner = BannerSiteHandler::bannerPublicityInternals();
        $publicityFoot = BannerSiteHandler::publicityFoot();
        $partnerType = PartnerTypeHandler::selectOneType($args['id']);
        //FuncoesUteis::log($partnerTypes, "Tipo de parceria");
        $this->render('verParceria',['page'=>$partnerType->title,
                'partnerships'=>$partnerships,
                'categories'=>$categories,
                'eventsFoot'=>$eventsFoot,
                'internalPublicity'=>$internalBanner,
                'publicityFoot'=>$publicityFoot,
                'parceria'=>$args['id'],
                'loggedUser'=>$this->loggedUser,
            ]);
    }

    public function formParceria($args){
        
        $categories = SubCatsSiteHandler::catsRoadMap();
        $eventsFoot = EventsSiteHandler::eventsFoot();
        $internalBanner = BannerSiteHandler::bannerPublicityInternals();
        $publicityFoot = BannerSiteHandler::publicityFoot();
        $partnerships = PartnershipSiteHandler::readPartnership($id);
        $idParceria =$id;
        $this->render('formParceria',['page'=>$partnerships['0']->title,
                'idParceria'=>$idParceria,
                'categories'=>$categories,
                'eventsFoot'=>$eventsFoot,
                'internalPublicity'=>$internalBanner,
                'publicityFoot'=>$publicityFoot,
                'loggedUser'=>$this->loggedUser,
                
            ]);
    }

}