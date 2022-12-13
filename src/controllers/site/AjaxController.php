<?php
namespace src\controllers\site;

use core\ControllerSite;
use src\handlers\site\BannerSiteHandler;

class AjaxController extends ControllerSite{

    public function click($atts){
        $id = $atts['id'];


       BannerSiteHandler::addclick($id);

    }

}