<?php
namespace src\handlers\gerenciador;

use src\models\Banner;
use src\models\BannerPosition;
use src\models\User;
// echo"<pre>";
//                 print_r($_POST);
//                 echo"chegou aqui no handler";
//                 exit;
class BannerHandler {
                

    public static function addBannerAction($user_id, $title, $description, $position, $url, $image, $advertiser_id, $partner_id, $width, $height, $createdAt, $expiresAt){
       
        Banner::insert([
            'title'          => $title,
            'user_id'       => $user_id,
            'description'      => $description,
            'position_id'      => $position,
            'url'      => $url,
            'img'      => $image,
            'advertiser_id'      => $advertiser_id,
            'partner_id'      => $partner_id,
            'width'      => $width,
            'heigth'      => $height,
            'created_at'    => date('Y-m-d H:i:s'),
            'expires_at' => $expiresAt
        ])->execute();

        return true;
    }

    public static function editPartnerTypeAction($title, $user_id, $description, $id){

        Banner::update()
                ->set('title', $title)
                ->set('user_id', $user_id)
                ->set('description', $description)
                ->set('created_at', date('Y-m-d H:i:s'))
                ->where('id', $id)
                ->execute();

                return true;               
    }

public static function selectAllTypes(){
       
    $listTypes = Banner::select()->get();

    $types = [];
    foreach($listTypes as $listTypeItem){
        $newPartnertType = new Banner;
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

public static function getPositions(){
       
    $listPositions = BannerPosition::select()->get();

    $positions = [];
    foreach($listPositions as $listPositionsItem){
        $newBannerPosition = new BannerPosition;
        $newBannerPosition-> id = $listPositionsItem['id'];
        $newBannerPosition-> title = $listPositionsItem['title'];
        $newBannerPosition-> description = $listPositionsItem['description'];
        $newBannerPosition-> position = $listPositionsItem['position'];
        $newBannerPosition-> page = $listPositionsItem['page'];
        $newBannerPosition-> price_click = $listPositionsItem['price_click'];
        $newBannerPosition-> price_views = $listPositionsItem['price_views'];
        $newBannerPosition-> price_days = $listPositionsItem['price_days'];
        $newBannerPosition-> width = $listPositionsItem['width'];
        $newBannerPosition-> heigth = $listPositionsItem['heigth'];
        $newBannerPosition-> user_id = $listPositionsItem['user_id'];
        $newBannerPosition-> created_at = $listPositionsItem['created_at'];
        
        $newUser = User::select()->where('id',$listPositionsItem['user_id'])->one();
        $newBannerPosition->user = new User();
        $newBannerPosition->user->name=$newUser['name'];
        $newBannerPosition->user->avatar=$newUser['avatar'];

        $positions [] = $newBannerPosition;
    
    }   

    return $positions;
}




 }