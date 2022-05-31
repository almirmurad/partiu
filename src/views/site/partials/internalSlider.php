<?php

switch($page){
    case "Notícias":
    echo'<div class="internal-slider internal-slider-noticia">
            <h1>'.$page.'</h1> 
        </div>';
    break;    

    case "Ler Notícia":
        echo'<div class="internal-slider internal-slider-noticia">
                <h1>'.$page.'</h1> 
            </div>';
        break;

    case "Eventos":
        echo'<div class="internal-slider internal-slider-eventos">
                <h1>'.$page.'</h1> 
            </div>';
        break;

    case "Quem Somos":
        echo'<div class="internal-slider internal-slider-about">
                <h1>'.$page.'</h1> 
            </div>';
        break; 
        
    case "Blog":
        echo'<div class="internal-slider internal-slider-blog">
                <h1>'.$page.'</h1> 
            </div>';
        break;

        case "Ler Postagem":
            echo'<div class="internal-slider internal-slider-blog">
                    <h1>'.$page.'</h1> 
                </div>';
            break;
        
    case "Roteiros":
        echo'<div class="internal-slider internal-slider-round-map">
                <h1>'.$page.'</h1> 
            </div>';
        break; 

    case "Ler Roteiros":
        echo'<div class="internal-slider internal-slider-noticia">
                <h1>'.$page.'</h1> 
            </div>';
        break;
    case "Pacotes":
        echo'<div class="internal-slider internal-slider-noticia">
                <h1>'.$page.'</h1> 
            </div>';
        break;
    case "Pacote de Viagem":
        echo'<div class="internal-slider internal-slider-noticia">
                <h1>'.$page.'</h1> 
            </div>';
        break;
    case "Parceiros":
        echo'<div class="internal-slider internal-slider-noticia">
                <h1>'.$page.'</h1> 
            </div>';
        break;
}
?>

