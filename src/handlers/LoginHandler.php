<?php
namespace src\handlers;

use src\models\User;
use src\models\Partner;
class LoginHandler {

    public static function checkLogin(){
        if(!empty($_SESSION['token'])){
            $token = $_SESSION['token'];

            $data = User::select()->where('token', $token)->one();
            if($data > 0){
                
                $loggedUser = new User();
                $loggedUser->id = $data['id'];
                $loggedUser->name = $data['name'];
                $loggedUser->mail = $data['email'];
                $loggedUser->partnerstype = $data['typespartner_id'];

                // $partner = Partner::select()->where('user_id',$data['id'])->one();

                // $loggedUser->partner = new Partner();
                // $loggedUser->partner->name=$partner['name'];
                // $loggedUser->partner->id=$partner['id'];  
                // $loggedUser->partner->user_id=$partner['user_id']; 
                
                switch($loggedUser->type = $data['type_user']){
                case 1: 
                    $loggedUser->type = "Administrador";
                    break;
                case 2:
                    $loggedUser->type = "Redator"; 
                    break;
                case 3:
                    $loggedUser->type = "Parceiro";
                    break; 
                }

                $loggedUser->avatar = $data['avatar'];
                
                return $loggedUser;

            }
        }
        return false;
    }

    public static function verifyLogin($mail, $pass){
        $user = User::select()->where ('email', $mail)->one();
        
        if($user){
            if(password_verify($pass, $user['password'])){
                $token = md5(time().rand(0,9999).time());
                User::update()
                    ->set('token',$token)
                    ->where('email', $mail)
                ->execute();
                
                return $token;
            }
        }
        return false;
    }

    public static function emailExists($mail){
        $user = User::select()->where ('email', $mail)->one();
        return $user ? true : false;
    }

    public static function addUser($name, $mail, $pass, $phone, $type, $imgNames, $typesPartnerId){

        list($avatar) = $imgNames;
        // echo "<pre>";
        // var_dump($avatar);
        // exit;
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $token = md5(time().rand(0,9999).time());
        User::insert([
            'name'      => $name,
            'email'     => $mail,
            'password'  => $hash,
            'phone'     => $phone,
            'avatar'    => $avatar,
            'type_user' => $type,
            'typespartner_id' => $typesPartnerId,
            'token'     => $token,
            'created_at'=> date('Y-m-d H:i:s')
        ])->execute();

        return $token;
            
    }

    public static function editUser($name, $mail, $pass, $phone, $type, $avatar, $id){
        $hash = password_hash($pass, PASSWORD_DEFAULT);

        User::update()
                ->set('name', $name)
                ->set('email', $mail)
                ->set('password', $hash)
                ->set('phone', $phone)
                ->set('avatar', $avatar)
                ->set('type_user', $type)
                ->set('created_at', date('Y-m-d H:i:s'))
                ->where('id', $id)
                ->execute();

                return true;
            
                
    }
}
