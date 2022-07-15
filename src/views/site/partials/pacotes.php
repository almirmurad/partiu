    <div class="pacotes">
        <?php 
        if(isset($packages['packages']))//lista pacotes na página de pacotes
        {
            foreach ($packages['packages'] as $package){
                echo'
                <a href="package/'.$package->id.'/readPackage">
                    <div class="pacotesItem">
                        <div class="pctImg" style="background:url('.$base.'/media/uploads/imgs/packages/'.$package->cover.'); background-position:center; background-size:cover;">
                        </div>
                        <div class="pctCont">
                            <h2>'.$package->title.'</h2>
                            <h3>'.$package->destination.' - '.$package->state.'</h3>
                            <h3>'.$package->country.'</h3>
                            <p>
                                '.$package->description.'
                            </p>
                        </div>
                        <div class="pctPreco">
                            <div class="linkWhatsIcon">
                                <a href="https://wa.me/55'.$package->partner->whats.'?text=Contato%20através%20do%20site%20partiu" target="_blank" class="wats-link-package"><i class="fab fa-whatsapp fa-1x"></i></a>
                            </div>';
                            if($package->installments <= 1){
                                echo'
                            <div class="preco">
                                <div class="aVista"><strong>Somente à vista</strong><h2>'.$package->price.'</h2></div>
                                
                            </div>';

                            }else{
                                echo'
                            <div class="preco">
                                <div class="aVista"><strong>À vista ('.$package->fee.'% OFF)</strong> <h4>'.$package->price.'</h4></div>
                                <div class="parcelado"><strong>ou em '.$package->installments.'X de '.$package->vlrInstallments.'</strong></div>
                            </div>';
                            }
                            echo'
                        </div>
                    </div>
                </a>';
                }
                 $render('paginacao',[
                    'total'=>$packages['pageCount'],
                    'current'=>$packages['currentPage'],
                    'link'=>'pacotes'
                    ]);
                     
            } elseif($packages)//pacotes no index
            {
                foreach ($packages as $package){
                echo'
                <a href="package/'.$package->id.'/readPackage">
                    <div class="pacotesItem">
                        <div class="pctImg" style="background:url('.$base.'/media/uploads/imgs/packages/'.$package->cover.'); background-position:center; background-size:cover;">
                        </div>
                        <div class="pctCont">
                            <h2>'.$package->title.'</h2>
                            <h3>'.$package->destination.' - '.$package->state.'</h3>
                            <h3>'.$package->country.'</h3>
                            <p>
                                '.$package->description.'
                            </p>
                        </div>
                        <div class="pctPreco">
                            <div class="linkWhatsIcon">
                                <a href="https://wa.me/55'.$package->partner->whats.'?text=Contato%20através%20do%20site%20partiu" target="_blank" class="wats-link-package"><i class="fab fa-whatsapp fa-1x"></i></a>
                            </div>';
                            if($package->installments <= 1){
                                echo'
                            <div class="preco">
                                <div class="aVista"><strong>Somente à vista</strong><h2>'.$package->price.'</h2></div>
                                
                            </div>';

                            }else{
                                echo'
                            <div class="preco">
                                <div class="aVista"><strong>À vista ('.$package->fee.'% OFF)</strong> <h4>'.$package->price.'</h4></div>
                                <div class="parcelado"><strong>ou em '.$package->installments.'X de '.$package->vlrInstallments.'</strong></div>
                            </div>';
                            }
                            echo'
                        </div>
                    </div>
                </a>';
                }
            }              
        ?>
    </div>
    
