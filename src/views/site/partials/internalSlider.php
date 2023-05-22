<?php

switch($page){
    case "Notícias":
        $page = ucwords($page);
    echo'<div class="internal-slider internal-slider-noticia">
            <h1>'.$page.'</h1> 
        </div>';
    break;    

    case "Ler Notícia":
        $page = ucwords($page);
        echo'<div class="internal-slider internal-slider-noticia">
                <h1>'.$page.'</h1> 
            </div>';
        break;

    case "Eventos":
        $page = ucwords($page);
        echo'<div class="internal-slider internal-slider-eventos">
                <h1>'.$page.'</h1> 
            </div>';
        break;

    case "Quem Somos":
        $page = ucwords($page);
        echo'<div class="internal-slider internal-slider-about">
                <h1>'.$page.'</h1> 
            </div>';
        break; 
        
    case "Blog":
        $page = ucwords($page);
        echo'<div class="internal-slider internal-slider-blog">
                <h1>'.$page.'</h1> 
            </div>';
        break;

        case "Ler Postagem":
            $page = ucwords($page);
            echo'<div class="internal-slider internal-slider-blog">
                    <h1>'.$page.'</h1> 
                </div>';
            break;
        
    case "Roteiros":
        $page = ucwords($page);
        echo'<div class="internal-slider internal-slider-round-map">
                <h1>'.$page.'</h1> 
            </div>';
        break; 

    case "Ler Roteiros":
        $page = ucwords($page);
        echo'<div class="internal-slider internal-slider-noticia">
                <h1>'.$page.'</h1> 
            </div>';
        break;
    case "Pacotes":
        $page = ucwords($page);
        echo'<div class="internal-slider internal-slider-noticia">
                <h1>'.$page.'</h1> 
            </div>';
        break;
    case "Anúncios":
        $page = ucwords($page);
        echo'<div class="internal-slider internal-slider-parceria">
                <h1>'.$page.'</h1> 
            </div>';
        break;
        case "Pacotes e Anúncios":
            $page = ucwords($page);
            echo'<div class="internal-slider internal-slider-parceria">
                    <h1>'.$page.'</h1> 
                </div>';
            break;
    case "Pacote de Viagem":
        $page = ucwords($page);
        echo'<div class="internal-slider internal-slider-noticia">
                <h1>'.$page.'</h1> 
            </div>';
        break;
    case "Parcerias":
        $page = ucwords($page);
        echo'<div class="internal-slider internal-slider-parceria">
                <h1>'.$page.'</h1> 
            </div>';
        break;
    case "Pacotes":
        $page = ucwords($page);
        echo'<div class="internal-slider internal-slider-parceria">
                <h1>'.$page.'</h1> 
            </div>';
        break;
    case "simple":
        $page = ucwords($page);
        echo'<div class="internal-slider internal-slider-parceria">
                <h1>'.$page.'</h1> 
            </div>';
        break;
    case "plus":
        $page = ucwords($page);
        echo'<div class="internal-slider internal-slider-parceria">
                <h1>'.$page.'</h1> 
            </div>';
        break;
    case "premium":
        $page = ucwords($page);
        echo'<div class="internal-slider internal-slider-parceria">
                <h1>'.$page.'</h1> 
            </div>';
        break;
}
?>

