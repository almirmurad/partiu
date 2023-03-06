<?php
namespace src\handlers\site;
use src\models\User;
use src\models\Newsletter;
use ClanCats\Hydrahon\Query\Expression as Rnd;


class NewslSiteHandler {

    public static function insertNewsl($email, $nome, $telefone,$check){
        Newsletter::insert([
            'name'          => $nome,
            'phone'         => $telefone,
            'email'         => $email,
            'check'         => $check,
            'created_at'    => date('Y-m-d H:i:s'),
           
        ])->execute();
        
        return true;
    }



    

}