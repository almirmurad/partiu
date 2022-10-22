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
                        <form method="post" enctype="multipart/form-data" action="<?=$base?>/newBannerPosition" class="addUser">
                            <fieldset>
                                <legend>
                                    <h4>Formulário de inserção de posições de banners</h4>
                                </legend>
                                <div class="campo">
                                    <label for="title">Título:</label>
                                    <input type="text" id="title" name="title" class="input" placeholder="Digite o título da postagem">
                                </div>
                                <div class="campo">
                                    <label for="description">Descrição:</label>
                                    <input type="text" id="description" name="description" class="input" placeholder="Digite a descrição da postagem">
                                </div>
                                <div class="campo">
                                    <label for="position">Posição:</label>
                                    <input type="number" id="position" name="position" class="input" placeholder="Digite a posição do banner">
                                </div>
                                <div class="campo">
                                    <label for="page">Página:</label>
                                    <select name="page" id="page">
                                        <option value="1" >Inicial</option>
                                        <option value="2" >Internas</option>
                                    </select>
                                </div>
                                <div class="campo">
                                    <label for="price_click">Preço por click:</label>
                                    <input type="text" id="price_click" name="price_click" class="input" placeholder="Digite o título da postagem">
                                </div>
                                <div class="campo">
                                    <label for="price_views">Preço por visualização:</label>
                                    <input type="text" id="price_views" name="price_views" class="input" placeholder="Digite o título da postagem">
                                </div>
                                <div class="campo">
                                    <label for="price_days">Preço por dias:</label>
                                    <input type="text" id="price_days" name="price_days" class="input" placeholder="Digite o título da postagem">
                                </div>
                                <div class="campo">
                                    <label for="width">Largura:</label>
                                    <input type="text" id="width" name="width" class="input" placeholder="Digite o título da postagem">
                                </div>
                                <div class="campo">
                                    <label for="height">Altura:</label>
                                    <input type="text" id="height" name="height" class="input" placeholder="Digite o título da postagem">
                                </div>
                                <div class="campo">
                                    <label for="created_at">Criado em:</label>
                                    <input type="DateTime-Local" id="created_at" name="created_at" class="input" placeholder="Digite o título da postagem">
                                </div>
                                <div class="campo">
                                    <label for="expires_at">Expira em:</label>
                                    <input type="DateTime-Local" id="expires_at" name="expires_at" class="input" placeholder="Digite o título da postagem">
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