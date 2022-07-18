<?php
namespace src\controllers;

use \core\ControllerSite;

use src\models\Noticia;
use src\models\Package;
use src\models\Event;
use src\models\Categorie;

use src\handlers\NewsSiteHandler;
use src\handlers\site\PackageSiteHandler;
use src\handlers\site\EventsSiteHandler;
use src\handlers\site\SubCatsSiteHandler;

use ClanCats\Hydrahon\Query\Expression as Rnd;

class HomeController extends ControllerSite {

    private $news;
    private $pacotes;
    private $events;
    private $categories;
    
    public function __construct()
    {   

        //Notícias
        $this->news = Noticia::select()->limit(8)->get();
        //Pacotes
        $this->pacotes = PackageSIteHandler::packIndex();
        //Eventos
        $this->events = EventsSiteHandler::eventsIndex();
        //Categorias
        $this->categories = SubCatsSiteHandler::catsHome();
    }

    public function index() {
        if (isset($this->pacotes)){
            $pacotes = $this->pacotes;
        }else{
            $pacotes = null;
        }
        $this->render('home', [
            'page' => 'Home',
            'news' => $this->news,
            'packages'=>$pacotes,
            'events'=>$this->events,
            'categories'=>$this->categories
        ]);
    }    
}