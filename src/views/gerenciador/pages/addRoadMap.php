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
                        <form method="post" enctype="multipart/form-data" action="<?=$base?>/newRoadMap" class="addUser">
                            <fieldset>
                                <legend>
                                    <h4>Formulário de inserção de roteiros</h4>
                                </legend>
                                <div class="campo">
                                    <label for="title">Título:</label>
                                    <input type="text" id="title" name="title" class="input" placeholder="Digite o título da roteiro">
                                </div>
                                <div class="campo">
                                    <label for="description">Descrição:</label>
                                    <input type="text" id="description" name="description" class="input" placeholder="Digite a descrição do roteiro">
                                </div>
                                <div class="campo">
                                    <label for="text">Texto:</label>
                                    <textarea name="text" id="text" cols="30" rows="10">

                                    </textarea>
                                </div>
                                <div class="campo">
                                    <label for="cover">Capa:</label>
                                    <input type="file" id="cover" name="cover" class="input" placeholder="Escolha a foto de capa do roteiro">
                                </div>
                                <div class="campo">
                                    <label for="foto1">Foto 1:</label>
                                    <input type="file" id="foto1" name="foto1" class="input" placeholder="Escolha a foto 1">
                                </div>
                                <div class="campo">
                                    <label for="foto2">Foto 2:</label>
                                    <input type="file" id="foto2" name="foto2" class="input" placeholder="Escolha a foto 2">
                                </div>
                                <div class="campo">
                                    <label for="foto3">Foto 3:</label>
                                    <input type="file" id="foto3" name="foto3" class="input" placeholder="Escolha a foto 3">
                                </div>
                                <div class="campo">
                                    <label for="foto4">Foto 4:</label>
                                    <input type="file" id="foto4" name="foto4" class="input" placeholder="Escolha a foto 4">
                                </div>
                                <div class="campo">
                                <label for="subCatAsc">Categoria pertencente:</label>
                                    <select name="subCatAsc" id="subCatAsc">
                                        <?php foreach ($subCats as $subCat):?>
                                        <option value="<?=$subCat['id'];?>" ><?=$subCat['name'];?></option>
                                        <?php endforeach?>
                                    </select>
                                </div>
                                <div class="campo">
                                    <input type="submit" class="btn" value="Cadatrar">
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