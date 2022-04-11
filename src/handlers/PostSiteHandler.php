<?php
namespace src\handlers;
use src\models\User;
use src\models\Post;
use ClanCats\Hydrahon\Query\Expression as Rnd;
use src\models\Categorie;
use src\models\Subcategorie;

//use ClanCats\Hydrahon\Query\Expression as Rnd;

class PostSiteHandler {

    public static function nameCategoriePosts(){

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

    }


    public static function posts(){
        //0 as categorias dos posts
        $catPosts = Subcategorie::select()
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
            
        }       
        //echo"<pre>";
        //echo $categories;
       // print_r($categories);
        //echo $allcats[1];
       // exit;
        //3 Posts
        $postList = Post::select()
            ->where('categorie_id','in',$categories)
            ->orderBy('created_at', 'DESC')
        ->get();

        //5 transformar em objetos dos models
        $posts = [];
        foreach($postList as $postItem){
            $newPost = new Post();
            $newPost->id = $postItem['id'];
            $newPost->title = $postItem['title'];
            $newPost->description = $postItem['description'];
            $newPost->text = $postItem['text'];
            $newPost->cover = $postItem['cover'];
            $newPost->img1 = $postItem['img1'];
            $newPost->img2 = $postItem['img2'];
            $newPost->img3 = $postItem['img3'];
            $newPost->img4 = $postItem['img4'];
            $newPost->created_at = $postItem['created_at'];

            //4 usuarios que postaram
            $newUser = User::select()->where('id',$postItem['user_id'])->one();
            $newPost->user = new User();
            $newPost->user->id=$newUser['id'];
            $newPost->user->name=$newUser['name'];
            $newPost->user->avatar=$newUser['avatar'];
            $newPost->user->type_user=$newUser['type_user'];

            //categorias
            $newCat = Subcategorie::select()->where('id',$postItem['categorie_id'])->one();
            $newPost->categorie = new Subcategorie();
            $newPost->categorie->id=$newCat['id'];
            $newPost->categorie->name=$newCat['name'];
            $newPost->categorie->description=$newCat['description'];
            $newPost->categorie->img=$newCat['img'];
            $newPost->categorie->id_cat_asc=$newCat['id_cat_asc'];

            $posts[] = $newPost;

        }
        
       return $posts;
        
    }



    public static function readPost($id){

        /*$onePost = Post::select('posts.id, posts.title, posts.description, posts.text, posts.cover, posts.img1, posts.img2, posts.img3, posts.img4,
                                posts.user_id, posts.categorie_id, posts.created_at, users.id, users.name, users.type_user, users.avatar,
                                subcategories.name as categorie, subcategories.id, subcategories.id_cat_asc')
                                ->join('users', 'posts.user_id','=', 'users.id')
                                ->join('subcategories', 'posts.categorie_id','=', 'subcategories.id')
                                ->where('posts.id', $id)
                                ->one();

        return $onePost;*/

        $postList = Post::select()
        ->where('posts.id', $id)
        ->one();
        //echo"<pre>";
        //echo $categories;
       // print_r($postList);
        //echo $allcats[1];
        //exit;

        $post = [];
        
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


    }

}