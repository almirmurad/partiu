<?php $render('head');?>
    <?php $render('header', ['loggedUser'=>$loggedUser]);?>
    <main>
        <aside>
            <h4>Navegação</h4>
            <?php $render('nav');?>
        </aside>
        <section>
            <div class="container column">
                <?php $render('breadcrumbs',['page'=>$page]);?>
                <div class="content column">
                    <h2><?=$page;?></h2>
                    <div class="dash-boxes ">
                        <!-- Form addUser -->
                        <form method="post" enctype="multipart/form-data" action="<?=$base?>/newPartnerType" class="addUser">
                            <fieldset>
                                <legend>
                                    <h4>Formulário de inserção de tipos de parcerias</h4>
                                </legend>
                                <div class="campo">
                                    <label for="title">Título do tipo de parceria:</label>
                                    <input type="text" id="title" name="title" class="input" placeholder="Digite o titulo da parceria">
                                </div>
                                
                                <div class="campo">
                                    <label for="description">Descrição:</label>
                                    <input type="text" id="description" name="description" class="input" placeholder="Digite a descrição da página do parceiro">
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