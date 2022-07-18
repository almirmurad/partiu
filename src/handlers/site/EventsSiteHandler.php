<?php
namespace src\handlers\site;
use src\models\User;
use src\models\Post;
use ClanCats\Hydrahon\Query\Expression as Rnd;
use src\models\Categorie;
use src\models\Event;
use src\models\Subcategorie;

//use ClanCats\Hydrahon\Query\Expression as Rnd;

class EventsSiteHandler {

    public static function events($page){
        $perPage = 12;
        
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
        
        return [ 
                'events'=>$events,
                'pageCount'=>$pageCount,
                'currentPage'=>$page
            ];
    }



    public static function readEvent($id){

        $eventList = Event::select()
        ->where('events.id', $id)
        ->one();

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
        
        $eventsList = Event::select()
        ->orderBy(new rnd('rand()'))
        ->limit(4)
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

    public static function eventsIndex(){
        $events =[];
        $eventsList = Event::select()
        ->orderBy(new rnd('rand()'))
        ->limit(6)
        ->execute();

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
            $newEvent->created_at = $eventItem['created_at'];
            $newEvent->link = $eventItem['link'];
            $newEvent->expires_at = $eventItem['expires_at'];
            //$newEvent->price = 'R$ '.number_format($eventItem['price'],2,',','.');      

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
        
        return $events;
    }

}