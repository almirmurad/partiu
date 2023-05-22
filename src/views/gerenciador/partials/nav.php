<?php if($loggedUser->type === 'Parceiro'):?>
    <?php switch ($loggedUser->partnerstype): ?><?php case 1: ?>
        <nav> 
            <ul>
            <li><a href="<?=$base?>/gerenciador">Dashboard</a></li>
            <li><a href="<?=$base?>/package">Pacotes</a></li>
            <li><a href="<?=$base?>/partner">Agências</a></li>
            <li><a href="<?=$base?>/logout">Sair</a></li>
            </ul>
        </nav>
    <?php break;?>
    <?php case 2: ?>
        <nav> 
            <ul>
                <li><a href="<?=$base?>/gerenciador">Dashboard</a></li>
                <li><a href="<?=$base?>/partner">Agências</a></li>
                <li><a href="<?=$base?>/banner">Banners</a></li>
                <li><a href="<?=$base?>/logout">Sair</a></li>
            </ul>
        </nav>
    <?php break;?>
    <?php case 3: ?>
        <nav> 
            <ul>
                <li><a href="<?=$base?>/gerenciador">Dashboard</a></li>
                <li><a href="<?=$base?>/package">Pacotes</a></li>
                <li><a href="<?=$base?>/partner">Agências</a></li>
                <li><a href="<?=$base?>/banner">Banners</a></li>
                <li><a href="<?=$base?>/logout">Sair</a></li>
            </ul>
        </nav>
    <?php endswitch ?>
<?php elseif($loggedUser->type == "Redator"):?>
    <nav> 
        <ul>
            <li><a href="<?=$base?>/gerenciador">Dashboard</a></li>
            <li><a href="<?=$base?>/news">Notícias</a></li>
            <li><a href="<?=$base?>/post">Blog</a></li>
            <li><a href="<?=$base?>/roadMap">Roteiros</a></li>
            <li><a href="<?=$base?>/event">Eventos</a></li>
            <li><a href="<?=$base?>/logout">Sair</a></li>
        </ul>
    </nav>
<?php else:?>
    <nav> 
        <ul>
            <li><a href="<?=$base?>/gerenciador">Dashboard</a></li>
            <li><a href="<?=$base?>/package">Pacotes</a></li>
            <li><a href="<?=$base?>/news">Notícias</a></li>
            <li><a href="<?=$base?>/post">Blog</a></li>
            <li><a href="<?=$base?>/roadMap">Roteiros</a></li>
            <li><a href="<?=$base?>/event">Eventos</a></li>
            <li><a href="<?=$base?>/users">Usuários</a></li>
            <li><a href="<?=$base?>/partner">Agências</a></li>
            <li><a href="<?=$base?>/partnersType">Tipos de parceria</a></li>
            <li><a href="<?=$base?>/newsletter">Newsletter</a></li>
            <li><a href="<?=$base?>/bannerPosition">Posição dos Banners</a></li>
            <li><a href="<?=$base?>/banner">Banners</a></li>
            <li><a href="<?=$base?>/categories">Categorias</a></li>
            <li><a href="<?=$base?>/logout">Sair</a></li>
        </ul>
    </nav>
<?php endif;?>