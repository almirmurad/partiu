<div class="bradcrumbs">
    <span><i> Você está em: <a href="<?=$base?>/gerenciador">Gerenciador</a> /
    <?php 
    echo $page;
    if(isset($subCat)){
        echo $subCat;
    }   ?> </i></span>
    <div class="date"><?php date_default_timezone_set('America/Sao_Paulo'); echo date("d-m-Y H:i:s");?></div>
</div>