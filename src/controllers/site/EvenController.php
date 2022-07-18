<?php
namespace src\controllers\site;

use core\ControllerSite;
use src\models\Event;
use src\handlers\site\SubCatsSiteHandler;
use src\handlers\site\EventsSiteHandler;

class EvenController extends ControllerSite{

    public function index() {
        $page = intval(filter_input(INPUT_GET, 'page'));
        $categories = SubCatsSiteHandler::catsEvents();
        $eventos=EventsSiteHandler::events($page);
        $eventsFoot = EventsSiteHandler::eventsFoot();
        $this->render('eventos',[
                'page' => 'Eventos',
                'events'=> $eventos,
                'categories'=>$categories,
                'eventsFoot'=>$eventsFoot,
            ]);

    }
    public function readEvent($args){
        $events = EventsSiteHandler::readEvent($args['id']);
        $categories = SubCatsSiteHandler::catsEvents();
        $eventsFoot = EventsSiteHandler::eventsFoot();
        $this->render('readEvent',[
                'page'=>'Eventos',
                'events'=>$events,
                'categories'=>$categories,
                'eventsFoot'=>$eventsFoot,
        ]);
    }
}