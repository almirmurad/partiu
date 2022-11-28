<?php
namespace src\handlers;

use src\models\Noticia;
use src\models\Subcategorie;
use src\models\Categorie;
use src\models\User;

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
        $cat = Categorie::select('id')
        ->where('name', 'Notícias')
        ->one();

        $subCatsList = Subcategorie::select()->where('id_cat_asc', $cat['id'])->execute();

        foreach($subCatsList as $subcatItem){

            $newSubCat = new Subcategorie();
            $newSubCat->id = $subcatItem['id'];
            $newSubCat->name = $subcatItem['name'];

            $subCats[] = $newSubCat; 
        }
            
        return $subCats;
    }

    public static function getNewsId($args){

        $newsList = Noticia::select()
        ->where('id', $args)
        ->one();
        $news = [];
                       
                    $newNews = new Noticia();
                    $newNews->id = $newsList['id'];
                    $newNews->title = $newsList['title'];
                    $newNews->description = $newsList['description'];
                    $newNews->text = $newsList['text'];
                    $newNews->cover = $newsList['cover'];
                    $newNews->img1 = $newsList['img1'];
                    $newNews->legend_img1 = $newsList['legend_img1'];
                    $newNews->img2 = $newsList['img2'];
                    $newNews->legend_img2 = $newsList['legend_img2'];
                    $newNews->source = $newsList['source'];
                    $newNews->user_id = $newsList['user_id'];
                    $newNews->categorie_id = $newsList['categorie_id'];
                    $newNews->subcategorie_id = $newsList['subcategorie_id'];
                    $newNews->clicks = $newsList['clicks'];
                    $newNews->views = $newsList['views'];
                    $newNews->link =  $newsList['link'];
                    $newNews->created_at = $newsList['created_at'];

                    //4 usuario que postou
                    $newUser = User::select()->where('id',$newsList['user_id'])->one();
                    $newNews->user = new User();
                    $newNews->user->id=$newUser['id'];
                    $newNews->user->name=$newUser['name'];
                    $newNews->user->avatar=$newUser['avatar'];
                    $newNews->user->type_user=$newUser['type_user'];

                   
                    
                    $newSubCat = Subcategorie::select()->where('id',$newsList['subcategorie_id'])->one();
                    // echo"<pre>";
                    // print_r($newSubCat);
                    // echo $newSubCat['id'];
                    // exit;
                    $newNews->subCat = new Subcategorie();
                    $newNews->subCat->id = $newSubCat['id'];
                    $newNews->subCat->name=$newSubCat['name'];
                    


                    $news[] = $newNews;
                
        return $news;
    }

    public static function getNews(){
        $newsLists = Noticia::select()->execute();
        $news = [];
            foreach($newsLists as $newsList)
                {            
                    $newNews = new Noticia();
                    $newNews->id = $newsList['id'];
                    $newNews->title = $newsList['title'];
                    $newNews->description = $newsList['description'];
                    $newNews->text = $newsList['text'];
                    $newNews->cover = $newsList['cover'];
                    $newNews->img1 = $newsList['img1'];
                    $newNews->legend_img1 = $newsList['legend_img1'];
                    $newNews->img2 = $newsList['img2'];
                    $newNews->legend_img2 = $newsList['legend_img2'];
                    $newNews->source = $newsList['source'];
                    $newNews->user_id = $newsList['user_id'];
                    $newNews->categorie_id = $newsList['categorie_id'];
                    $newNews->subcategorie_id = $newsList['subcategorie_id'];
                    $newNews->clicks = $newsList['clicks'];
                    $newNews->views = $newsList['views'];
                    $newNews->link =  $newsList['link'];
                    $newNews->created_at = $newsList['created_at'];

                    //4 usuario que postou
                    $newUser = User::select()->where('id',$newsList['user_id'])->one();
                    $newNews->user = new User();
                    $newNews->user->id=$newUser['id'];
                    $newNews->user->name=$newUser['name'];
                    $newNews->user->avatar=$newUser['avatar'];
                    $newNews->user->type_user=$newUser['type_user'];

                    
                    $newSubCat = Subcategorie::select()->where('id',$newsList['subcategorie_id'])->one();
                    // echo"<pre>";
                    // print_r($newSubCat);
                    // echo $newSubCat['id'];
                    // exit;
                    $newNews->subCat = new Subcategorie();
                    $newNews->subCat->id = $newSubCat['id'];
                    $newNews->subCat->name=$newSubCat['name'];
                    


                    $news[] = $newNews;
                }
        return $news;
        }

    }

