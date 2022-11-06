<?php
namespace src\controllers\site;

use core\ControllerSite;
use src\models\Partner;
use src\handlers\site\SubCatsSiteHandler;
use src\handlers\site\PartnerSiteHandler;
use src\handlers\site\EventsSiteHandler;
use src\handlers\site\BannerSiteHAndler;

class ParcController extends ControllerSite{

    public function readPartner($args){
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
                'publicityFoot'=>$publicityFoot
            ]);
    }

    public function index(){
        $categories = SubCatsSiteHandler::catsRoadMap();
        $eventsFoot = EventsSiteHandler::eventsFoot();
        $internalBanner = BannerSiteHandler::bannerPublicityInternals();
        $publicityFoot = BannerSiteHandler::publicityFoot();

        $this->render('parcerias',['page'=>'Parcerias',
                'categories'=>$categories,
                'eventsFoot'=>$eventsFoot,
                'internalPublicity'=>$internalBanner,
                'publicityFoot'=>$publicityFoot
            ]);
    }

}