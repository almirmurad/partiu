<?php
namespace src\handlers;

use src\models\Package;

class PackageHandler {

    public static function addPackageAction($title, $description, $text, $fotoNames, $user_id, $destino, $estado, $pais, $saidaDe, $dataSaida, $dataRetorno, $expiraEm, $preco ){
        
        list($cover, $img1, $img2, $img3, $img4) = $fotoNames;
       
        Package::insert([
            'title'         => $title,
            'description'   => $description,
            'text'          => $text,
            'cover'         => $cover,
            'img1'          => $img1,
            'img2'          => $img2,
            'img3'          => $img3,
            'img4'          => $img4,
            'destination'   => $destino,
            'state'         => $estado,
            'country'       => $pais,
            'user_id'       => $user_id,
            'exit_from'     => $saidaDe,
            'going_on'      => $dataSaida,
            'return_in'     => $dataRetorno,
            'expires_at'    => $expiraEm,
            'price'         => $preco,
            'created_at'    => date('Y-m-d H:i:s'),
           
        ])->execute();

        return true;
    }

    public static function editPackage($id, $title, $description, $text, $cover, $img1, $img2, $img3, $img4, $user_id, $destino, $estado, $pais, $saidaDe, $dataSaida, $dataRetorno, $expiraEm, $preco){
        
        Package::update()
                ->set('title', $title)
                ->set('description', $description)
                ->set('text', $text)
                ->set('cover', $cover)
                ->set('img1', $img1)
                ->set('img2', $img2)
                ->set('img3', $img3)
                ->set('img4', $img4)
                ->set('destination', $destino)
                ->set('state', $estado)
                ->set('country', $pais)
                ->set('exit_from', $saidaDe)
                ->set('going_on', $dataSaida)
                ->set('return_in', $dataRetorno)
                ->set('expires_at', $expiraEm)
                ->set('price', $preco)
                //->set('categorie_id', $categorie_id)
                ->set('user_id', $user_id)
                ->set('created_at', date('Y-m-d H:i:s'))
                ->where('id', $id)
                ->execute();

                return true;               
    }

}