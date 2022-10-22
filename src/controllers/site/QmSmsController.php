<?php
namespace src\controllers\site;

use core\ControllerSite;
use src\handlers\site\SubCatsSiteHandler;
use src\handlers\site\EventsSiteHandler;
use src\handlers\site\BannerSiteHAndler;

class QmSmsController extends ControllerSite{

    public function index(){
        $categories = SubCatsSiteHandler::catsRoadMap();
        $eventsFoot = EventsSiteHandler::eventsFoot();
        $internalBanner = BannerSiteHandler::bannerPublicityInternals();
        $publicityFoot = BannerSiteHandler::publicityFoot();
        $this->render(
            'quemSomos',['page' => 'Quem Somos',
            'categories'=>$categories,
            'eventsFoot'=>$eventsFoot,
            'internalPublicity'=>$internalBanner,
            'publicityFoot'=>$publicityFoot
        ]);

    }

}