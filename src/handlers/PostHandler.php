<?php
namespace src\handlers;

use src\models\Post;

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

}