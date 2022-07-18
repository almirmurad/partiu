<?php
namespace src\controllers\site;

use core\ControllerSite;
use src\models\RoadMap;
use src\handlers\site\SubCatsSiteHandler;
use src\handlers\site\RMSiteHandler;
use src\handlers\site\EventsSiteHandler;

class RMController extends ControllerSite{
    public function index() {
        $roadMaps = RMSiteHandler::roadMaps();
        $eventsFoot = EventsSiteHandler::eventsFoot();  
        $categories = SubCatsSiteHandler::catsRoadMap();
        $this->render(
            'roteiros',[
            'page' => 'Roteiros',
            'roadMaps' =>$roadMaps,
            'categories'=>$categories,
            'eventsFoot'=>$eventsFoot,
        ]);
    }

    public function readRoadMap($args) {
        $categories = SubCatsSiteHandler::catsRoadMap();
        $eventsFoot = EventsSiteHandler::eventsFoot();
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
            'eventsFoot'=>$eventsFoot
        ]);
    }

    public function roteirosCat($args) {
        $roadMaps = RMSiteHandler::roadMapCat($args);
        $categories = SubCatsSiteHandler::catsRoadMap();
        $oneCatRm = RMSiteHandler::oneCatRm($args);
        
        $this->render(
            'roteiros',[
            'page' => 'Roteiros',
            'roadMaps'=>$roadMaps,
            'categories'=> $categories,
            'oneCat'=>$oneCatRm
        ]);
    }
}