<?php
namespace src\controllers\site;

use core\ControllerSite;
use src\models\Package;
use src\handlers\site\PackageSiteHandler;
use src\handlers\site\SubCatsSiteHandler;
use src\handlers\site\EventsSiteHandler;

class PacController extends ControllerSite{
    public function index() {
        //$categoriaBlog =  PackageSiteHandler::nameCategoriePosts();
        $page = intval(filter_input(INPUT_GET, 'page'));
        $pacotes = PackageSiteHandler::pacotes($page);     
        $categories = SubCatsSiteHandler::catsPackages();   //nacionais, internacionais etc    
        $eventsFoot = EventsSiteHandler::eventsFoot();
        $this->render('package',[
            'page' => 'Pacotes',
            'pacotes' => $pacotes,
            'categories'=>$categories,
            'eventsFoot'=>$eventsFoot,
        ]);                
    }

    public function readPackage($args){
        $package = PackageSiteHandler::readPackage($args['id']);
        $categories = SubCatsSiteHandler::catsPackages();
        $eventsFoot = EventsSiteHandler::eventsFoot();
        $this->render('readPackage',['page'=>'Pacote de Viagem',
                'data'=>$package,
                'categories'=>$categories,
                'eventsFoot'=>$eventsFoot,
            ]);
    }
}