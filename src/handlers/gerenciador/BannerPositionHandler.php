<?php
namespace src\handlers\gerenciador;

use src\models\BannerPosition;
use src\models\User;
// echo"<pre>";
//                 print_r($_POST);
//                 echo"chegou aqui no handler";
//                 exit;
class BannerPositionHandler {
                

    public static function addBannerPositionAction( $user_id, $title, $description, $position, $page, $priceClick, $priceViews, $priceDays, $width, $height, $createdAt, $expiresAt){
       
        BannerPosition::insert([
            'title'          => $title,
            'user_id'       => $user_id,
            'description'      => $description,
            'position'      => $position,
            'page'      => $page,
            'price_click'      => $priceClick,
            'price_days'      => $priceDays,
            'price_views'      => $priceViews,
            'width'      => $width,
            'heigth'      => $height,
            'created_at'    => date('Y-m-d H:i:s'),
            'expires_at' => $expiresAt
        ])->execute();

        return true;
    }

    public static function editPartnerTypeAction($title, $user_id, $description, $id){

        BannerPosition::update()
                ->set('title', $title)
                ->set('user_id', $user_id)
                ->set('description', $description)
                ->set('created_at', date('Y-m-d H:i:s'))
                ->where('id', $id)
                ->execute();

                return true;               
    }

public static function selectAllTypes(){
       
    $listTypes = BannerPosition::select()->get();

    $types = [];
    foreach($listTypes as $listTypeItem){
        $newPartnertType = new BannerPosition;
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

 }