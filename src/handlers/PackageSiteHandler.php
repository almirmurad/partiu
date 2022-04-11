<?php
namespace src\handlers;
use src\models\User;
use src\models\Post;
use ClanCats\Hydrahon\Query\Expression as Rnd;
use src\models\Categorie;
use src\models\Package;
use src\models\Subcategorie;

//use ClanCats\Hydrahon\Query\Expression as Rnd;

class PackageSiteHandler {

    /*public static function nameCategoriePosts(){

        $catPosts = Subcategorie::select('id, name, id_cat_asc, created_at')
            ->where('id_cat_asc','4')
            ->where('name','!=', 'Destaques')
            ->orderBy('created_at','DESC')
        ->get();

        $categories = [];
        foreach($catPosts as $cat){
            $categorie = new Subcategorie();
            $categorie->id = $cat['id'];
            $categorie->name = $cat['name'];
            $categorie->id_cat_asc = $cat['id_cat_asc'];
            $categorie->created_at = $cat['created_at'];

            $categories[] = $categorie;

        }        

        return $categories;

    }*/


    public static function pacotes($page){
        $perPage = 6;
        //0 as categorias dos posts
        /*$catPosts = Subcategorie::select()
            ->where('id_cat_asc','4')
            ->where('name','!=', 'Destaques')
            ->orderBy('created_at','DESC')
        ->get();

        $categories = [];
        foreach($catPosts as $cat){
            //$categorie = new Subcategorie();
            $categories[] = $cat['id'];
            $categories[] = $cat['name'];
            $categories[] = $cat['description'];
            $categories[] = $cat['img'];
            $categories[] = $cat['id_user'];
            $categories[] = $cat['id_cat_asc'];
            $categories[] = $cat['created_at'];
            
        } */      
        //echo"<pre>";
        //echo $categories;
       // print_r($categories);
        //echo $allcats[1];
       // exit;
        //3 Posts
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
            $newPackage->price = number_format($packageItem['price'],2,',','.');

            
            
            

            //4 usuarios que postaram
            /*$newUser = User::select()->where('id',$packageItem['user_id'])->one();
            $newPackage->user = new User();
            $newPackage->user->id=$newUser['id'];
            $newPackage->user->name=$newUser['name'];
            $newPackage->user->avatar=$newUser['avatar'];
            $newPackage->user->type_user=$newUser['type_user'];

            //categorias
            $newCat = Subcategorie::select()->where('id',$packageItem['categorie_id'])->one();
            $newPackage->categorie = new Subcategorie();
            $newPackage->categorie->id=$newCat['id'];
            $newPackage->categorie->name=$newCat['name'];
            $newPackage->categorie->description=$newCat['description'];
            $newPackage->categorie->img=$newCat['img'];
            $newPackage->categorie->id_cat_asc=$newCat['id_cat_asc'];*/

            $packages[] = $newPackage;
           
        }

        /*echo "<pre>";
    print_r($packages);
    exit;*/
        
       return [ 'packages'=>$packages,
                'pageCount'=>$pageCount,
                'currentPage'=>$page
            ];

       
        
    }



    public static function readPackage($id){

        /*$onePost = Post::select('posts.id, posts.title, posts.description, posts.text, posts.cover, posts.img1, posts.img2, posts.img3, posts.img4,
                                posts.user_id, posts.categorie_id, posts.created_at, users.id, users.name, users.type_user, users.avatar,
                                subcategories.name as categorie, subcategories.id, subcategories.id_cat_asc')
                                ->join('users', 'posts.user_id','=', 'users.id')
                                ->join('subcategories', 'posts.categorie_id','=', 'subcategories.id')
                                ->where('posts.id', $id)
                                ->one();

        return $onePost;*/

        $packageList = Package::select()
        ->where('packages.id', $id)
        ->one();
        //echo"<pre>";
        //echo $categories;
       // print_r($packageList);
        //echo $allcats[1];
        //exit;

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

            //4 usuarios que postaram
            $newUser = User::select()->where('id',$packageList['user_id'])->one();
            $newPackage->user = new User();
            $newPackage->user->id=$newUser['id'];
            $newPackage->user->name=$newUser['name'];
            $newPackage->user->avatar=$newUser['avatar'];
            $newPackage->user->type_user=$newUser['type_user'];

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