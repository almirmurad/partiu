<?php
namespace src\handlers\gerenciador;

use src\models\Banner;
use src\models\Event;
use src\models\Newsletter;
use src\models\Package;
use src\models\Noticia;
use src\models\Partner;
use src\models\Post;
use src\models\RoadMap;
use src\models\User;

class DashboardHandler { 

    public static function packageDash(){
        $total = Package::select()->where('id', '>', '')->count();
        $totalActive = Package::select()->where('active', '=', 'A')->count();
        $totalForaPrazo = Package::select()->where('status', '!=', 1)->count();

        return ['total'=>$total, 'totalActive'=>$totalActive, 'totalForaPrazo'=>$totalForaPrazo];
    }

    public static function newsDash(){
        $total = Noticia::select()->where('id', '>', '')->count();
        $totalActive = Noticia::select()->where('active', '=', '1')->count();
        //$totalForaPrazo = Noticia::select()->where('status', '!=', 1)->count();

        return ['total'=>$total, 'totalActive'=>$totalActive];
    }

    public static function partnerDash(){
        $total = Partner::select()->where('id', '>', '')->count();
        $totalActive = Partner::select()->where('active', '=', 1)->count();
        //$totalForaPrazo = Partner::select()->where('status', '!=', 1)->count();

        return ['total'=>$total, 'totalActive'=>$totalActive];
    }
    
    public static function postDash(){
        $total = Post::select()->where('id', '>', '')->count();
        $totalActive = Post::select()->where('active', '=', 1)->count();
        //$totalForaPrazo = Post::select()->where('status', '!=', 1)->count();

        return ['total'=>$total, 'totalActive'=>$totalActive];
    }

    public static function roadmapDash(){
        $total = RoadMap::select()->where('id', '>', '')->count();
        $totalActive = RoadMap::select()->where('active', '=', 1)->count();
        //$totalForaPrazo = RoadMap::select()->where('status', '!=', 1)->count();

        return ['total'=>$total, 'totalActive'=>$totalActive];
    }

    public static function eventDash(){
        $total = Event::select()->where('id', '>', '')->count();
        $totalActive = Event::select()->where('active', '=', 1)->count();
        //$totalForaPrazo = Event::select()->where('status', '!=', 1)->count();

        return ['total'=>$total, 'totalActive'=>$totalActive];
    }

    public static function userDash(){
        $total = User::select()->where('id', '>', '')->count();
        $totalActive = User::select()->where('active', '=', 1)->count();
        //$totalForaPrazo = User::select()->where('status', '!=', 1)->count();

        return ['total'=>$total, 'totalActive'=>$totalActive];
    }
    
    public static function newsletterDash(){
        $total = Newsletter::select()->where('id', '>', '')->count();
        //$totalActive = Newsletter::select()->where('active', '=', 1)->count();
        //$totalForaPrazo = Newsletter::select()->where('status', '!=', 1)->count();

        return ['total'=>$total];
    }

    public static function bannerDash(){
        $total = Banner::select()->where('id', '>', '')->count();
        $totalActive = Banner::select()->where('active', '=', 1)->count();
        //$totalForaPrazo = Banner::select()->where('status', '!=', 1)->count();

        return ['total'=>$total, 'totalActive'=>$totalActive];
    }


}