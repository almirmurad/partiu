<?php
namespace src\controllers\site;

use core\ControllerSite;
use src\models\Noticia;
use src\handlers\site\SubCatsSiteHandler;
use src\handlers\site\NewsSiteHandler;
use src\handlers\site\EventsSiteHandler;
use src\handlers\site\BannerSiteHandler;

class NotController extends ControllerSite{
    
    public function index() {
        $page = intval(filter_input(INPUT_GET, 'page'));
        $news = NewsSiteHandler::news($page);
        $categories = SubCatsSiteHandler::catsNews();
        $eventsFoot = EventsSiteHandler::eventsFoot();
        $internalBanner = BannerSiteHandler::bannerPublicityInternals();
        $publicityFoot = BannerSiteHandler::publicityFoot();
        $this->render('noticias',[
                'page' => 'Notícias',   
                'news' => $news,
                'categories'=>$categories,
                'eventsFoot'=>$eventsFoot,
                'internalPublicity'=>$internalBanner,
                'publicityFoot'=>$publicityFoot
            ]);
    }

    public function read($args) {
        $categories = SubCatsSiteHandler::catsNews();
        $eventsFoot = EventsSiteHandler::eventsFoot();
        $internalBanner = BannerSiteHandler::bannerPublicityInternals();
        $publicityFoot = BannerSiteHandler::publicityFoot();
        $oneNews = NewsSiteHandler::oneNews($args['id']);

    //                echo"<pre>";
    //    print_r($oneNews);
    //    exit;

        //$oneNews = Noticia::select()->where('id', $args['id'])->execute();
        $this->render('readNews',['page' => 'Ler Notícia',
                'oneNews' => $oneNews,
                'categories' => $categories,
                'eventsFoot'=>$eventsFoot,
                'internalPublicity'=>$internalBanner,
                'publicityFoot'=>$publicityFoot
            ]);
    }

}