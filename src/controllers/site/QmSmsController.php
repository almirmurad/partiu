<?php
namespace src\controllers\site;

use core\ControllerSite;
use src\handlers\site\SubCatsSiteHandler;
use src\handlers\site\EventsSiteHandler;

class QmSmsController extends ControllerSite{

    public function index(){
        $categories = SubCatsSiteHandler::catsRoadMap();
        $eventsFoot = EventsSiteHandler::eventsFoot();
        $this->render(
            'quemSomos',['page' => 'Quem Somos',
            'categories'=>$categories,
            'eventsFoot'=>$eventsFoot
        ]);

    }

}