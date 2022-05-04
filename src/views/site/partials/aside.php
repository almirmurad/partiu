<?php 
if (empty($page) || $page != 'Blog'){
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
        <div class="publicity">
            <h4>Anúncios</h4>
            <div class="plublicity-item"><img src="assets/img/trip.png" alt=""></div>
            <div class="plublicity-item"><img src="assets/img/trip.png" alt=""></div>
            <div class="plublicity-item"><img src="assets/img/trip.png" alt=""></div>
        </div>
EOT;
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
    echo <<<EOT
    </ul>        
    </div>
    <div class="publicity">
        <h4>Anúncios</h4>
        <div class="plublicity-item"><img src="assets/img/trip.png" alt=""></div>
        <div class="plublicity-item"><img src="assets/img/trip.png" alt=""></div>
        <div class="plublicity-item"><img src="assets/img/trip.png" alt=""></div>
    </div>
EOT;
}
?>