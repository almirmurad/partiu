<?php
namespace src\controllers;

use \core\ControllerSite;

class ErrorController extends ControllerSite {

    public function index() {
        $this->render('404');
    }

}