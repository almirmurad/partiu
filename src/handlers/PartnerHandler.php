<?php
namespace src\handlers;

use src\models\Partner;

class PartnerHandler {

    public static function addPartnerAction($fotoNames, $name, $cpf, $cnpj, $user_id, $phone, $email, $adress, $number, $complement, $district, $city, $state, $country, $postalCode, $description, $about, $url, $whats, $face, $insta){
        
        list($cover, $img1, $img2, $img3, $img4) = $fotoNames;
       
        Partner::insert([
            'name'          => $name,
            'cpf'           => $cpf,
            'cnpj'          => $cnpj,
            'cover'         => $cover,
            'img1'          => $img1,
            'img2'          => $img2,
            'img3'          => $img3,
            'img4'          => $img4,
            'phone'         => $phone,
            'state'         => $state,
            'city'          => $city,
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
            'whats'         => $whats,
            'face'      => urlencode($face),
            'insta'      => urlencode($insta),
            'created_at'    => date('Y-m-d H:i:s'),
           
        ])->execute();

        return true;
    }

    public static function editPartner($fotoNames, $name, $cpf, $user_id, $phone, $email, $adress, $number, $complement, $district, $city, $state, $country, $postalCode, $description, $about, $url, $whats, $face, $insta, $id){
        
        
        list($cover, $img1, $img2, $img3, $img4) = $fotoNames;

        Partner::update()
                ->set('name', $name)
                ->set('cpf', $cpf)
                ->set('user_id', $user_id)
                ->set('phone', $phone)
                ->set('email', $email)
                ->set('adress', $adress)
                ->set('number', $number)
                ->set('complement', $complement)
                ->set('district', $district)
                ->set('city', $city)
                ->set('state', $state)
                ->set('country', $country)
                ->set('cover', $cover)
                ->set('img1', $img1)
                ->set('img2', $img2)
                ->set('img3', $img3)
                ->set('img4', $img4)
                ->set('postal_code', $postalCode)
                ->set('description', $description)
                ->set('about', $about)
                ->set('url', $url)
                ->set('whats', $whats)
                ->set('face', $face)
                ->set('insta', $insta)
                //->set('categorie_id', $categorie_id)
                ->set('user_id', $user_id)
                ->set('created_at', date('Y-m-d H:i:s'))
                ->where('id', $id)
                ->execute();

                return true;               
    }

}