    <div class="pacotes">
        <?php
        if(isset($packages['packages']))
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
                            <div class="link"">
                                <a href="https://wa.me/55'.$package->partner->phone.'?text=Contato%20através%20do%20site%20partiu" target="_blank" class="wats-link-package"><i class="fab fa-whatsapp fa-1x"></i></a>
                            </div>
                            <div class="preco">
                                <h2>'.$package->price.'</h2>
                            </div>
                        </div>
                    </div>
                </a>';
                }
                 $render('paginacao',[
                    'total'=>$packages['pageCount'],
                    'current'=>$packages['currentPage'],
                    'link'=>'pacotes'
                    ]);
                     
            } elseif($packages)
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
                            <div class="link"">
                                <a href="https://wa.me/55'.$package->partner->phone.'?text=Contato%20através%20do%20site%20partiu" target="_blank" class="wats-link-package"><i class="fab fa-whatsapp fa-1x"></i></a>
                            </div>
                            <div class="preco">
                                <h2>'.$package->price.'</h2>
                            </div>
                        </div>
                    </div>
                </a>';
                }
            }              
        ?>
    </div>
    
