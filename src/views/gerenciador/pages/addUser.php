<?php $render('head');?>

    <?php $render('header', ['loggedUser'=>$loggedUser]);?>
    <main>
        <aside>
            <h4>Navegação</h4>
            <?php $render('nav', ['loggedUser'=>$loggedUser]);?>
        </aside>
        <section>
            <div class="container column">
                <?php $render('breadcrumbs',['page'=>$page]);?>
                <div class="content column">
                    <h2><?=$page;?></h2>
                    <div class="dash-boxes ">
                        <!-- Form addUser -->
                        <form method="post" enctype="multipart/form-data" action="<?=$base?>/newUser" class="addUser">
                            <fieldset>
                                <legend>
                                    <h4>Formulário de inserção de usuários</h4>
                                </legend>
                                <div class="campo">
                                    <label for="name">Nome:</label>
                                    <input type="text" id="name" name="name" class="input" placeholder="Digite seu nome">
                                </div>
                                <div class="campo">
                                    <label for="mail">E-Mail:</label>
                                    <input type="email" id="mail" name="mail" class="input" placeholder="Digite seu e-mail">
                                </div>
                                <div class="campo">
                                    <label for="pass">Senha:</label>
                                    <input type="password" id="pass" name="pass" class="input" placeholder="Digite sua senha">
                                </div>
                                <div class="campo">
                                    <label for="phone">Telefone:</label>
                                    <input type="tel" id="phone" name="phone" class="input" placeholder="Digite seu telefone">
                                </div>
                                
                                <div class="campo">
                                    <label for="type">Tipo:</label>
                                    <select name="type" id="type" class="input">
                                        <option value="1">Administrador</option>
                                        <option value="2">Redator</option>
                                        <option value="3">Parceiro</option>
                                        <!-- <option value="4">Parceiro-Anúncios</option>
                                        <option value="5">Parceiro-Banners e Anúncios</option> -->
                                    </select>
                                </div>
                                <div class="campo">
                                    <label class="foto" for="avatar">Avatar:</label>
                                    <input type="file" id="avatar" name="avatar" class="input" placeholder="Escolha uma foto">
                                </div>
                                <div class="campo">
                                    <input type="submit" class="btn" value="Cadastrar">
                                </div>
                                
                            </fieldset>
                        </form>
                        <!-- fim do Form addUser -->
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php $render('footer');?>