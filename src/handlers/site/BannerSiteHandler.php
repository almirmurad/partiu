<?php
namespace src\handlers\site;
use src\models\User;
use src\models\Post;
use src\models\Banner;
use src\models\BannerClick;
use ClanCats\Hydrahon\Query\Expression as Rnd;
use src\models\Categorie;
use src\models\Package;
use src\models\Partner;
use src\models\Subcategorie;
use src\functions\FuncoesUteis;

//use ClanCats\Hydrahon\Query\Expression as Rnd;

class BannerSiteHandler {

    public static function bannersIndex(){
       
        $listBanners = Banner::select()->get();
    
        $banners = [];
        foreach($listBanners as $listBannerItem){
            $newBanner = new Banner;
            $newBanner-> id = $listBannerItem['id'];
            $newBanner-> title = $listBannerItem['title'];
            $newBanner-> description = $listBannerItem['description'];
            $newBanner-> url = $listBannerItem['url'];
            $newBanner-> img = $listBannerItem['img'];
            $newBanner-> position_id = $listBannerItem['position_id'];
            $newBanner-> description = $listBannerItem['description'];
            $newBanner-> partner_id = $listBannerItem['partner_id'];
            $newBanner-> created_at = $listBannerItem['created_at'];
            
            $newUser = User::select()->where('id',$listBannerItem['user_id'])->one();
            $newBanner->user = new User();
            $newBanner->user->name=$newUser['name'];
            $newBanner->user->avatar=$newUser['avatar'];
    
            $banners [] = $newBanner;
        
        }   
    
        return $banners;
    }

    public static function bannerCta(){

        $listBanners= Banner::select()
        ->where('position_id','1')
        ->orderBy(new rnd('rand()'))
        ->limit(1)
        ->execute();
        // ->where('position_id','1')
        // ->get();
        $banners = [];

        foreach($listBanners as $listBannerItem){
            $newBanner = new Banner;
            $newBanner-> id = $listBannerItem['id'];
            $newBanner-> title = $listBannerItem['title'];
            $newBanner-> description = $listBannerItem['description'];
            $newBanner-> url = $listBannerItem['url'];
            $newBanner-> img = $listBannerItem['img'];
            $newBanner-> position_id = $listBannerItem['position_id'];
            $newBanner-> description = $listBannerItem['description'];
            $newBanner-> partner_id = $listBannerItem['partner_id'];
            $newBanner-> created_at = $listBannerItem['created_at'];
            
            $newUser = User::select()->where('id',$listBannerItem['user_id'])->one();
            $newBanner->user = new User();
            $newBanner->user->name=$newUser['name'];
            $newBanner->user->avatar=$newUser['avatar'];
    
            $banners [] = $newBanner;
        
        }   
    
        return $banners;

    }

    public static function bannerNews(){

        $listBanners= Banner::select()
        ->where('position_id','3')
        ->orderBy(new rnd('rand()'))
        ->limit(1)
        ->execute();
        // ->where('position_id','1')
        // ->get();
        $banners = [];
        foreach($listBanners as $listBannerItem){
            $newBanner = new Banner;
            $newBanner-> id = $listBannerItem['id'];
            $newBanner-> title = $listBannerItem['title'];
            $newBanner-> description = $listBannerItem['description'];
            $newBanner-> url = $listBannerItem['url'];
            $newBanner-> img = $listBannerItem['img'];
            $newBanner-> position_id = $listBannerItem['position_id'];
            $newBanner-> description = $listBannerItem['description'];
            $newBanner-> partner_id = $listBannerItem['partner_id'];
            $newBanner-> created_at = $listBannerItem['created_at'];
            
            $newUser = User::select()->where('id',$listBannerItem['user_id'])->one();
            $newBanner->user = new User();
            $newBanner->user->name=$newUser['name'];
            $newBanner->user->avatar=$newUser['avatar'];
    
            $banners [] = $newBanner;
        
        }   
    
        return $banners;

    }

    public static function bannerEvents(){

        $listBanners= Banner::select()
        ->where('position_id','4')
        ->orderBy(new rnd('rand()'))
        ->limit(3)
        ->execute();
        // ->where('position_id','1')
        // ->get();

        $banners = [];
        foreach($listBanners as $listBannerItem){
            $newBanner = new Banner;
            $newBanner-> id = $listBannerItem['id'];
            $newBanner-> title = $listBannerItem['title'];
            $newBanner-> description = $listBannerItem['description'];
            $newBanner-> url = $listBannerItem['url'];
            $newBanner-> img = $listBannerItem['img'];
            $newBanner-> position_id = $listBannerItem['position_id'];
            $newBanner-> description = $listBannerItem['description'];
            $newBanner-> partner_id = $listBannerItem['partner_id'];
            $newBanner-> created_at = $listBannerItem['created_at'];
            
            $clicks = BannerClick::select()->where('id_banner', $listBannerItem['id'])->get();
            $newBanner->clicks = count($clicks);
            
            $newUser = User::select()->where('id',$listBannerItem['user_id'])->one();
            $newBanner->user = new User();
            $newBanner->user->name=$newUser['name'];
            $newBanner->user->avatar=$newUser['avatar'];
    
            $banners [] = $newBanner;
        
        }   
    
        return $banners;

    }

    public static function bannerEndPage(){

        $listBanners= Banner::select()
        ->where('position_id','5')
        ->orderBy(new rnd('rand()'))
        ->limit(4)
        ->execute();
        // ->where('position_id','1')
        // ->get();

        $banners = [];
        foreach($listBanners as $listBannerItem){
            $newBanner = new Banner;
            $newBanner-> id = $listBannerItem['id'];
            $newBanner-> title = $listBannerItem['title'];
            $newBanner-> description = $listBannerItem['description'];
            $newBanner-> url = $listBannerItem['url'];
            $newBanner-> img = $listBannerItem['img'];
            $newBanner-> position_id = $listBannerItem['position_id'];
            $newBanner-> description = $listBannerItem['description'];
            $newBanner-> partner_id = $listBannerItem['partner_id'];
            $newBanner-> created_at = $listBannerItem['created_at'];
            
            $newUser = User::select()->where('id',$listBannerItem['user_id'])->one();
            $newBanner->user = new User();
            $newBanner->user->name=$newUser['name'];
            $newBanner->user->avatar=$newUser['avatar'];
    
            $banners [] = $newBanner;
        
        }   
    
        return $banners;

    }

    public static function bannerPublicityInternals(){

        $listBanners= Banner::select()
        ->where('position_id','2')
        ->orderBy(new rnd('rand()'))
        ->limit(3)
        ->execute();
        // ->where('position_id','1')
        // ->get();

        $banners = [];
        foreach($listBanners as $listBannerItem){
            $newBanner = new Banner;
            $newBanner-> id = $listBannerItem['id'];
            $newBanner-> title = $listBannerItem['title'];
            $newBanner-> description = $listBannerItem['description'];
            $newBanner-> url = $listBannerItem['url'];
            $newBanner-> img = $listBannerItem['img'];
            $newBanner-> position_id = $listBannerItem['position_id'];
            $newBanner-> description = $listBannerItem['description'];
            $newBanner-> partner_id = $listBannerItem['partner_id'];
            $newBanner-> created_at = $listBannerItem['created_at'];
            
            $newUser = User::select()->where('id',$listBannerItem['user_id'])->one();
            $newBanner->user = new User();
            $newBanner->user->name=$newUser['name'];
            $newBanner->user->avatar=$newUser['avatar'];
    
            $banners [] = $newBanner;
        
        }   
    
        return $banners;

    }

    public static function publicityFoot(){

        $listBanners= Banner::select()
        ->where('position_id','7')
        ->orderBy(new rnd('rand()'))
        ->limit(2)
        ->execute();
        // ->where('position_id','1')
        // ->get();

        $banners = [];
        foreach($listBanners as $listBannerItem){
            $newBanner = new Banner;
            $newBanner-> id = $listBannerItem['id'];
            $newBanner-> title = $listBannerItem['title'];
            $newBanner-> description = $listBannerItem['description'];
            $newBanner-> url = $listBannerItem['url'];
            $newBanner-> img = $listBannerItem['img'];
            $newBanner-> position_id = $listBannerItem['position_id'];
            $newBanner-> description = $listBannerItem['description'];
            $newBanner-> partner_id = $listBannerItem['partner_id'];
            $newBanner-> created_at = $listBannerItem['created_at'];
           
            $newUser = User::select()->where('id',$listBannerItem['user_id'])->one();
            $newBanner->user = new User();
            $newBanner->user->name=$newUser['name'];
            $newBanner->user->avatar=$newUser['avatar'];
    
            $banners [] = $newBanner;
        
        }   
    
        return $banners;

    }


    public static function addClick($id){      
       
        BannerClick::insert([
            'id_banner'     => $id,
            'created_at'    => date('Y-m-d H:i:s'),
        ])->execute();
        
        return true;
    }

    // public static function partner($page){
    //     $perPage = 6;
        
    //     $partnersList = Partner::select()
    //         //->where('categorie_id','in',$categories)
    //         ->orderBy('created_at', 'DESC')
    //         ->page($page, $perPage)
    //     ->get();
    //     $total = Partner::select()
    //     //->where('categorie_id','in',$categories)
    //     ->orderBy('created_at', 'DESC')
    //     ->count();
    //     $pageCount = ceil($total / $perPage);


    //     //5 transformar em objetos dos models
    //     $partners = [];
    //     foreach($partnersList as $partnerItem){
    //         $newPartner = new Partner();
    //         $newPartner->id = $partnerItem['id'];
    //         $newPartner->title = $partnerItem['title'];
    //         $newPartner->description = $partnerItem['description'];
    //         $newPartner->text = $partnerItem['text'];
    //         $newPartner->cover = $partnerItem['cover'];
    //         $newPartner->img1 = $partnerItem['img1'];
    //         $newPartner->img2 = $partnerItem['img2'];
    //         $newPartner->img3 = $partnerItem['img3'];
    //         $newPartner->img4 = $partnerItem['img4'];
    //         $newPartner->destination = $partnerItem['destination'];
    //         $newPartner->state = $partnerItem['state'];
    //         $newPartner->country = $partnerItem['country'];
    //         $newPartner->price = number_format($partnerItem['price'],2,',','.');

    //         //4 usuarios que postaram
    //         /*$newUser = User::select()->where('id',$partnerItem['user_id'])->one();
    //         $newPartner->user = new User();
    //         $newPartner->user->id=$newUser['id'];
    //         $newPartner->user->name=$newUser['name'];
    //         $newPartner->user->avatar=$newUser['avatar'];
    //         $newPartner->user->type_user=$newUser['type_user'];*/

    //         //5 Parceiros
    //             $newPartner = Partner::select()->where('id',$partnerItem['partner_id'])->one();
    //             $newPartner->partner = new Partner();
    //             $newPartner->partner->id=$newPartner['id'];
    //             $newPartner->partner->name=$newPartner['name'];
    //             $newPartner->partner->email=$newPartner['email'];
    //             $newPartner->partner->phone=$newPartner['phone'];
    //             $newPartner->partner->adress=$newPartner['adress'];
    //             $newPartner->partner->number=$newPartner['number'];
    //             $newPartner->partner->district=$newPartner['district'];
    //             $newPartner->partner->city=$newPartner['city'];
    //             $newPartner->partner->complement=$newPartner['complement'];
    //             $newPartner->partner->state=$newPartner['state'];
    //             $newPartner->partner->country=$newPartner['country'];
    //             $newPartner->partner->postal_code=$newPartner['postal_code'];
    //             $newPartner->partner->cover=$newPartner['cover'];
    //             $newPartner->partner->img1=$newPartner['img1'];
    //             $newPartner->partner->img2=$newPartner['img2'];
    //             $newPartner->partner->img3=$newPartner['img3'];
    //             $newPartner->partner->img4=$newPartner['img4'];
    //             $newPartner->partner->url=$newPartner['url'];
    //             $newPartner->partner->active=$newPartner['active'];
    //             $newPartner->partner->whats=$partnerList['whats'];
    //             $newPartner->partner->face=urldecode($partnerList['face']);
    //             $newPartner->partner->insta=urldecode($partnerList['insta']);


    //         $partners[] = $newPartner;
           
    //     }

        
    //    return [ 'Partners'=>$partners,
    //             'pageCount'=>$pageCount,
    //             'currentPage'=>$page
    //         ];

    // }
    // public static function readPartner($id){

    //     $partnerList = Partner::select()
    //     ->where('id', $id)
    //     ->one();
    //     //echo"<pre>";
    //     //echo $categories;
    //     //print_r($partnerList);
    //     //echo $allcats[1];
    //     //exit;

    //     $partner = [];

    //         $newPartner = new Partner();
    //         $newPartner->id=$partnerList['id'];
    //         $newPartner->name=$partnerList['name'];
    //         $newPartner->email=$partnerList['email'];
    //         $newPartner->cpf=$partnerList['cpf'];
    //         $newPartner->cnpj=$partnerList['cnpj'];
    //         $newPartner->phone=FuncoesUteis::masc_tel($partnerList['phone']);
    //         $newPartner->adress=$partnerList['adress'];
    //         $newPartner->number=$partnerList['number'];
    //         $newPartner->district=$partnerList['district'];
    //         $newPartner->city=$partnerList['city'];
    //         $newPartner->complement=$partnerList['complement'];
    //         $newPartner->state=$partnerList['state'];
    //         $newPartner->country=$partnerList['country'];
    //         $newPartner->postal_code=$partnerList['postal_code'];
    //         $newPartner->cover=$partnerList['cover'];
    //         $newPartner->about=$partnerList['about'];
    //         $newPartner->img1=$partnerList['img1'];
    //         $newPartner->img2=$partnerList['img2'];
    //         $newPartner->img3=$partnerList['img3'];
    //         $newPartner->img4=$partnerList['img4'];
    //         $newPartner->url=urldecode($partnerList['url']);
    //         $newPartner->active=$partnerList['active'];
    //         $newPartner->whats=$partnerList['whats'];
    //         $newPartner->face=urldecode($partnerList['face']);
    //         $newPartner->insta=urldecode($partnerList['insta']);

    //         //4 usuarios que postaram
    //         $newUser = User::select()->where('id',$partnerList['user_id'])->one();
    //         $newPartner->user = new User();
    //         $newPartner->user->id=$newUser['id'];
    //         $newPartner->user->name=$newUser['name'];
    //         $newPartner->user->avatar=$newUser['avatar'];
    //         $newPartner->user->type_user=$newUser['type_user'];

    //         //5 pacotes
    //         $newPackageList = Package::select()->where('partner_id',$partnerList['id'])->execute();

    //         foreach($newPackageList as $newPackage){
           
    //         $newPartner->package = new Package();
    //         $newPartner->package->id=$newPackage['id'];
    //         $newPartner->package->title=$newPackage['title'];
    //         $newPartner->package->description=$newPackage['description'];
    //         $newPartner->package->text=$newPackage['text'];
    //         $newPartner->package->cover=$newPackage['cover'];
    //         $newPartner->package->img1=$newPackage['img1'];
    //         $newPartner->package->img2=$newPackage['img2'];
    //         $newPartner->package->img3=$newPackage['img3'];
    //         $newPartner->package->img4=$newPackage['img4'];
    //         $newPartner->package->created_at=$newPackage['created_at'];
    //         $newPartner->package->destination=$newPackage['destination'];
    //         $newPartner->package->exit_from=$newPackage['exit_from'];
    //         $newPartner->package->going_on=date('d/m/Y \à\\s H:i',strtotime($newPackage['going_on']));
    //         $newPartner->package->state=$newPackage['state'];
    //         $newPartner->package->country=$newPackage['country'];
    //         $newPartner->package->return_in=date('d/m/Y \à\\s H:i', strtotime($newPackage['return_in']));
    //         $newPartner->package->expires_at=date('d/m/Y \à\\s H:i', strtotime($newPackage['expires_at']));
    //         $newPartner->package->price=number_format($newPackage['price'],2,',','.');  
        
    //     }

    //         $partner[] = $newPartner;

      
        
    //    return $partner;


    // }

}