<?php
namespace src\controllers\site;

use core\ControllerSite;
use src\models\Partner;
use src\handlers\site\SubCatsSiteHandler;
use src\handlers\site\PartnerSiteHandler;
use src\handlers\site\EventsSiteHandler;

class ParcController extends ControllerSite{

    public function readPartner($args){
        $partner = PartnerSiteHandler::readPartner($args['id']);
        $categories = SubCatsSiteHandler::catsRoadMap();
        $eventsFoot = EventsSiteHandler::eventsFoot();
        $this->render('readPartner',['page'=>'Parceiros',
                'data'=>$partner,
                'categories'=>$categories,
                'eventsFoot'=>$eventsFoot,
            ]);
    }

}