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
                        <form method="post" enctype="multipart/form-data" action="<?=$base?>/newPartner" class="addUser">
                            <fieldset>
                                <legend>
                                    <h4>Formulário de inserção de Pacotes de Viagem</h4>
                                </legend>
                                <div class="campo">
                                    <label for="name">*Nome/Razão Social:</label>
                                    <input type="text" id="name" name="name" class="input" placeholder="Digite o nome/razão social do parceiro">
                                </div>
                                <div class="campo">
                                    <label for="cpf">*CPF:</label>
                                    <input type="text" id="cpf" name="cpf" class="input" placeholder="Digite CPF do parceiro">
                                </div>
                                <div class="campo">
                                    <label for="cnpj">CNPJ:</label>
                                    <input type="text" id="cnpj" name="cnpj" class="input" placeholder="Digite CNPJ do parceiro">
                                </div>
                                <div class="campo">
                                    <label for="email">E-mail:</label>
                                    <input type="text" id="email" name="email" class="input" placeholder="Digite email do parceiro">
                                </div>
                                <div class="campo">
                                    <label for="phone">Telefone:</label>
                                    <input type="text" id="phone" name="phone" class="input" placeholder="Digite telefone do parceiro">
                                </div>
                                <div class="campo">
                                    <label for="adress">Endereço:</label>
                                    <input type="text" id="adress" name="adress" class="input" placeholder="Digite endereço do parceiro">
                                </div>
                                <div class="campo">
                                    <label for="number">Número:</label>
                                    <input type="text" id="number" name="number" class="input" placeholder="Digite número do endereço do parceiro">
                                </div>
                                <div class="campo">
                                    <label for="complement">Complemento:</label>
                                    <input type="text" id="complement" name="complement" class="input" placeholder="Digite o complemento do endereço do parceiro">
                                </div>
                                <div class="campo">
                                    <label for="district">Bairro:</label>
                                    <input type="text" id="district" name="district" class="input" placeholder="Digite bairro do endereço do parceiro">
                                </div>
                                <div class="campo">
                                    <label for="city">Cidade:</label>
                                    <input type="text" id="city" name="city" class="input" placeholder="Digite o estado do endereço do parceiro">
                                </div>
                                <div class="campo">
                                    <label for="state">Estado:</label>
                                    <input type="text" id="state" name="state" class="input" placeholder="Digite o estado do endereço do parceiro">
                                </div>
                                <div class="campo">
                                    <label for="country">País:</label>
                                    <input type="text" id="country" name="country" class="input" placeholder="Digite o país do endereço do parceiro">
                                </div>
                                <div class="campo">
                                    <label for="postal_code">CEP:</label>
                                    <input type="text" id="postal_code" name="postal_code" class="input" placeholder="Digite o CEP endereço do parceiro">
                                </div>
                                <div class="campo">
                                    <label for="description">Descrição:</label>
                                    <input type="text" id="description" name="description" class="input" placeholder="Digite a descrição da página do parceiro">
                                </div>
                                <div class="campo">
                                    <label for="about">Sobre:</label>
                                    <textarea name="about" id="about" cols="30" rows="10">
Digite aqui o texto sobre a empresa do parceiro.
                                    </textarea>
                                </div>
                                <div class="campo">
                                    <label for="cover">Capa:</label>
                                    <input type="file" id="cover" name="cover" class="input" placeholder="Escolha a foto de capa da página do parceiro">
                                </div>
                                <div class="campo">
                                    <label for="img1">Foto 1:</label>
                                    <input type="file" id="img1" name="img1" class="input" placeholder="Escolha a foto 1">
                                </div>
                                <div class="campo">
                                    <label for="img2">Foto 2:</label>
                                    <input type="file" id="img2" name="img2" class="input" placeholder="Escolha a foto 2">
                                </div>
                                <div class="campo">
                                    <label for="img3">Foto 3:</label>
                                    <input type="file" id="img3" name="img3" class="input" placeholder="Escolha a foto 3">
                                </div>
                                <div class="campo">
                                    <label for="img4">Foto 4:</label>
                                    <input type="file" id="img4" name="img4" class="input" placeholder="Escolha a foto 4">
                                </div>
                                <div class="campo">
                                    <label for="url">Site:</label>
                                    <input type="url" id="url" name="url" class="input" placeholder="Digite o url do site do parceiro">
                                </div>
                                <div class="campo">
                                    <label for="whats">WhatsApp:</label>
                                    <input type="text" id="whats" name="whats" class="input" placeholder="Digite numero do Whatsapp parceiro">
                                </div>
                                <div class="campo">
                                    <label for="face">Facebook:</label>
                                    <input type="url" id="face" name="face" class="input" placeholder="Digite o url do Facebook do parceiro">
                                </div>
                                <div class="campo">
                                    <label for="insta">Instagram:</label>
                                    <input type="url" id="insta" name="insta" class="input" placeholder="Digite o url do Instagram do parceiro">
                                </div>

                                <?php 
                         
                                    if($loggedUser->type == "Parceiro"):?>

                                        <div class="campo">
                                            <label for="partner_type_id">Tipos de Parcerias:</label>
                                            <input type="text" name="partner_type_id" id="partner_type_id" value=" <?=$loggedUser->partnerstype;?>">
                                        </div>
                                    
                                    <?php else:?>
                                        
                                        <div class="campo">
                                        <label for="partner_type_id">Tipos de Parcerias:</label>
                                        <select name="partner_type_id" id="partner_type_id">
                                            <option value="0" selected >Escolha um tipos de Parceria</option>
                                            <?php foreach ($partners as $partnerTypeItem):?>
                                                <option value="<?=$partnerTypeItem->id;?>" ><?=$partnerTypeItem->title;?></option>
                                            <?php endforeach?>
                                        </select>
                                    </div>
                                <?php endif?>
                                <!--<div class="campo">
                                <label for="subCatAsc">Categoria pertencente:</label>
                                    <select name="subCatAsc" id="subCatAsc">
                                        <?php foreach ($subCats as $subCat):?>
                                        <option value="<?=$subCat['id'];?>" ><?=$subCat['name'];?></option>
                                        <?php endforeach?>
                                    </select>
                                </div>-->
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