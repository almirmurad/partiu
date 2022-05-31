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


    public static function masc_tel($TEL) {
        $tam = strlen(preg_replace("/[^0-9]/", "", $TEL));
          if ($tam == 13) { // COM CÓDIGO DE ÁREA NACIONAL E DO PAIS e 9 dígitos
          return "+".substr($TEL,0,$tam-11)."(".substr($TEL,$tam-11,2).")".substr($TEL,$tam-9,5)."-".substr($TEL,-4);
          }
          if ($tam == 12) { // COM CÓDIGO DE ÁREA NACIONAL E DO PAIS
          return "+".substr($TEL,0,$tam-10)."(".substr($TEL,$tam-10,2).")".substr($TEL,$tam-8,4)."-".substr($TEL,-4);
          }
          if ($tam == 11) { // COM CÓDIGO DE ÁREA NACIONAL e 9 dígitos
          return "(".substr($TEL,0,2).")".substr($TEL,2,5)."-".substr($TEL,7,11);
          }
          if ($tam == 10) { // COM CÓDIGO DE ÁREA NACIONAL
          return "(".substr($TEL,0,2).")".substr($TEL,2,4)."-".substr($TEL,6,10);
          }
          if ($tam <= 9) { // SEM CÓDIGO DE ÁREA
          return substr($TEL,0,$tam-4)."-".substr($TEL,-4);
          }
      }

}