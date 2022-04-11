<?php
namespace src\handlers;
use src\models\User;
use src\models\RoadMap;
use ClanCats\Hydrahon\Query\Expression as Rnd;
use src\models\Categorie;
use src\models\Subcategorie;

//use ClanCats\Hydrahon\Query\Expression as Rnd;

class RMSiteHandler {

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

    public static function roadMaps(){
        //0 as categorias dos posts
        $rmList = RoadMap::select()
        ->orderBy(new rnd('rand()'))
        ->limit(3)
        ->execute();

        $rm = [];
        foreach($rmList as $rmItem){
            $newRm = new RoadMap();
            $newRm->id = $rmItem['id'];
            $newRm->title = $rmItem['title'];
            $newRm->description = $rmItem['description'];
            $newRm->text = $rmItem['text'];
            $newRm->cover = $rmItem['cover'];
            $newRm->img1 = $rmItem['img1'];
            $newRm->img2 = $rmItem['img2'];
            $newRm->img3 = $rmItem['img3'];
            $newRm->img4 = $rmItem['img4'];
            $newRm->categorie_id = $rmItem['categorie_id'];
            $newRm->subcategorie_id = $rmItem['subcategorie_id'];
            $newRm->created_at = $rmItem['created_at'];

            //4 usuarios que postaram
            $newUser = User::select()->where('id',$rmItem['user_id'])->one();
            $newRm->user = new User();
            $newRm->user->id=$newUser['id'];
            $newRm->user->name=$newUser['name'];
            $newRm->user->avatar=$newUser['avatar'];
            $newRm->user->type_user=$newUser['type_user'];

            //categorias
            $newCat = Subcategorie::select()->where('id',$rmItem['subcategorie_id'])->one();
            $newRm->categorie = new Subcategorie();
            $newRm->categorie->id=$newCat['id'];
            $newRm->categorie->name=$newCat['name'];
            $newRm->categorie->description=$newCat['description'];
            $newRm->categorie->img=$newCat['img'];
            $newRm->categorie->id_cat_asc=$newCat['id_cat_asc'];

            $rm[] = $newRm;

        }

        /*echo"<pre>";
        print_r($rmCats);
        exit;*/
        
       return $rm;

        
    }


    public static function roadMapCat($args){
        //0 as categorias dos posts
        $rmCatList = RoadMap::select()
            ->where('subcategorie_id', $args['id'])
            ->where('categorie_id','3')
            ->orderBy(new rnd('rand()'))
            ->limit(3)
        ->get();

        $rmCats = [];
        foreach($rmCatList as $rmCatItem){
            $newRmCat = new RoadMap();
            $newRmCat->id = $rmCatItem['id'];
            $newRmCat->title = $rmCatItem['title'];
            $newRmCat->description = $rmCatItem['description'];
            $newRmCat->text = $rmCatItem['text'];
            $newRmCat->cover = $rmCatItem['cover'];
            $newRmCat->img1 = $rmCatItem['img1'];
            $newRmCat->img2 = $rmCatItem['img2'];
            $newRmCat->img3 = $rmCatItem['img3'];
            $newRmCat->img4 = $rmCatItem['img4'];
            $newRmCat->categorie_id = $rmCatItem['categorie_id'];
            $newRmCat->subcategorie_id = $rmCatItem['subcategorie_id'];
            $newRmCat->created_at = $rmCatItem['created_at'];

            //4 usuarios que postaram
            $newUser = User::select()->where('id',$rmCatItem['user_id'])->one();
            $newRmCat->user = new User();
            $newRmCat->user->id=$newUser['id'];
            $newRmCat->user->name=$newUser['name'];
            $newRmCat->user->avatar=$newUser['avatar'];
            $newRmCat->user->type_user=$newUser['type_user'];

            //categorias
            $newCat = Subcategorie::select()->where('id',$rmCatItem['subcategorie_id'])->one();
            $newRmCat->categorie = new Subcategorie();
            $newRmCat->categorie->id=$newCat['id'];
            $newRmCat->categorie->name=$newCat['name'];
            $newRmCat->categorie->description=$newCat['description'];
            $newRmCat->categorie->img=$newCat['img'];
            $newRmCat->categorie->id_cat_asc=$newCat['id_cat_asc'];

            $rmCats[] = $newRmCat;

        }

        /*echo"<pre>";
        print_r($rmCats);
        exit;*/
        
       return $rmCats;

        
    }



    //public static function readPost($id){

        /*$onePost = Post::select('posts.id, posts.title, posts.description, posts.text, posts.cover, posts.img1, posts.img2, posts.img3, posts.img4,
                                posts.user_id, posts.categorie_id, posts.created_at, users.id, users.name, users.type_user, users.avatar,
                                subcategories.name as categorie, subcategories.id, subcategories.id_cat_asc')
                                ->join('users', 'posts.user_id','=', 'users.id')
                                ->join('subcategories', 'posts.categorie_id','=', 'subcategories.id')
                                ->where('posts.id', $id)
                                ->one();

        return $onePost;*/

        /*$postList = Post::select()
        ->where('posts.id', $id)
        ->one();*/
        //echo"<pre>";
        //echo $categories;
       // print_r($postList);
        //echo $allcats[1];
        //exit;

        /*$post = [];
        
            $newPost = new Post();
            $newPost->id = $postList['id'];
            $newPost->title = $postList['title'];
            $newPost->description = $postList['description'];
            $newPost->text = $postList['text'];
            $newPost->cover = $postList['cover'];
            $newPost->img1 = $postList['img1'];
            $newPost->img2 = $postList['img2'];
            $newPost->img3 = $postList['img3'];
            $newPost->img4 = $postList['img4'];
            $newPost->created_at = $postList['created_at'];

            //4 usuarios que postaram
            $newUser = User::select()->where('id',$postList['user_id'])->one();
            $newPost->user = new User();
            $newPost->user->id=$newUser['id'];
            $newPost->user->name=$newUser['name'];
            $newPost->user->avatar=$newUser['avatar'];
            $newPost->user->type_user=$newUser['type_user'];

            //categorias
            $newCat = Subcategorie::select()->where('id',$postList['categorie_id'])->one();
            $newPost->categorie = new Subcategorie();
            $newPost->categorie->id=$newCat['id'];
            $newPost->categorie->name=$newCat['name'];
            $newPost->categorie->description=$newCat['description'];
            $newPost->categorie->img=$newCat['img'];
            $newPost->categorie->id_cat_asc=$newCat['id_cat_asc'];

            $post[] = $newPost;

      
        
       return $post;


    }*/

}