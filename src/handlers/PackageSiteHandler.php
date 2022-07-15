<?php
namespace src\handlers;
use src\models\User;
use src\models\Post;
use ClanCats\Hydrahon\Query\Expression as Rnd;
use src\models\Categorie;
use src\models\Package;
use src\models\Partner;
use src\models\Subcategorie;
use src\functions\FuncoesUteis;

//use ClanCats\Hydrahon\Query\Expression as Rnd;

class PackageSiteHandler {

    public static function pacotes($page){
        $perPage = 6;
        
        $packagesList = Package::select()
            //->where('categorie_id','in',$categories)
            ->orderBy('created_at', 'DESC')
            ->page($page, $perPage)
        ->get();     

        $total = Package::select()
        //->where('categorie_id','in',$categories)
        ->orderBy('created_at', 'DESC')
        ->count();
        $pageCount = ceil($total / $perPage);

        //5 transformar em objetos dos models
        $packages = [];
        foreach($packagesList as $packageItem){
            $newPackage = new Package();
            $newPackage->id = $packageItem['id'];
            $newPackage->title = $packageItem['title'];
            $newPackage->description = $packageItem['description'];
            $newPackage->text = $packageItem['text'];
            $newPackage->cover = $packageItem['cover'];
            $newPackage->img1 = $packageItem['img1'];
            $newPackage->img2 = $packageItem['img2'];
            $newPackage->img3 = $packageItem['img3'];
            $newPackage->img4 = $packageItem['img4'];
            $newPackage->destination = $packageItem['destination'];
            $newPackage->state = $packageItem['state'];
            $newPackage->country = $packageItem['country'];
            $newPackage->price = 'R$ '.number_format($packageItem['price'],2,',','.');
            $newPackage->installments = $packageItem['installments'];
            $newPackage->fee = number_format($packageItem['fee'],2,',','.');
            // calculo de juros por parcela
            $i = $packageItem['fee'] / 100;
            $taxa = 1 + $i;
            $total = $packageItem['price'] * $taxa;
            //parcela mensal com juros
            $newPackage->vlrInstallments = number_format($total / $packageItem['installments'],2,',','.');                    

            //4 usuarios que postaram
            /*$newUser = User::select()->where('id',$packageItem['user_id'])->one();
            $newPackage->user = new User();
            $newPackage->user->id=$newUser['id'];
            $newPackage->user->name=$newUser['name'];
            $newPackage->user->avatar=$newUser['avatar'];
            $newPackage->user->type_user=$newUser['type_user'];*/

            //5 Parceiros
                $newPartner = Partner::select()->where('id',$packageItem['partner_id'])->one();
                $newPackage->partner = new Partner();
                $newPackage->partner->id=$newPartner['id'];
                $newPackage->partner->name=$newPartner['name'];
                $newPackage->partner->email=$newPartner['email'];
                $newPackage->partner->phone=$newPartner['phone'];
                $newPackage->partner->adress=$newPartner['adress'];
                $newPackage->partner->number=$newPartner['number'];
                $newPackage->partner->district=$newPartner['district'];
                $newPackage->partner->city=$newPartner['city'];
                $newPackage->partner->complement=$newPartner['complement'];
                $newPackage->partner->state=$newPartner['state'];
                $newPackage->partner->country=$newPartner['country'];
                $newPackage->partner->postal_code=$newPartner['postal_code'];
                $newPackage->partner->cover=$newPartner['cover'];
                $newPackage->partner->img1=$newPartner['img1'];
                $newPackage->partner->img2=$newPartner['img2'];
                $newPackage->partner->img3=$newPartner['img3'];
                $newPackage->partner->img4=$newPartner['img4'];
                $newPackage->partner->url=$newPartner['url'];
                $newPackage->partner->whats=$newPartner['whats'];
                $newPackage->partner->face=$newPartner['face'];
                $newPackage->partner->insta=$newPartner['insta'];
                $newPackage->partner->active=$newPartner['active'];


            $packages[] = $newPackage;
           
        }
 
       return [ 'packages'=>$packages,
                'pageCount'=>$pageCount,
                'currentPage'=>$page
            ];
   
    }



    public static function readPackage($id){

        $packageList = Package::select()
        ->where('packages.id', $id)
        ->one();

        $package = [];
        
            $newPackage = new Package();
            $newPackage->id = $packageList['id'];
            $newPackage->title = $packageList['title'];
            $newPackage->description = $packageList['description'];
            $newPackage->text = $packageList['text'];
            $newPackage->cover = $packageList['cover'];
            $newPackage->img1 = $packageList['img1'];
            $newPackage->img2 = $packageList['img2'];
            $newPackage->img3 = $packageList['img3'];
            $newPackage->img4 = $packageList['img4'];
            $newPackage->created_at = $packageList['created_at'];
            $newPackage->destination = $packageList['destination'];
            $newPackage->state = $packageList['state'];
            $newPackage->country = $packageList['country'];
            $newPackage->exit_from = $packageList['exit_from'];
            $newPackage->going_on = date('d/m/Y \à\\s H:i',strtotime($packageList['going_on']));
            
            $newPackage->return_in =  date('d/m/Y \à\\s H:i', strtotime($packageList['return_in'])) ;
            $newPackage->expires_at = date('d/m/Y \à\\s H:i', strtotime($packageList['expires_at']));
            $newPackage->price = number_format($packageList['price'],2,',','.');
            $newPackage->installments = $packageList['installments'];
            $newPackage->fee = number_format($packageList['fee'],2,',','.');
            // calculo de juros por parcela
            $i = $packageList['fee'] / 100;
            $taxa = 1 + $i;
            $total = $packageList['price'] * $taxa;
            //parcela mensal com juros
            $newPackage->vlrInstallments = number_format($total / $packageList['installments'],2,',','.');    

            //4 usuarios que postaram
            $newUser = User::select()->where('id',$packageList['user_id'])->one();
            $newPackage->user = new User();
            $newPackage->user->id=$newUser['id'];
            $newPackage->user->name=$newUser['name'];
            $newPackage->user->avatar=$newUser['avatar'];
            $newPackage->user->type_user=$newUser['type_user'];

            //5 Parceiros
            $newPartner = Partner::select()->where('id',$packageList['partner_id'])->one();
            $newPackage->partner = new Partner();
            $newPackage->partner->id=$newPartner['id'];
            $newPackage->partner->name=$newPartner['name'];
            $newPackage->partner->email=$newPartner['email'];
            $newPackage->partner->phone=FuncoesUteis::masc_tel($newPartner['phone']);
            $newPackage->partner->adress=$newPartner['adress'];
            $newPackage->partner->number=$newPartner['number'];
            $newPackage->partner->district=$newPartner['district'];
            $newPackage->partner->city=$newPartner['city'];
            $newPackage->partner->complement=$newPartner['complement'];
            $newPackage->partner->state=$newPartner['state'];
            $newPackage->partner->country=$newPartner['country'];
            $newPackage->partner->postal_code=$newPartner['postal_code'];
            $newPackage->partner->cover=$newPartner['cover'];
            $newPackage->partner->img1=$newPartner['img1'];
            $newPackage->partner->img2=$newPartner['img2'];
            $newPackage->partner->img3=$newPartner['img3'];
            $newPackage->partner->img4=$newPartner['img4'];
            $newPackage->partner->url=$newPartner['url'];
            $newPackage->partner->active=$newPartner['active'];

            //categorias
            /*$newCat = Subcategorie::select()->where('id',$packageList['categorie_id'])->one();
            $newPackage->categorie = new Subcategorie();
            $newPackage->categorie->id=$newCat['id'];
            $newPackage->categorie->name=$newCat['name'];
            $newPackage->categorie->description=$newCat['description'];
            $newPackage->categorie->img=$newCat['img'];
            $newPackage->categorie->id_cat_asc=$newCat['id_cat_asc'];*/

            $package[] = $newPackage;

       return $package;

    }

}