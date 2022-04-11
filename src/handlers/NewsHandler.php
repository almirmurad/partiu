<?php
namespace src\handlers;

use src\models\Noticia;
use src\models\Subcategorie;

class NewsHandler {

    public static function addNewsAction($user_id, $title, $description, $text, $legend_img1, $legend_img2, $source, $subcategorie_id, $fotoNames){
        
        list($cover, $foto1, $foto2) = $fotoNames;

        Noticia::insert([
            'title'             => $title,
            'description'       => $description,
            'text'              => $text,
            'cover'             => $cover,
            'img1'              => $foto1,
            'legend_img1'       => $legend_img1,
            'img2'              => $foto2,
            'legend_img2'       => $legend_img2,
            'source'            => $source,
            'subcategorie_id'   => $subcategorie_id,
            'user_id'           => $user_id,
            'created_at'        => date('Y-m-d H:i:s')
        ])->execute();

        return true;
    }

    public static function editNews($id, $title, $description, $text, $cover, $foto1, $legend_img1, $foto2, $legend_img2, $source, $user_id, $subcategorie_id){

        Noticia::update()
                ->set('title', $title)
                ->set('description', $description)
                ->set('text', $text)
                ->set('cover', $cover)
                ->set('img1', $foto1)
                ->set('legend_img1', $legend_img1)
                ->set('img2', $foto2)
                ->set('legend_img2', $legend_img2)
                ->set('source', $source)
                ->set('user_id', $user_id)
                ->set('subcategorie_id', $subcategorie_id)
                ->set('created_at', date('Y-m-d H:i:s'))
                ->where('id', $id)
                ->execute();

                return true;               
    }

    public static function newsCat(){
       
        $subCats = [];
        $cat = Noticia::select('categorie_id')->one();

        $subCatsList = Subcategorie::select()->where('id_cat_asc', $cat['categorie_id'])->execute();

        foreach($subCatsList as $subcatItem){

            $newSubCat = new Subcategorie();
            $newSubCat->id = $subcatItem['id'];
            $newSubCat->name = $subcatItem['name'];

            $subCats[] = $newSubCat; 
        }
            
        return $subCats;
    }

}