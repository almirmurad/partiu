<div class="news">
    
    <div class="container center">
        <div class="foot-cont">
            <div class="foot-cont-txt">
                <h2>Curtiu nosso conteúdo?</h2>
                <p>Inscreva-se e enviaremos as melhores novidades para você!</p>
            </div>
            <?php if(!empty($flash)): ?>
                <div class="error-notice">
                    <span class="notice">Mensagem: <?=$flash;?></span>
                </div>
            <?php endif; ?>
            <div class="foot-cont-content center">
                <form method="post" action="<?=$base?>/newsletter">
                    <div class="campo">
                        <!-- <label for="name">Nome:</label> -->
                        <input type="text" name="name" id="name" placeholder="Nome" />
                    </div>
                    <div class="campo">
                        <!-- <label for="mail">E-mail:</label> -->
                        <input type="email" name="mail" id="mail" placeholder="E-mail" required/>
                    </div>
                    <div class="campo">
                        <!-- <label for="phone">Telefone:</label> -->
                        <input type="text" name="phone" id="phone" placeholder="Telefone" />
                    </div>
                    <div class="checkbox">
                        <!-- <label for="phone">Telefone:</label> -->
                        <input type="checkbox" name="check" id="check" required />
                         Eu aceito que meus dados sejam enviados
                    </div>
                    <div class="campo-btn">
                        <input  class="bt" type="submit" value="Enviar">
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<div class="social-links">
    <div class="container center">
        <div class="foot-cont">
            <div class="foot-cont-txt">
                <h2>Redes socias</h2>
                <p>Inscreva-se, curta e compartlhe os melhores roteiros, eventos e pacotes de viagem da internet!</p>
            </div>
            <div class="foot-cont-content center">
                <ul>
                    <li><a href="#"><i class="fab fa-facebook fa-3x"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram fa-3x"></i></a></li>
                    <li><a href="#"><i class="fab fa-youtube fa-3x"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="sessoes">
    <div class="container center">
        <div class="foot-cont center row" >
            <div class="session">
                <div class="title">
                    <h2>Menu</h2>
                </div>
                <div class="foot-cont-content">
                    <ul>
                        <li><a href="#">Quem Somos</a></li>
                        <li><a href="#">Roteiros</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Pacotes</a></li>
                        <li><a href="#">Notícias</a></li>
                        <li><a href="#">Eventos</a></li>
                    </ul>
                </div>
            </div>
            <div class="session">
                <div class="title">
                    <h2>Ultimas</h2>
                </div>
                <div class="foot-cont-content">
                    <ul>
                        <li><a href="#">Quem Somos</a></li>
                        <li><a href="#">Roteiros</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Pacotes</a></li>
                        <li><a href="#">Notícias</a></li>
                        <li><a href="#">Eventos</a></li>
                    </ul>
                </div>
            </div>
            <div class="session">
                <div class="title">
                    <h2>Institucional</h2>
                </div>
                <div class="foot-cont-content">
                    <ul>
                        <li><a href="#">Contato</a></li>
                        <li><a href="#">Política de Privacidade</a></li>
                        <li><a href="#" class="whats">(41) 98533-2397</a></li>
                        <li><a href="#" class="mail">contato@partiuviagenseturismo.com.br</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>