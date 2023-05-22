<?php
namespace src\handlers\site;
use src\models\Partnership;
use src\models\Post;
use ClanCats\Hydrahon\Query\Expression as Rnd;
use src\models\Categorie;
use src\models\Package;
use src\models\Partner;
use src\models\Subcategorie;
use src\functions\FuncoesUteis;

//use ClanCats\Hydrahon\Query\Expression as Rnd;

class PartnershipSiteHandler {


    public static function readPartnership($id){

        $partnershipList = Partnership::select()->where('id_type_partner',$id)->get();
        //echo"<pre>";
        //echo $categories;
        //print_r($partnershipList);
        //echo $allcats[1];
        //exit;

        $partnership = [];
            foreach($partnershipList as $partnershipItem){
            $newPartnership = new Partnership();
            $newPartnership->id=$partnershipItem['id'];
            $newPartnership->title=$partnershipItem['title'];
            $newPartnership->id_type_partner=$partnershipItem['id_type_partner'];
            $newPartnership->description=$partnershipItem['description'];
            $newPartnership->cover=$partnershipItem['cover'];
            $newPartnership->max_pack=$partnershipItem['max_pack'];
            $newPartnership->max_pub=$partnershipItem['max_pub'];
            $newPartnership->price=number_format($partnershipItem['price'],2,',','.');
            $newPartnership->active=$partnershipItem['active'];
            $newPartnership->created_at=$partnershipItem['created_at'];
           
            $partnership[] = $newPartnership;
        
        }

            
     
            

      
        
       return $partnership;


    }

}