<?php
namespace src\controllers\site;

use core\ControllerSite;
use src\models\RoadMap;
use src\handlers\site\SubCatsSiteHandler;
use src\handlers\site\RMSiteHandler;
use src\handlers\site\EventsSiteHandler;
use src\handlers\site\BannerSiteHAndler;

class RMController extends ControllerSite{
    public function index() {
        $roadMaps = RMSiteHandler::roadMaps();
        $eventsFoot = EventsSiteHandler::eventsFoot();  
        $categories = SubCatsSiteHandler::catsRoadMap();
        $internalBanner = BannerSiteHandler::bannerPublicityInternals();
        $publicityFoot = BannerSiteHandler::publicityFoot();
        $this->render(
            'roteiros',[
            'page' => 'Roteiros',
            'roadMaps' =>$roadMaps,
            'categories'=>$categories,
            'eventsFoot'=>$eventsFoot,
            'internalPublicity'=>$internalBanner,
            'publicityFoot'=>$publicityFoot
        ]);
    }

    public function readRoadMap($args) {
        $categories = SubCatsSiteHandler::catsRoadMap();
        $eventsFoot = EventsSiteHandler::eventsFoot();
        $internalBanner = BannerSiteHandler::bannerPublicityInternals();
        $publicityFoot = BannerSiteHandler::publicityFoot();
        $roadMaps = RoadMap::select('roadMaps.title, roadMaps.created_at, roadMaps.text, roadMaps.img1, roadMaps.img2, roadMaps.img3, roadMaps.img4, roadMaps.cover, users.name, categories.name as categorie')
            ->join('users', 'roadMaps.user_id', '=', 'users.id')
            ->join('categories', 'roadMaps.categorie_id', '=', 'categories.id')
            ->where('roadMaps.id', $args['id'])
        ->get();

        $this->render(
            'readRoadMap',[
            'page' => 'Ler Roteiros',
            'roadMaps'=> $roadMaps,
            'categories'=> $categories,
            'eventsFoot'=>$eventsFoot,
            'internalPublicity'=>$internalBanner,
            'publicityFoot'=>$publicityFoot
        ]);
    }

    public function roteirosCat($args) {
        $roadMaps = RMSiteHandler::roadMapCat($args);
        $categories = SubCatsSiteHandler::catsRoadMap();
        $oneCatRm = RMSiteHandler::oneCatRm($args);
        $eventsFoot = EventsSiteHandler::eventsFoot();
        $internalBanner = BannerSiteHandler::bannerPublicityInternals();
        $publicityFoot = BannerSiteHandler::publicityFoot();
        $id = $args;
        $this->render(
            'roteiros',[
            'page' => 'Roteiros',
            'roadMaps'=>$roadMaps,
            'categories'=> $categories,
            'oneCat'=>$oneCatRm,
            'eventsFoot'=>$eventsFoot,
            'idPageCat'=>$args,
            'internalPublicity'=>$internalBanner,
            'publicityFoot'=>$publicityFoot
        ]);
    }
}