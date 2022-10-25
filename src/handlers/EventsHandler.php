<?php
namespace src\handlers;

use src\models\Event;
use src\models\User;
class EventsHandler {

    public static function addEventAction($title, $description, $text, $user_id, $link, $expiraEm, $imgNames){

        list($cover, $foto1, $foto2, $foto3, $foto4) = $imgNames;

        Event::insert([
            'title'         => $title,
            'description'   => $description,
            'text'          => $text,
            'cover'         => $cover,
            'img1'          => $foto1,
            'img2'          => $foto2,
            'img3'          => $foto3,
            'img4'          => $foto4,
            'link'          => $link,
            'user_id'       => $user_id,
            'expires_at'    => $expiraEm,
            'created_at'    => date('Y-m-d H:i:s'),
        ])->execute();

        return true;
    }

    public static function editEvent($id, $title, $description, $text, $cover, $img1, $img2, $img3, $img4, $link, $user_id, $expiraEm){
        
        Event::update()
                ->set('title', $title)
                ->set('description', $description)
                ->set('text', $text)
                ->set('cover', $cover)
                ->set('img1', $img1)
                ->set('img2', $img2)
                ->set('img3', $img3)
                ->set('img4', $img4)
                ->set('link', $link)
                ->set('expires_at', $expiraEm)     
                //->set('categorie_id', $categorie_id)
                ->set('user_id', $user_id)
                ->set('created_at', date('Y-m-d H:i:s'))
                ->where('id', $id)
                ->execute();

                return true;               
    }

    public static function getEvents(){
        $eventsLists = Event::select()->execute();
        $events = [];
            foreach($eventsLists as $eventList)
                {            
                    $newEvent = new Event();
                    $newEvent->id = $eventList['id'];
                    $newEvent->title = $eventList['title'];
                    $newEvent->description = $eventList['description'];
                    $newEvent->text = $eventList['text'];
                    $newEvent->created_at = $eventList['created_at'];
                    $newEvent->user_id = $eventList['user_id'];
                    $newEvent->clicks = $eventList['clicks'];
                    $newEvent->views = $eventList['views'];
                    $newEvent->status = $eventList['status'];
                    $newEvent->link =  $eventList['link'];
                    $newEvent->cover = $eventList['cover'];
                    $newEvent->img1 = $eventList['img1'];
                    $newEvent->img2 = $eventList['img2'];
                    $newEvent->img3 = $eventList['img3'];
                    $newEvent->img4 = $eventList['img4'];
                    $newEvent->expires_at = $eventList['expires_at'];               
                    
                    //4 usuario que postou
                    $newUser = User::select()->where('id',$eventList['user_id'])->one();
                    $newEvent->user = new User();
                    $newEvent->user->id=$newUser['id'];
                    $newEvent->user->name=$newUser['name'];
                    $newEvent->user->avatar=$newUser['avatar'];
                    $newEvent->user->type_user=$newUser['type_user'];

                    $events[] = $newEvent;
                }
        return $events;
    }

}