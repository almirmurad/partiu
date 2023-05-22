<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=$base?>/assets/css/login.css">
    <title>Login</title>
</head>
<body>
    <header>
        <div class="area-logo">
            <div class="logo">
                <img src="" alt="" class="logotipo">
                <h1>Partiu - Viagens e Turismo</h1>
            </div>
    </header>
            <section class="content-login">
                <div class="area-form">
                    
                        
                            <?php if(!empty($flash)): ?>
                                <div class="error-notice">
                                <span class="notice"><?=$flash;?></span>
                                </div>
                            <?php endif; ?>
                        
                    
                    <form action="<?=$base?>/login" method="POST" class="login-user">

                    <fieldset>
                        <legend>Login</legend>
                            <div class="campos">
                                <div class="campo-login">
                                    <label for="mail">E-mail:</label>
                                    <input type="email" name="mail" id="mail" class="inpt">
                                </div>
                                <div class="campo-login">
                                    <label for="pass">Senha:</label>
                                    <input type="password" name="pass" id="pass" class="inpt">
                                </div>
                                <div class="campo-login ">
                                    <div class="area-btn-login">
                                        <input type="submit" value="Login" class="btn-login">
                                    </div>
                                </div>
                            </div>
                    </fieldset>

                    </form>
                    <div class="register">
                        <?php if(!empty($id)&&!empty($pid)):?>
                            <span class="reg">Ainda não tem cadastro?<a href="<?=$base?>/registration/<?=$id?>/partnerid/<?=$pid?>/parceria" class="register-link">Cadastre-se aqui</a></span>
                        <?php else:?>
                            <span class="reg">Ainda não tem cadastro?<a href="<?=$base?>/parcerias" class="register-link">Cadastre-se aqui</a></span>
                        <?php endif?>

                    </div>
                </div>
            </section>
            <footer>
            <div class="area-logo-footer-right">
                    <div class="logo-footer">
                        <img src="" alt="" class="logotipo-footer">
                        <span>Partiu! Viagens e Turismo <a href="<?=$base?>/" target="">Site</a></span>
                    </div>
                </div>
                <div class="copy">
                    <h4>Partiu &copy; Todos os direitos reservados </h4>
                </div>
                <div class="area-logo-footer-left">
                    <div class="logo-footer">
                        <img src="" alt="" class="logotipo-footer">
                        <span>Desenvolvido por: <a href="https://www.webmurad.com.br" target="_blank">WebMurad</a></span>
                    </div>
                </div>
            </footer>
        </div>
</body>
</html>