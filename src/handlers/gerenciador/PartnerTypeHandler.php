<?php
namespace src\handlers\gerenciador;

use src\models\Typespartner;
use src\models\User;
use src\functions\FuncoesUteis;

class PartnerTypeHandler {

    public static function addPartnerTypeAction( $title, $user_id, $description){
       
        Typespartner::insert([
            'title'          => $title,
            'user_id'       => $user_id,
            'description'      => $description,
            'created_at'    => date('Y-m-d H:i:s'),
           
        ])->execute();

        return true;
    }

    public static function editPartnerTypeAction($title, $user_id, $description, $id){

        Typespartner::update()
                ->set('title', $title)
                ->set('user_id', $user_id)
                ->set('description', $description)
                ->set('created_at', date('Y-m-d H:i:s'))
                ->where('id', $id)
                ->execute();

                return true;               
    }

public static function selectAllTypes(){
       
    $listTypes = Typespartner::select()->get();

    $types = [];
    foreach($listTypes as $listTypeItem){
        $newPartnertType = new Typespartner;
        $newPartnertType-> id = $listTypeItem['id'];
        $newPartnertType-> title = $listTypeItem['title'];
        $newPartnertType-> description = $listTypeItem['description'];
        $newPartnertType-> user_id = $listTypeItem['user_id'];
        $newPartnertType-> created_at = $listTypeItem['created_at'];
        
        $newUser = User::select()->where('id',$listTypeItem['user_id'])->one();
        $newPartnertType->user = new User();
        $newPartnertType->user->name=$newUser['name'];
        $newPartnertType->user->avatar=$newUser['avatar'];

        $types [] = $newPartnertType;
    
    }   

    return $types;
}

public static function selectOneType($args){
      
    $one = Typespartner::select()->where('id',$args)->one();


   
        $type = new Typespartner;
        $type-> id = $one['id'];
        $type-> title = $one['title'];
        $type-> description = $one['description'];
        $type-> user_id = $one['user_id'];
        $type-> created_at = $one['created_at'];

    return $type;
}

 }