<?php
namespace src\handlers\site;
use src\models\User;
use ClanCats\Hydrahon\Query\Expression as Rnd;
use src\models\Subcategorie;

class SubCatsSiteHandler {

    public static function catsHome(){
        //Categorias
    $categories =[];
    $categoriesList = Subcategorie::select()
    ->where('id_cat_asc','3')
    ->orderBy(new rnd('rand()'))
    ->limit(8)
    ->execute();

    foreach($categoriesList as $categorieItem){
        $newCategorie = new Subcategorie();
        $newCategorie->id = $categorieItem['id'];
        $newCategorie->name = $categorieItem['name'];
        $newCategorie->description = $categorieItem['description'];
        $newCategorie->img = $categorieItem['img'];
        $newCategorie->id_user = $categorieItem['id_user'];
        $newCategorie->id_cat_asc = $categorieItem['id_cat_asc'];
        $newCategorie->created_at = $categorieItem['created_at'];


        //4 usuarios que postaram
        $newUser = User::select()->where('id',$categorieItem['id_user'])->one();
        $newCategorie->user = new User();
        $newCategorie->user->id=$newUser['id'];
        $newCategorie->user->name=$newUser['name'];
        $newCategorie->user->avatar=$newUser['avatar'];
        $newCategorie->user->type_user=$newUser['type_user'];

        //categorias
        /*$newCat = Subcategorie::select()->where('id',$categorieItem['categorie_id'])->one();
        $newCategorie->categorie = new Subcategorie();
        $newCategorie->categorie->id=$newCat['id'];
        $newCategorie->categorie->name=$newCat['name'];
        $newCategorie->categorie->description=$newCat['description'];
        $newCategorie->categorie->img=$newCat['img'];
        $newCategorie->categorie->id_cat_asc=$newCat['id_cat_asc'];*/

        $categories[] = $newCategorie;

    }
    return $categories;
    
    }

    
    public static function catsRoadMap(){
        //Categorias
    $categories =[];
    $categoriesList = Subcategorie::select()
    ->where('id_cat_asc','3')
    ->orderBy('id')
    //->limit(8)
    ->execute();

    foreach($categoriesList as $categorieItem){
        $newCategorie = new Subcategorie();
        $newCategorie->id = $categorieItem['id'];
        $newCategorie->name = $categorieItem['name'];
        $newCategorie->description = $categorieItem['description'];
        $newCategorie->img = $categorieItem['img'];
        $newCategorie->id_user = $categorieItem['id_user'];
        $newCategorie->id_cat_asc = $categorieItem['id_cat_asc'];
        $newCategorie->created_at = $categorieItem['created_at'];


        //4 usuarios que postaram
        $newUser = User::select()->where('id',$categorieItem['id_user'])->one();
        $newCategorie->user = new User();
        $newCategorie->user->id=$newUser['id'];
        $newCategorie->user->name=$newUser['name'];
        $newCategorie->user->avatar=$newUser['avatar'];
        $newCategorie->user->type_user=$newUser['type_user'];

        //categorias
        /*$newCat = Subcategorie::select()->where('id',$categorieItem['categorie_id'])->one();
        $newCategorie->categorie = new Subcategorie();
        $newCategorie->categorie->id=$newCat['id'];
        $newCategorie->categorie->name=$newCat['name'];
        $newCategorie->categorie->description=$newCat['description'];
        $newCategorie->categorie->img=$newCat['img'];
        $newCategorie->categorie->id_cat_asc=$newCat['id_cat_asc'];*/

        $categories[] = $newCategorie;

    }
    return $categories;
    
    }

    public static function catsNews(){
        //Categorias
    $categories =[];
    $categoriesList = Subcategorie::select()
    ->where('id_cat_asc','2')
    ->orderBy(new rnd('rand()'))
    ->limit(8)
    ->execute();

    foreach($categoriesList as $categorieItem){
        $newCategorie = new Subcategorie();
        $newCategorie->id = $categorieItem['id'];
        $newCategorie->name = $categorieItem['name'];
        $newCategorie->description = $categorieItem['description'];
        $newCategorie->img = $categorieItem['img'];
        $newCategorie->id_user = $categorieItem['id_user'];
        $newCategorie->id_cat_asc = $categorieItem['id_cat_asc'];
        $newCategorie->created_at = $categorieItem['created_at'];


        //4 usuarios que postaram
        $newUser = User::select()->where('id',$categorieItem['id_user'])->one();
        $newCategorie->user = new User();
        $newCategorie->user->id=$newUser['id'];
        $newCategorie->user->name=$newUser['name'];
        $newCategorie->user->avatar=$newUser['avatar'];
        $newCategorie->user->type_user=$newUser['type_user'];

        //categorias
        /*$newCat = Subcategorie::select()->where('id',$categorieItem['categorie_id'])->one();
        $newCategorie->categorie = new Subcategorie();
        $newCategorie->categorie->id=$newCat['id'];
        $newCategorie->categorie->name=$newCat['name'];
        $newCategorie->categorie->description=$newCat['description'];
        $newCategorie->categorie->img=$newCat['img'];
        $newCategorie->categorie->id_cat_asc=$newCat['id_cat_asc'];*/

        $categories[] = $newCategorie;

    }
    return $categories;
    
    }

    public static function catsBlog(){
        //Categorias
    $categories =[];
    $categoriesList = Subcategorie::select()
    ->where('id_cat_asc','4')
    ->orderBy(new rnd('rand()'))
    ->limit(8)
    ->execute();

    foreach($categoriesList as $categorieItem){
        $newCategorie = new Subcategorie();
        $newCategorie->id = $categorieItem['id'];
        $newCategorie->name = $categorieItem['name'];
        $newCategorie->description = $categorieItem['description'];
        $newCategorie->img = $categorieItem['img'];
        $newCategorie->id_user = $categorieItem['id_user'];
        $newCategorie->id_cat_asc = $categorieItem['id_cat_asc'];
        $newCategorie->created_at = $categorieItem['created_at'];


        //4 usuarios que postaram
        $newUser = User::select()->where('id',$categorieItem['id_user'])->one();
        $newCategorie->user = new User();
        $newCategorie->user->id=$newUser['id'];
        $newCategorie->user->name=$newUser['name'];
        $newCategorie->user->avatar=$newUser['avatar'];
        $newCategorie->user->type_user=$newUser['type_user'];

        //categorias
        /*$newCat = Subcategorie::select()->where('id',$categorieItem['categorie_id'])->one();
        $newCategorie->categorie = new Subcategorie();
        $newCategorie->categorie->id=$newCat['id'];
        $newCategorie->categorie->name=$newCat['name'];
        $newCategorie->categorie->description=$newCat['description'];
        $newCategorie->categorie->img=$newCat['img'];
        $newCategorie->categorie->id_cat_asc=$newCat['id_cat_asc'];*/

        $categories[] = $newCategorie;

    }
    return $categories;
    
    }

    public static function catsSemCat(){
        //Categorias
    $categories =[];
    $categoriesList = Subcategorie::select()
    ->where('id_cat_asc','1')
    ->orderBy(new rnd('rand()'))
    //->limit(8)
    ->execute();

    foreach($categoriesList as $categorieItem){
        $newCategorie = new Subcategorie();
        $newCategorie->id = $categorieItem['id'];
        $newCategorie->name = $categorieItem['name'];
        $newCategorie->description = $categorieItem['description'];
        $newCategorie->img = $categorieItem['img'];
        $newCategorie->id_user = $categorieItem['id_user'];
        $newCategorie->id_cat_asc = $categorieItem['id_cat_asc'];
        $newCategorie->created_at = $categorieItem['created_at'];


        //4 usuarios que postaram
        $newUser = User::select()->where('id',$categorieItem['id_user'])->one();
        $newCategorie->user = new User();
        $newCategorie->user->id=$newUser['id'];
        $newCategorie->user->name=$newUser['name'];
        $newCategorie->user->avatar=$newUser['avatar'];
        $newCategorie->user->type_user=$newUser['type_user'];

        //categorias
        /*$newCat = Subcategorie::select()->where('id',$categorieItem['categorie_id'])->one();
        $newCategorie->categorie = new Subcategorie();
        $newCategorie->categorie->id=$newCat['id'];
        $newCategorie->categorie->name=$newCat['name'];
        $newCategorie->categorie->description=$newCat['description'];
        $newCategorie->categorie->img=$newCat['img'];
        $newCategorie->categorie->id_cat_asc=$newCat['id_cat_asc'];*/

        $categories[] = $newCategorie;

    }
    return $categories;
    
    }

    public static function catsPackages(){
        //Categorias
    $categories =[];
    $categoriesList = Subcategorie::select()
    ->where('id_cat_asc','5')
    ->orderBy(new rnd('rand()'))
    //->limit(8)
    ->execute();

    foreach($categoriesList as $categorieItem){
        $newCategorie = new Subcategorie();
        $newCategorie->id = $categorieItem['id'];
        $newCategorie->name = $categorieItem['name'];
        $newCategorie->description = $categorieItem['description'];
        $newCategorie->img = $categorieItem['img'];
        $newCategorie->id_user = $categorieItem['id_user'];
        $newCategorie->id_cat_asc = $categorieItem['id_cat_asc'];
        $newCategorie->created_at = $categorieItem['created_at'];


        //4 usuarios que postaram
        $newUser = User::select()->where('id',$categorieItem['id_user'])->one();
        $newCategorie->user = new User();
        $newCategorie->user->id=$newUser['id'];
        $newCategorie->user->name=$newUser['name'];
        $newCategorie->user->avatar=$newUser['avatar'];
        $newCategorie->user->type_user=$newUser['type_user'];

        //categorias
        /*$newCat = Subcategorie::select()->where('id',$categorieItem['categorie_id'])->one();
        $newCategorie->categorie = new Subcategorie();
        $newCategorie->categorie->id=$newCat['id'];
        $newCategorie->categorie->name=$newCat['name'];
        $newCategorie->categorie->description=$newCat['description'];
        $newCategorie->categorie->img=$newCat['img'];
        $newCategorie->categorie->id_cat_asc=$newCat['id_cat_asc'];*/

        $categories[] = $newCategorie;

    }
    return $categories;
    
    }

    public static function catsEvents(){
        //Categorias
    $categories =[];
    $categoriesList = Subcategorie::select()
    ->where('id_cat_asc','6')
    ->orderBy(new rnd('rand()'))
    //->limit(8)
    ->execute();

    foreach($categoriesList as $categorieItem){
        $newCategorie = new Subcategorie();
        $newCategorie->id = $categorieItem['id'];
        $newCategorie->name = $categorieItem['name'];
        $newCategorie->description = $categorieItem['description'];
        $newCategorie->img = $categorieItem['img'];
        $newCategorie->id_user = $categorieItem['id_user'];
        $newCategorie->id_cat_asc = $categorieItem['id_cat_asc'];
        $newCategorie->created_at = $categorieItem['created_at'];


        //4 usuarios que postaram
        $newUser = User::select()->where('id',$categorieItem['id_user'])->one();
        $newCategorie->user = new User();
        $newCategorie->user->id=$newUser['id'];
        $newCategorie->user->name=$newUser['name'];
        $newCategorie->user->avatar=$newUser['avatar'];
        $newCategorie->user->type_user=$newUser['type_user'];

        //categorias
        /*$newCat = Subcategorie::select()->where('id',$categorieItem['categorie_id'])->one();
        $newCategorie->categorie = new Subcategorie();
        $newCategorie->categorie->id=$newCat['id'];
        $newCategorie->categorie->name=$newCat['name'];
        $newCategorie->categorie->description=$newCat['description'];
        $newCategorie->categorie->img=$newCat['img'];
        $newCategorie->categorie->id_cat_asc=$newCat['id_cat_asc'];*/

        $categories[] = $newCategorie;

    }
    return $categories;
    
    }



}