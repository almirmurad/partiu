<?php 
//se a página for vazio e diferente de blog
if ($page != 'Blog' and $page != 'Ler Postagem' ){
    echo <<<EOT
        <div class="planner">
            <h4>Planejamento</h4>
            <ul class="planner-area">
                <li class="planner-item"><a href="" class="planner-link">Seguro Viagem</a></li>
                <li class="planner-item"><a href="" class="planner-link">Aluguel de Veículo</a></li>
                <li class="planner-item"><a href="" class="planner-link">Encontre um Hotel</a></li>
                <li class="planner-item"><a href="" class="planner-link">Pacotes</a></li>
                <li class="planner-item"><a href="" class="planner-link">Ingressos</a></li>
            </ul>            
        </div>
        <div class="hurb">
            <ins id="afiliateHu" data-ad-client="560868" data-ad-width="300" data-ad-height="250" data-ad-link="_blank" data-ad-cor="3">  </ins>
            
        </div>
        <div class="publicity">
            <h4>Anúncios</h4>
            
EOT;
if (!empty($banners)){
    // echo"<pre>";
    // print_r($banners);
    // exit;
    foreach ($banners as $banner){
        if ($banner->position_id === 2){
            echo <<<EOT
            <div class="plublicity-item">
                <a class="link-banners" target="_blank" href="$banner->url" data-id="<?=$banner->id;?>">
                    <img src="$base/media/uploads/imgs/banners/$banner->img" alt="$banner->title">
                </a>
            </div>
            
EOT;
}else{
            echo <<<EOT
            
                <div class="plublicity-item"><img src="$base/assets/img/trip.png" alt=""></div>
                <div class="plublicity-item"><img src="$base/assets/img/trip.png" alt=""></div>
                <div class="plublicity-item"><img src="$base/assets/img/trip.png" alt=""></div>

EOT;
             }

 }
     
     }
            
echo"</div>";

}else{
    echo'<div class="categoria-blog">
    <ul class="categoria-blog-area">';
foreach($categories as $categoria){
    echo <<<EOT
            <li class="categoria-blog-item">
                    <a href="#" class="categoria-blog-link">$categoria->name</a>
                    <span class="count-blog">$total</span>
            </li>
                <div class="area-submenu-categoria" style="display:flex;">
                    <ul class="submenu-categoria">
EOT;
                    foreach($posts as $post){
                        if($post->categorie->name == $categoria->name ){                      
                           echo<<<EOT
                           <li class="submenu-categoria-item">
                           <a href="$base/blog/$post->id/readBlog" class="submenu-blog-link">$post->title</a></li>
EOT;
                        }
                    }
                echo <<<EOT
                    </ul>
                </div>  
                         
EOT;         
}

 if (!empty($banners)){
    // echo"<pre>";
    // print_r($banners);
    // exit;
    foreach ($banners as $banner){
        if ($banner->position_id === 2){
            echo <<<EOT
            <div class="plublicity-item">
                <a class="link-banners" target="_blank" href="$banner->url" data-id="<?=$banner->id;?>">
                    <img src="$base/media/uploads/imgs/banners/$banner->img" alt="$banner->title">
                </a>
            </div>
EOT;
}else{
            echo <<<EOT
            </ul>        
            </div>
            <div class="publicity">
                <h4>Anúncios</h4>
                <div class="plublicity-item"><img src="$base/assets/img/trip.png" alt=""></div>
                <div class="plublicity-item"><img src="$base/assets/img/trip.png" alt=""></div>
                <div class="plublicity-item"><img src="$base/assets/img/trip.png" alt=""></div>
            </div>
EOT;
             }

 }
     
     } else{
        echo <<<EOT
    </ul>        
    </div>
    <div class="publicity">
        <h4>Anúncios</h4>
        <div class="plublicity-item"><img src="$base/assets/img/trip.png" alt=""></div>
        <div class="plublicity-item"><img src="$base/assets/img/trip.png" alt=""></div>
        <div class="plublicity-item"><img src="$base/assets/img/trip.png" alt=""></div>
    </div>
EOT;
     } 
      
}
?>