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

    echo <<<EOT
            <div class="categoria-blog">
            
            <ul class="categoria-blog-area">
                <li class="categoria-blog-item"><a href="" class="categoria-blog-link">Categoria 1</a></li>
                <li class="categoria-blog-item"><a href="" class="categoria-blog-link">Categoria 1</a></li>
                <li class="categoria-blog-item"><a href="" class="categoria-blog-link">Categoria 1</a></li>
                <li class="categoria-blog-item"><a href="" class="categoria-blog-link">Categoria 1</a></li>
                <li class="categoria-blog-item"><a href="" class="categoria-blog-link">Categoria 1</a></li>
                <li class="categoria-blog-item"><a href="" class="categoria-blog-link">Categoria 1</a></li>
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