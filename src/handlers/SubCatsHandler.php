<?php
namespace src\handlers;

use src\models\Subcategorie;

class SubCatsHandler {
    public static function subCatExists($subCat){
        $subCat = Subcategorie::select()->where ('name', $subCat)->one();
        return $subCat ? true : false;
    }

    public static function addSubCat($subCat, $description, $img, $userId, $idCatAsc){

        if(empty($img)){
            $img = "subCatSemImg.png";
        }
        
        Subcategorie::insert([
            'name'      => $subCat,
            'description'=>$description,
            'img'  => $img,
            'id_user' => $userId,
            'id_cat_asc'=>$idCatAsc,
            'created_at'=> date('Y-m-d H:i:s')
            
        ])->execute();

        return true;
            
    } 

    public static function editSubCat($subCat, $description, $img, $id, $userId, $idCatAsc){
        
        Subcategorie::update()
                ->set('name', $subCat)
                ->set('description', $description)
                ->set('img', $img)
                ->set('id_user', $userId)
                ->set('id_cat_asc', $idCatAsc)
                ->set('created_at', date('Y-m-d H:i:s'))
                ->where('id', $id)
                ->execute();

                return true;
                
    } 

    
}