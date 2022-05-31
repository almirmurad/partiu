<?php
namespace src\handlers;

use src\models\Partner;

class PartnerHandler {

    public static function addPartnerAction($fotoNames, $name, $cpf, $cnpj, $user_id, $phone, $email, $adress, $number, $complement, $district, $city, $state, $country, $postalCode, $description, $about, $url){
        
        list($cover, $img1, $img2, $img3, $img4) = $fotoNames;
       
        Partner::insert([
            'name'         => $name,
            'cpf'   => $cpf,
            'cnpj'          => $cnpj,
            'cover'         => $cover,
            'img1'          => $img1,
            'img2'          => $img2,
            'img3'          => $img3,
            'img4'          => $img4,
            'phone'         => $phone,
            'state'         => $state,
            'city'         => $city,
            'country'       => $country,
            'user_id'       => $user_id,
            'email'         => $email,
            'adress'        => $adress,
            'number'        => $number,
            'complement'    => $complement,
            'district'      => $district,
            'postal_code'      => $postalCode,
            'description'      => $description,
            'about'      => $about,
            'url'      => urlencode($url),
            'created_at'    => date('Y-m-d H:i:s'),
           
        ])->execute();

        return true;
    }

    public static function editPartner($id, $title, $description, $text, $cover, $img1, $img2, $img3, $img4, $user_id, $destino, $estado, $pais, $saidaDe, $dataSaida, $dataRetorno, $expiraEm, $preco){
        
        Partner::update()
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