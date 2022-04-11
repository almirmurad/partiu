<?php
namespace src\handlers;
use src\models\User;
use src\models\Post;
use ClanCats\Hydrahon\Query\Expression as Rnd;
use src\models\Categorie;
use src\models\Event;
use src\models\Subcategorie;

//use ClanCats\Hydrahon\Query\Expression as Rnd;

class EventsSiteHandler {

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


    public static function events($page){
        $perPage = 12;
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
        $eventsList = Event::select()
            //->where('categorie_id','in',$categories)
            ->page($page, $perPage)
            ->orderBy('created_at', 'DESC')
        ->get();
        $total = Event::select()
        //->where('categorie_id','in',$categories)
        ->orderBy('created_at', 'DESC')
        ->count();
        $pageCount = ceil($total / $perPage);

        //5 transformar em objetos dos models
        $events = [];
        foreach($eventsList as $eventItem){
            $newEvent = new Event();
            $newEvent->id = $eventItem['id'];
            $newEvent->title = $eventItem['title'];
            $newEvent->description = $eventItem['description'];
            $newEvent->text = $eventItem['text'];
            $newEvent->cover = $eventItem['cover'];
            $newEvent->img1 = $eventItem['img1'];
            $newEvent->img2 = $eventItem['img2'];
            $newEvent->img3 = $eventItem['img3'];
            $newEvent->img4 = $eventItem['img4'];
            //$newEvent->destination = $eventItem['destination'];
            //newEvent->state = $eventItem['state'];
            //$newEvent->country = $eventItem['country'];
            //$newEvent->price = number_format($eventItem['price'],2,',','.');

            
            
            

            //4 usuarios que postaram
            $newUser = User::select()->where('id',$eventItem['user_id'])->one();
            if(empty($newUser)){
                
                continue;
            
            }
            $newEvent->user = new User();
            $newEvent->user->id=$newUser['id'];
            $newEvent->user->name=$newUser['name'];
            $newEvent->user->avatar=$newUser['avatar'];
            $newEvent->user->type_user=$newUser['type_user'];
           

            //categorias
            /*$newCat = Subcategorie::select()->where('id',$eventItem['categorie_id'])->one();
            $newEvent->categorie = new Subcategorie();
            $newEvent->categorie->id=$newCat['id'];
            $newEvent->categorie->name=$newCat['name'];
            $newEvent->categorie->description=$newCat['description'];
            $newEvent->categorie->img=$newCat['img'];
            $newEvent->categorie->id_cat_asc=$newCat['id_cat_asc'];*/

            $events[] = $newEvent;
           
        }

        /*echo "<pre>";
    print_r($events);
    exit;*/
        
        return [ 
                'events'=>$events,
                'pageCount'=>$pageCount,
                'currentPage'=>$page
            ];

       
        
    }



    public static function readEvent($id){

        /*$onePost = Post::select('posts.id, posts.title, posts.description, posts.text, posts.cover, posts.img1, posts.img2, posts.img3, posts.img4,
                                posts.user_id, posts.categorie_id, posts.created_at, users.id, users.name, users.type_user, users.avatar,
                                subcategories.name as categorie, subcategories.id, subcategories.id_cat_asc')
                                ->join('users', 'posts.user_id','=', 'users.id')
                                ->join('subcategories', 'posts.categorie_id','=', 'subcategories.id')
                                ->where('posts.id', $id)
                                ->one();

        return $onePost;*/

        $eventList = Event::select()
        ->where('events.id', $id)
        ->one();
        //echo"<pre>";
        //echo $categories;
       // print_r($eventList);
        //echo $allcats[1];
        //exit;

        $events = [];

        $newEvent = new Event();
        $newEvent->id = $eventList['id'];
        $newEvent->title = $eventList['title'];
        $newEvent->description = $eventList['description'];
        $newEvent->text = $eventList['text'];
        $newEvent->cover = $eventList['cover'];
        $newEvent->img1 = $eventList['img1'];
        $newEvent->img2 = $eventList['img2'];
        $newEvent->img3 = $eventList['img3'];
        $newEvent->img4 = $eventList['img4'];
        $newEvent->created_at = $eventList['created_at'];
        $newEvent->link = $eventList['link'];
        $newEvent->expires_at = $eventList['expires_at'];
        
           /* $newEvent = new Event();
            $newEvent->id = $eventList['id'];
            $newEvent->title = $eventList['title'];
            $newEvent->description = $eventList['description'];
            $newEvent->text = $eventList['text'];
            $newEvent->cover = $eventList['cover'];
            $newEvent->img1 = $eventList['img1'];
            $newEvent->img2 = $eventList['img2'];
            $newEvent->img3 = $eventList['img3'];
            $newEvent->img4 = $eventList['img4'];
            $newEvent->created_at = $eventList['created_at'];
            $newEvent->destination = $eventList['destination'];
            $newEvent->state = $eventList['state'];
            $newEvent->country = $eventList['country'];
            $newEvent->exit_from = $eventList['exit_from'];
            $newEvent->going_on = date('d/m/Y \à\\s H:i',strtotime($eventList['going_on']));
            
            $newEvent->return_in =  date('d/m/Y \à\\s H:i', strtotime($eventList['return_in'])) ;
            $newEvent->expires_at = date('d/m/Y \à\\s H:i', strtotime($eventList['expires_at']));
            $newEvent->price = number_format($eventList['price'],2,',','.');*/

            //4 usuarios que postaram
            $newUser = User::select()->where('id',$eventList['user_id'])->one();
            $newEvent->user = new User();
            $newEvent->user->id=$newUser['id'];
            $newEvent->user->name=$newUser['name'];
            $newEvent->user->avatar=$newUser['avatar'];
            $newEvent->user->type_user=$newUser['type_user'];

            //categorias
            /*$newCat = Subcategorie::select()->where('id',$eventList['categorie_id'])->one();
            $newEvent->categorie = new Subcategorie();
            $newEvent->categorie->id=$newCat['id'];
            $newEvent->categorie->name=$newCat['name'];
            $newEvent->categorie->description=$newCat['description'];
            $newEvent->categorie->img=$newCat['img'];
            $newEvent->categorie->id_cat_asc=$newCat['id_cat_asc'];*/

            $events[] = $newEvent;

      
        
       return $events;


    }

    public static function eventsFoot(){
        
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
        $eventsList = Event::select()
            //->where('categorie_id','in',$categories)
            ->orderBy(new rnd('rand()'))
        ->limit(3)
        ->get();
    
        //5 transformar em objetos dos models
        $events = [];
        foreach($eventsList as $eventItem){
            $newEvent = new Event();
            $newEvent->id = $eventItem['id'];
            $newEvent->title = $eventItem['title'];
            $newEvent->description = $eventItem['description'];
            $newEvent->text = $eventItem['text'];
            $newEvent->cover = $eventItem['cover'];
            $newEvent->img1 = $eventItem['img1'];
            $newEvent->img2 = $eventItem['img2'];
            $newEvent->img3 = $eventItem['img3'];
            $newEvent->img4 = $eventItem['img4'];
            //$newEvent->destination = $eventItem['destination'];
            //newEvent->state = $eventItem['state'];
            //$newEvent->country = $eventItem['country'];
            //$newEvent->price = number_format($eventItem['price'],2,',','.');

            //4 usuarios que postaram
            $newUser = User::select()->where('id',$eventItem['user_id'])->one();
            if(!$newUser){
                continue;
            }
            $newEvent->user = new User();
            $newEvent->user->id=$newUser['id'];
            $newEvent->user->name=$newUser['name'];
            $newEvent->user->avatar=$newUser['avatar'];
            $newEvent->user->type_user=$newUser['type_user'];

            //categorias
            /*$newCat = Subcategorie::select()->where('id',$eventItem['categorie_id'])->one();
            $newEvent->categorie = new Subcategorie();
            $newEvent->categorie->id=$newCat['id'];
            $newEvent->categorie->name=$newCat['name'];
            $newEvent->categorie->description=$newCat['description'];
            $newEvent->categorie->img=$newCat['img'];
            $newEvent->categorie->id_cat_asc=$newCat['id_cat_asc'];*/

            $events[] = $newEvent;
           
        }

        /*echo "<pre>";
    print_r($events);
    exit;*/
        
        return [ 
                'events'=>$events
                //'pageCount'=>$pageCount,
               // 'currentPage'=>$page
            ]; 
    }

}