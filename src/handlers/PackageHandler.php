<?php
namespace src\handlers;

use src\models\Package;
use src\models\Partner;
use src\models\User;
use src\functions\FuncoesUteis;

class PackageHandler {

    public static function addPackageAction($title, $description, $text, $fotoNames, $user_id, $destino, $estado, $pais, $saidaDe, $dataSaida, $dataRetorno, $expiraEm, $preco, $parceiro, $installments, $fee, $active, $status, $link ){
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
            'installments'  => $installments,
            'partner_id'    => $parceiro,
            'fee'           => $fee,
            'active'           => $active,
            'status'           => $status,
            'link'           => $link,
            'created_at'    => date('Y-m-d H:i:s'),
           
        ])->execute();

        return true;
    }

    public static function editPackage($id, $title, $description, $text, $cover, $img1, $img2, $img3, $img4, $user_id, $destino, $estado, $pais, $saidaDe, $dataSaida, $dataRetorno, $expiraEm, $preco, $parceiro){
        
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
                ->set('partner_id', $parceiro)
                //->set('categorie_id', $categorie_id)
                ->set('user_id', $user_id)
                ->set('created_at', date('Y-m-d H:i:s'))
                ->where('id', $id)
                ->execute();

                return true;               
    }

    public static function getPackage()
        {
            $packageLists = Package::select()->execute();
            $package = [];
            foreach($packageLists as $packageList)
                {            
                    $newPackage = new Package();
                    $newPackage->id = $packageList['id'];
                    $newPackage->title = $packageList['title'];
                    $newPackage->description = $packageList['description'];
                    $newPackage->text = $packageList['text'];
                    $newPackage->cover = $packageList['cover'];
                    $newPackage->img1 = $packageList['img1'];
                    $newPackage->img2 = $packageList['img2'];
                    $newPackage->img3 = $packageList['img3'];
                    $newPackage->img4 = $packageList['img4'];
                    $newPackage->created_at = $packageList['created_at'];
                    $newPackage->destination = $packageList['destination'];
                    $newPackage->state = $packageList['state'];
                    $newPackage->country = $packageList['country'];
                    $newPackage->exit_from = $packageList['exit_from'];
                    $newPackage->going_on = date('d/m/Y \à\\s H:i',strtotime($packageList['going_on']));
                    $newPackage->return_in =  date('d/m/Y \à\\s H:i', strtotime($packageList['return_in'])) ;
                    $newPackage->expires_at = date('d/m/Y \à\\s H:i', strtotime($packageList['expires_at']));
                    $newPackage->price = number_format($packageList['price'],2,',','.');

                    //4 usuarios que postaram
                    $newUser = User::select()->where('id',$packageList['user_id'])->one();
                    $newPackage->user = new User();
                    $newPackage->user->id=$newUser['id'];
                    $newPackage->user->name=$newUser['name'];
                    $newPackage->user->avatar=$newUser['avatar'];
                    $newPackage->user->type_user=$newUser['type_user'];

                    //5 Parceiros
                    $newPartner = Partner::select()->where('id',$packageList['partner_id'])->one();
                    $newPackage->partner = new Partner();
                    $newPackage->partner->id=$newPartner['id'];
                    $newPackage->partner->name=$newPartner['name'];
                    $newPackage->partner->email=$newPartner['email'];

                    $newPackage->partner->phone=funcoesUteis::masc_tel($newPartner['phone']);

                    $newPackage->partner->adress=$newPartner['adress'];
                    $newPackage->partner->number=$newPartner['number'];
                    $newPackage->partner->district=$newPartner['district'];
                    $newPackage->partner->city=$newPartner['city'];
                    $newPackage->partner->complement=$newPartner['complement'];
                    $newPackage->partner->state=$newPartner['state'];
                    $newPackage->partner->country=$newPartner['country'];
                    $newPackage->partner->postal_code=$newPartner['postal_code'];
                    $newPackage->partner->cover=$newPartner['cover'];
                    $newPackage->partner->img1=$newPartner['img1'];
                    $newPackage->partner->img2=$newPartner['img2'];
                    $newPackage->partner->img3=$newPartner['img3'];
                    $newPackage->partner->img4=$newPartner['img4'];
                    $newPackage->partner->url=$newPartner['url'];
                    $newPackage->partner->active=$newPartner['active'];

                    $package[] = $newPackage;
                }
        return $package;
        }

}