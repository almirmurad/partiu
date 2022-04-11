<?php
namespace src\handlers;

use src\models\RoadMap;
use src\models\User;

class RMHandler {

    public static function catsExists($rm){
        $rm = RoadMap::select()->where ('title', $rm)->one();
        return $rm ? true : false;
    }

    public static function addRMAction($title, $description, $text, $userId, $subCatId, $fotoNames){

        list($cover, $img1, $img2, $img3, $img4) = $fotoNames;

        RoadMap::insert([
            'title'             => $title,
            'description'       => $description,
            'text'              => $text,
            'cover'             => $cover,
            'img1'              => $img1,
            'img2'              => $img2,
            'img3'              => $img3,
            'img4'              => $img4,
            'user_id'           => $userId,
            'subcategorie_id'   => $subCatId,
            'created_at'        => date('Y-m-d H:i:s')
        ])->execute();

        return true;
            
    }

    public static function findRedator($roadMaps){
        $roadMaps = RoadMap::select(['roadmaps.id', 'roadmaps.title', 'roadmaps.description', 'roadmaps.cover', 
        'roadmaps.created_at', 'roadmaps.user_id', 'users.name', 'users.id as idUsuario'])
        ->join('users', 'roadmaps.user_id', '=', 'users.id')
        ->execute();
        

            
            return $roadMaps;

        }
    



     public static function editRoadMap($id, $title, $description, $text, $fotoNames, $user_id, $subCat){
        
        list($cover, $img1, $img2, $img3, $img4) = $fotoNames;

        RoadMap::update()
                ->set('title', $title)
                ->set('description', $description)
                ->set('text', $text)
                ->set('cover', $cover)
                ->set('img1', $img1)
                ->set('img2', $img2)
                ->set('img3', $img3)
                ->set('img4', $img4)
                ->set('user_id', $user_id)
                ->set('subcategorie_id', $subCat)
                ->set('created_at', date('Y-m-d H:i:s'))
                ->where('id', $id)
                ->execute();

                return true;
                
    } 
 
}
