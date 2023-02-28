<?php
namespace src\handlers\site;
use src\models\User;
use src\models\Post;
use ClanCats\Hydrahon\Query\Expression as Rnd;
use src\models\Categorie;
use src\models\News;
use src\models\Noticia;
use src\models\Subcategorie;
use src\functions\FuncoesUteis;

//use ClanCats\Hydrahon\Query\Expression as Rnd;

class NewsSiteHandler {

    public static function news($page){
        $perPage = 9;
        //0 as categorias dos posts
        /*$catPosts = Subcategorie::select()
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
            
        } */      
        //echo"<pre>";
        //echo $categories;
       // print_r($categories);
        //echo $allcats[1];
       // exit;
        //3 Posts
        $newsList = Noticia::select()
            //->where('categorie_id','in',$categories)
            ->orderBy('created_at', 'DESC')
            ->page($page, $perPage)
        ->get();
        $total = Noticia::select()
        //->where('categorie_id','in',$categories)
        ->orderBy('created_at', 'DESC')
        ->count();
        $pageCount = ceil($total / $perPage);


        //5 transformar em objetos dos models
        $news = [];
        foreach($newsList as $newsItem){
            $newNews = new Noticia();
            $newNews->id = $newsItem['id'];
            $newNews->title = $newsItem['title'];
            
            $newNews->description = FuncoesUteis::limita_caracteres($newsItem['description'], 100, false);


            $newNews->text = $newsItem['text'];
            $newNews->cover = $newsItem['cover'];
            $newNews->img1 = $newsItem['img1'];
            $newNews->img2 = $newsItem['img2'];
            $newNews->legend_img1 = $newsItem['legend_img1'];
            $newNews->legend_img2 = $newsItem['legend_img2'];
            $newNews->source = $newsItem['source'];
            $newNews->user_id = $newsItem['user_id'];
            $newNews->created_at = $newsItem['created_at'];
            //$newNews->price = number_format($newsItem['price'],2,',','.');

            //4 usuarios que postaram
            $newUser = User::select()->where('id',$newsItem['user_id'])->one();
            $newNews->user = new User();
            $newNews->user->id=$newUser['id'];
            $newNews->user->name=$newUser['name'];
            $newNews->user->avatar=$newUser['avatar'];
            $newNews->user->type_user=$newUser['type_user'];

            //categorias
            $newCat = Subcategorie::select()->where('id',$newsItem['categorie_id'])->one();
            $newNews->categorie = new Subcategorie();
            $newNews->categorie->id=$newCat['id'];
            $newNews->categorie->name=$newCat['name'];
            $newNews->categorie->description=$newCat['description'];
            $newNews->categorie->img=$newCat['img'];
            $newNews->categorie->id_cat_asc=$newCat['id_cat_asc'];

            $news[] = $newNews;
           
        }

       return [ 'news'=>$news,
                'pageCount'=>$pageCount,
                'currentPage'=>$page
            ];

       
        
    }

    public static function newsHome(){
       
        $newsList = Noticia::select()->limit(8)->get();

        $news = [];
        foreach($newsList as $newsItem){
            $newNews = new Noticia();
            $newNews->id = $newsItem['id'];
            $newNews->title = $newsItem['title'];
            $newNews->description = FuncoesUteis::limita_caracteres($newsItem['description'], 100, false);
            $newNews->text = $newsItem['text'];
            $newNews->cover = $newsItem['cover'];
            $newNews->img1 = $newsItem['img1'];
            $newNews->img2 = $newsItem['img2'];
            $newNews->legend_img1 = $newsItem['legend_img1'];
            $newNews->legend_img2 = $newsItem['legend_img2'];
            $newNews->source = $newsItem['source'];
            $newNews->user_id = $newsItem['user_id'];
            $newNews->created_at = $newsItem['created_at'];
           
            //4 usuarios que postaram
            $newUser = User::select()->where('id',$newsItem['user_id'])->one();
            $newNews->user = new User();
            $newNews->user->id=$newUser['id'];
            $newNews->user->name=$newUser['name'];
            $newNews->user->avatar=$newUser['avatar'];
            $newNews->user->type_user=$newUser['type_user'];

            //categorias
            $newCat = Subcategorie::select()->where('id',$newsItem['categorie_id'])->one();
            $newNews->categorie = new Subcategorie();
            $newNews->categorie->id=$newCat['id'];
            $newNews->categorie->name=$newCat['name'];
            $newNews->categorie->description=$newCat['description'];
            $newNews->categorie->img=$newCat['img'];
            $newNews->categorie->id_cat_asc=$newCat['id_cat_asc'];

            $news[] = $newNews;
           
        }

       return [ 'news'=>$news,  ];
    }

    public static function oneNews($args){

   
       
        $newsItem = Noticia::select('noticias.categorie_id,noticias.id,noticias.title,noticias.created_at, noticias.source, noticias.text, noticias.user_id, noticias.legend_img1, noticias.legend_img2, noticias.img1, noticias.img2, noticias.cover, noticias.description, users.name')
        ->join('users', 'noticias.user_id', '=', 'users.id')
        ->where('noticias.id', $args)
        ->one();

    //         echo"<pre>";
    //    print_r($newsItem);
    //    exit;

   
            $newNews = new Noticia();
            $newNews->id = $newsItem['id'];
            $newNews->title = $newsItem['title'];
            $newNews->description = FuncoesUteis::limita_caracteres($newsItem['description'], 100, false);
            $newNews->text = $newsItem['text'];
            $newNews->cover = $newsItem['cover'];
            $newNews->img1 = $newsItem['img1'];
            $newNews->img2 = $newsItem['img2'];
            $newNews->legend_img1 = $newsItem['legend_img1'];
            $newNews->legend_img2 = $newsItem['legend_img2'];
            $newNews->source = $newsItem['source'];
            $newNews->user_id = $newsItem['user_id'];
            $newNews->created_at = $newsItem['created_at'];
           
            //4 usuarios que postaram
            $newUser = User::select()->where('id',$newsItem['user_id'])->one();
            $newNews->user = new User();
            $newNews->user->id=$newUser['id'];
            $newNews->user->name=$newUser['name'];
            $newNews->user->avatar=$newUser['avatar'];
            $newNews->user->type_user=$newUser['type_user'];

            //categorias
            $newCat = Subcategorie::select()->where('id',$newsItem['categorie_id'])->one();
            $newNews->categorie = new Subcategorie();
            $newNews->categorie->id=$newCat['id'];
            $newNews->categorie->name=$newCat['name'];
            $newNews->categorie->description=$newCat['description'];
            $newNews->categorie->img=$newCat['img'];
            $newNews->categorie->id_cat_asc=$newCat['id_cat_asc'];

    

       return $newNews;
    }


}