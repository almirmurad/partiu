    <div class="pacotes">
        <?php
        if(isset($packages['packages'])){
            foreach ($packages['packages'] as $package){
               echo<<<EOT
                <a href="package/$package->id/readPackage" class="linkPacotes">
                <div class="pacotesItem">
                    <div class="pctImg" style="background:url($base/media/uploads/imgs/packages/$package->cover); background-position:center; background-size:cover;">
                    </div>
                    <div class="pctCont">
                        <h2>$package->title</h2>
                        <h3>$package->destination - $package->state</h3>
                        <h3>$package->country</h3>
                        <p>
                        $package->description
                        </p>
                    </div>
                    <div class="pctPreco">
                        <h2>$package->price</h2>
                    </div>
                </div>
                </a>       
EOT;               
                }
                 $render('paginacao',[
                    'total'=>$packages['pageCount'],
                    'current'=>$packages['currentPage'],
                    'link'=>'pacotes'
                    ]);
                     
            } elseif($packages){
                foreach ($packages as $package){
                echo<<<EOT
                <a href="package/$package->id/readPackage" class="linkPacotes">
                <div class="pacotesItem">
                    <div class="pctImg" style="background:url($base/media/uploads/imgs/packages/$package->cover); background-position:center; background-size:cover;">
                    </div>
                    <div class="pctCont">
                        <h2>$package->title</h2>
                        <h3>$package->destination - $package->state</h3>
                        <h3>$package->country</h3>
                        <p>
                            $package->description
                        </p>
                    </div>
                    <div class="pctPreco">
                        <h2>$package->price</h2>
                    </div>
                </div>
                </a>       
EOT;
                }
            }              
        ?>
    </div>
    
