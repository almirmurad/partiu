<?php
namespace src\handlers;

use src\models\Post;
use src\models\User;

class PostHandler {

    public static function addPostAction($title, $description, $text, $user_id, $categorie_id, $fotoNames){
        list($cover, $img1, $img2, $img3, $img4)=$fotoNames;
        Post::insert([
            'title'         => $title,
            'description'   => $description,
            'text'          => $text,
            'cover'         => $cover,
            'img1'          => $img1,
            'img2'          => $img2,
            'img3'          => $img3,
            'img4'          => $img4,
            'categorie_id'  => $categorie_id,
            'user_id'       => $user_id,
            
            'created_at'    => date('Y-m-d H:i:s')
        ])->execute();

        return true;
    }

    public static function editPost($id, $title, $description, $text, $cover, $img1, $img2, $img3, $img4, $user_id, $categorie_id){

        Post::update()
                ->set('title', $title)
                ->set('description', $description)
                ->set('text', $text)
                ->set('cover', $cover)
                ->set('img1', $img1)
                ->set('img2', $img2)
                ->set('img3', $img3)
                ->set('img4', $img4)
                ->set('categorie_id', $categorie_id)
                ->set('user_id', $user_id)
                ->set('created_at', date('Y-m-d H:i:s'))
                ->where('id', $id)
                ->execute();

                return true;               
    }

    public static function getPosts(){

        $postsLists = Post::select()->execute();
        $posts = [];
            foreach($postsLists as $postList)
                {            
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
                    
                    $newPost->user_id = $postList['user_id'];
                    $newPost->categorie_id = $postList['categorie_id'];
                    
                    $newPost->clicks = $postList['clicks'];
                    $newPost->views = $postList['views'];
                    $newPost->link =  $postList['link'];
                    $newPost->created_at = $postList['created_at'];

                    //4 usuario que postou
                    $newUser = User::select()->where('id',$postList['user_id'])->one();
                    $newPost->user = new User();
                    $newPost->user->id=$newUser['id'];
                    $newPost->user->name=$newUser['name'];
                    $newPost->user->avatar=$newUser['avatar'];
                    $newPost->user->type_user=$newUser['type_user'];

                    $posts[] = $newPost;
                }
        return $posts;


    }

}