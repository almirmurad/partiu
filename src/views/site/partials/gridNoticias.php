

    <?php 
    if(isset($news['news'])){
        echo"<div class=\"gridNoticias\">";
        foreach($news['news'] as $lastedNews){
        echo<<<EOT
            <div class="noticia">
                <div style="background-image:linear-gradient(to right, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.1)), url($base/media/uploads/imgs/news/$lastedNews->cover);" class="notImg">

                </div>
                <div class="notCont">
                    <h2> $lastedNews->title</h2>
                    <p> $lastedNews->description</p>
                    <a href="$base/readNews/$lastedNews->id/read">Leia Mais</a>
                </div>
                <div class="notFoot">
                    <span><strong>Data:</strong>  $lastedNews->created_at</span>
                    <span><strong>Autor:</strong>  $lastedNews->user_id</span>
                    <span><strong>Fonte:</strong>  $lastedNews->source </span>

                </div>
            </div>
EOT;
            } 
        echo"</div>";     
    $render('paginacao',[
        'total'=>$news['pageCount'],
        'current'=>$news['currentPage'],
        'link'=>'noticias'
    ]);
    }elseif(isset($news)){
        echo"<div class=\"gridNoticias\">";
        foreach($news as $lastedNews){
         
                        echo"<div class=\"noticia\">";
                            echo"<div style=\"background-image:linear-gradient(to right, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.1)), url(".$base."/media/uploads/imgs/news/".$lastedNews['cover'].");\" class=\"notImg\"></div>";

                            echo"
                            <div class=\"notCont\">
                                <h2>".$lastedNews['title']."</h2>
                                <p> ".$lastedNews['description']."</p>
                                <a href=\"$base/readNews/".$lastedNews['id']."/read\">Leia Mais</a>
                            </div>
                            <div class=\"notFoot\">
                                <span><strong>Data:</strong>".$lastedNews['created_at']."</span>
                                <span><strong>Autor:</strong>".$lastedNews['user_id']."</span>
                                <span><strong>Fonte:</strong>".$lastedNews['source']."</span>
                            </div>
                        </div>";
             }
             echo"</div>";  
    }

    ?>
<!-- 
                <div class="noticia">
                    <div class="notImg">

                    </div>
                    <div class="notCont">
                        <h2>Título Notícia</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Suscipit similique iusto officiis quod asperiores incidunt ex earum,
                            dolorum quidem...
                        </p>
                        <a href="">Leia Mais</a>
                    </div>
                    <div class="notFoot">
                        <span><strong>Data:</strong> 10/10/2021</span>
                        <span><strong>Autor:</strong> Rafaela Fernanda Murad Lucano</span>
                        <span><strong>Fonte:</strong> Uol Viagens </span>

                    </div>
                </div>
                <div class="noticia">
                    <div class="notImg">

                    </div>
                    <div class="notCont">
                        <h2>Título Notícia</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Suscipit similique iusto officiis quod asperiores incidunt ex earum,
                            dolorum quidem...
                        </p>
                        <a href="">Leia Mais</a>
                    </div>
                    <div class="notFoot">
                        <span><strong>Data:</strong> 10/10/2021</span>
                        <span><strong>Autor:</strong> Rafaela Fernanda Murad Lucano</span>
                        <span><strong>Fonte:</strong> Uol Viagens </span>

                    </div>
                </div>
                <div class="noticia">
                    <div class="notImg">

                    </div>
                    <div class="notCont">
                        <h2>Título Notícia</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Suscipit similique iusto officiis quod asperiores incidunt ex earum,
                            dolorum quidem...
                        </p>
                        <a href="">Leia Mais</a>
                    </div>
                    <div class="notFoot">
                        <span><strong>Data:</strong> 10/10/2021</span>
                        <span><strong>Autor:</strong> Rafaela Fernanda Murad Lucano</span>
                        <span><strong>Fonte:</strong> Uol Viagens </span>

                    </div>
                </div>
                <div class="noticia">
                    <div class="notImg">

                    </div>
                    <div class="notCont">
                        <h2>Título Notícia</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Suscipit similique iusto officiis quod asperiores incidunt ex earum,
                            dolorum quidem...
                        </p>
                        <a href="">Leia Mais</a>
                    </div>
                    <div class="notFoot">
                        <span><strong>Data:</strong> 10/10/2021</span>
                        <span><strong>Autor:</strong> Rafaela Fernanda Murad Lucano</span>
                        <span><strong>Fonte:</strong> Uol Viagens </span>

                    </div>
                </div>
                <div class="noticia">
                    <div class="notImg">

                    </div>
                    <div class="notCont">
                        <h2>Título Notícia</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Suscipit similique iusto officiis quod asperiores incidunt ex earum,
                            dolorum quidem...
                        </p>
                        <a href="">Leia Mais</a>
                    </div>
                    <div class="notFoot">
                        <span><strong>Data:</strong> 10/10/2021</span>
                        <span><strong>Autor:</strong> Rafaela Fernanda Murad Lucano</span>
                        <span><strong>Fonte:</strong> Uol Viagens </span>

                    </div>
                </div>
                <div class="noticia">
                    <div class="notImg">

                    </div>
                    <div class="notCont">
                        <h2>Título Notícia</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Suscipit similique iusto officiis quod asperiores incidunt ex earum,
                            dolorum quidem...
                        </p>
                        <a href="">Leia Mais</a>
                    </div>
                    <div class="notFoot">

                        <span><strong>Data:</strong> 10/10/2021</span>
                        <span><strong>Autor:</strong> Rafaela Fernanda Murad Lucano</span>
                        <span><strong>Fonte:</strong> Uol Viagens </span>

                    </div>
                </div>
                <div class="noticia">
                    <div class="notImg">
                        <img src="" alt="" class="notFoto">
                    </div>
                    <div class="notCont">
                        <h2>Título Notícia</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Suscipit similique iusto officiis quod asperiores incidunt ex earum,
                            dolorum quidem...
                        </p>
                        <a href="">Leia Mais</a>
                    </div>
                    <div class="notFoot">

                        <span><strong>Data:</strong> 10/10/2021</span>
                        <span><strong>Autor:</strong> Rafaela Fernanda Murad Lucano</span>
                        <span><strong>Fonte:</strong> Uol Viagens </span>

                    </div>
                </div>
                 

</div>-->
            