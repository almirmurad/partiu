<?php
namespace src\handlers;

use src\models\Categorie;

class CatsHandler {

    public static function catsExists($cat){
        $cat = Categorie::select()->where ('name', $cat)->one();
        return $cat ? true : false;
    }

    public static function addCat($cat, $description, $img, $userId){
        
        Categorie::insert([
            'name'      => $cat,
            'description'     => $description,
            'cover'  => $img,
            'id_user' => $userId,
            'created_at'=> date('Y-m-d H:i:s')
        ])->execute();

        return true;
            
    }

     public static function editCat($cat, $description, $cover, $id, $userId){
        
        Categorie::update()
                ->set('name', $cat)
                ->set('description', $description)
                ->set('cover', $cover)
                ->set('id_user', $userId)
                ->set('created_at', date('Y-m-d H:i:s'))
                ->where('id', $id)
                ->execute();

                return true;
                
    } 
 
}
