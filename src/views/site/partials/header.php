<div class="header">
    <div class="container ">
        <div class="areaLogo">
            <h1> Partiu!</h1>
            <span>Viagens e Turismo</span>
        </div>
        <div class="socialSearch">
            <div class="social">
                <!-- <span class="fone">(41) 98902-1385 | contato@partiuviagenseturismo.com.br</span> -->
                
                
                <div class="search">
                    <form method="" action="">
                        <input type="text" name="search" placeholder="Procurar">
                        <button><i class="fas fa-search fa-2x"></i></button>
                    </form>
                </div>
                <div class="signins">
                    <a class="header-btn" href="<?=$base;?>/parcerias">Anuncie seu Pacote</a>
                    <a class="header-btn"  href="<?=$base;?>/parcerias">Cadastre-se</a>
                    <?php if(empty($loggedUser)):?>
                        <a class="header-btn" href="<?=$base;?>/login">Login</a>
                    <?php else:?>
                        <a class="header-btn" href="<?=$base;?>/logout">Sair</a>
                    <?php endif?>
                </div>
            </div>
            <div class="area-api">
                <div class="ct-anuncie">
                    <div class="bt-anuncie-aqui">
                        <a href="<?=$base;?>/parcerias"><i class="fas fa-bullhorn"></i></a>
                    </div>
                    <div class="txt-anuncie-aqui">
                        <span>Anuncie sua empresa</span>
                    </div>
                </div>
                <div class="moeda">
                    <div class="mo-area-geral">
                        
                        <div class="mo-area-info">
                            <span class="mo-title" id="usd">--</span>
                            <span class="mo-valor" id="usdVlr">--</span>
                        </div>
                    </div>
                    <div class="mo-area-geral">
                       
                        <div class="mo-area-info">
                            <span class="mo-title" id="bit">--</span>
                            <span class="mo-valor"id="bitVlr">--</span>
                        </div>
                    </div>
                    <div class="mo-area-geral">
                        
                        <div class="mo-area-info">
                            <span class="mo-title" id="eur">--</span>
                            <span class="mo-valor" id="eurVlr">--</span>
                        </div>
                    </div>
                </div>

                <div class="clima">
                    <div class="cli-area-img">
                        <img src="--" alt="imagem clima" class="cli-icon">
                        <span class="clima-current">--</span>
                    </div>
                    <div class="cli-area-info">
                        <span class="city">--</span>
                        <span class="current">-- </span>
                        <!--<span class="max">Max.: 8°C </span>
                        <span class="min">Min.:  3°C</span>-->
                    </div>
                </div>

            </div>
            
        </div>
    </div>
</div>