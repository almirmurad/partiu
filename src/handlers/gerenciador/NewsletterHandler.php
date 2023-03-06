<?php
namespace src\handlers\gerenciador;

use src\models\Newsletter;

class NewsletterHandler { 
    
public static function getNewsletter(){
       
    $listNewsl = Newsletter::select()->get();
    $newsletter = [];
    foreach($listNewsl as $listNewslItem){
        $newNewsletter = new Newsletter;
        $newNewsletter-> id = $listNewslItem['id'];
        $newNewsletter-> name = $listNewslItem['name'];
        $newNewsletter-> email = $listNewslItem['email'];
        $newNewsletter-> phone = $listNewslItem['phone'];
        $newNewsletter-> created_at = $listNewslItem['created_at'];

        $newsletter [] = $newNewsletter;
    }   

    return $newsletter;
}

public static function deleteNewsletter($args){
    //package::delete()->where('partner_id',$args['id'])->execute();
    Newsletter::delete()->where('id', $args)->execute();
    
    return true;
}

}