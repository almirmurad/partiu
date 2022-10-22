<?php
namespace src\controllers\site;

use core\ControllerSite;
use src\models\Package;
use src\handlers\site\PackageSiteHandler;
use src\handlers\site\SubCatsSiteHandler;
use src\handlers\site\EventsSiteHandler;
use src\handlers\site\BannerSiteHAndler;

class PacController extends ControllerSite{
    public function index() {
        //$categoriaBlog =  PackageSiteHandler::nameCategoriePosts();
        $page = intval(filter_input(INPUT_GET, 'page'));
        $pacotes = PackageSiteHandler::pacotes($page);     
        $categories = SubCatsSiteHandler::catsPackages();   //nacionais, internacionais etc    
        $eventsFoot = EventsSiteHandler::eventsFoot();
        $internalBanner = BannerSiteHandler::bannerPublicityInternals();
        $publicityFoot = BannerSiteHandler::publicityFoot();
        $this->render('package',[
            'page' => 'Pacotes',
            'pacotes' => $pacotes,
            'categories'=>$categories,
            'eventsFoot'=>$eventsFoot,
            'internalPublicity'=>$internalBanner,
            'publicityFoot'=>$publicityFoot
        ]);                
    }

    public function readPackage($args){
        $package = PackageSiteHandler::readPackage($args['id']);
        $categories = SubCatsSiteHandler::catsPackages();
        $eventsFoot = EventsSiteHandler::eventsFoot();
        $internalBanner = BannerSiteHandler::bannerPublicityInternals();
        $publicityFoot = BannerSiteHandler::publicityFoot();
        $this->render('readPackage',['page'=>'Pacote de Viagem',
                'data'=>$package,
                'categories'=>$categories,
                'eventsFoot'=>$eventsFoot,
                'internalPublicity'=>$internalBanner,
                'publicityFoot'=>$publicityFoot
            ]);
    }
}