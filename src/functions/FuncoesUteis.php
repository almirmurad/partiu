<?php
namespace src\functions;

class FuncoesUteis{

    public static function editImg($array, $w, $h, $folder){

        $arrayPictures = [];
        if (!is_array($array)) {
            return "ERRO: Parametro recebido não é um array";
        }
        /*echo"<pre>";
        print_r($array);
        exit;*/
        foreach($array as $foto){

            list($widthOrig, $heightOrig) = getimagesize($foto['tmp_name']);
            $ratio = $widthOrig / $heightOrig;

            $newWidth = $w;
            $newHeight = $newWidth / $ratio;

            if($newHeight < $h){
                $newHeight = $h;
                $newWidth = $newHeight * $ratio;
            }

            $x = $w - $newWidth;
            $y = $h - $newHeight;
            $x = $x < 0 ? $x / 2 : $x;
            $y = $y < 0 ? $y / 2 : $y;

            $finalImage = imagecreatetruecolor($w, $h);        

            switch($foto['type']){
                case 'image/jpg':
                case 'image/jpeg':
                    $image = imagecreatefromjpeg($foto['tmp_name']);
                    break;
                case 'image/png':
                    $image = imagecreatefrompng($foto['tmp_name']);
                    break;    
            }

            imagecopyresampled(
                $finalImage, $image,
                $x, $y, 0, 0,
                $newWidth, $newHeight, $widthOrig, $heightOrig
            );

            $fileName = md5(time().rand(0,9999)).'.jpg';

            imagejpeg($finalImage, $folder.'/'.$fileName);
            $arrayPictures[]=$fileName ;
            
        }

        return $arrayPictures;

    }
}