<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php $page = "Roteiros";?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/internas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <title><?=$page?></title>
</head>
<body>

<header>
        <!-- Logo e Search-->
        <?php include_once('assets/php/includes/header.php');?>

        <div class="nav">
            <!-- Menu navegação-->
            <?php include_once('assets/php/includes/menuNavigation.php');?>
        </div>
        <?php include_once('assets/php/includes/internalSlider.php');?>
        
        <?php include_once('assets/php/includes/internalCategories.php');?>
        

</header>
<main>
    <div class="container ">
        <section class="internal-content column">
            <h4>Você está em: <?=$page?></h4>
            <div class="top-round-map">
                <div class="cover-round-map">
                    <img src="assets/img/sobre.jpg" alt="">
                </div>
                <div class="data-round-map">
                    <ul>
                        <li><h1>Cataratas do Iguaçú</h1></li>
                        <li>Postado em: 09/11/2021</li>
                        <li>Postado por: Rafaela Fernanda Murad Lucano</li>
                        <li>Fonte:</li>
                    </ul>
                </div>
                
            </div>
            <div class="midlle-round-map">
                <div class="text-round-map">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum iaculis posuere suscipit. Duis quis orci diam. Suspendisse potenti. Etiam ut turpis quam.
                    Vivamus id metus fermentum, maximus lectus non, tempus ex. Etiam eget enim vel turpis suscipit pellentesque. Pellentesque sed eros et nunc egestas feugiat eget quis est.
                    Nulla commodo vehicula pellentesque. Nam dapibus lorem nec felis interdum, vel sagittis dolor egestas. Aenean a risus nibh. Ut et ultricies metus.
                    Praesent sit amet lacus ut massa mollis ultricies id sit amet tellus. Proin vulputate magna vitae risus tristique semper. Donec eu arcu purus.

                    Donec a ipsum auctor, maximus tellus ut, dignissim nibh. Proin rhoncus fermentum semper. Cras nisi quam, condimentum euismod ullamcorper a, laoreet id purus.
                    Suspendisse non erat facilisis, accumsan erat a, dictum libero. Nam sapien nisl, dictum at risus eget, commodo pretium velit. Morbi quis risus quis urna lacinia convallis et sed nisi.
                    Aliquam finibus nisi et sodales rutrum. Curabitur nisl sem, pellentesque sit amet malesuada fringilla, placerat quis quam. Morbi sagittis ante ut ligula egestas iaculis. Duis lobortis quam nisl.
                    Aliquam at malesuada risus. Duis molestie lacus quis erat luctus, luctus laoreet eros scelerisque. Aliquam volutpat convallis odio, ac vestibulum massa lacinia ut. Praesent vitae ullamcorper urna.

                    Curabitur ultricies aliquam urna non rutrum. Vivamus nec metus elit. Curabitur justo mauris, posuere dignissim ante nec, luctus euismod metus. Aenean tincidunt ac diam id pretium. Phasellus quis vehicula mi. 
                    Ut sem erat, venenatis sed ex in, luctus vulputate ipsum. In et ex dolor. In vel nisi quis mi mollis hendrerit. Curabitur ornare maximus ipsum, eget pharetra ex eleifend at. Donec mi diam, suscipit eu luctus eu,
                    lacinia id ante. Nulla eget euismod libero. Mauris quis arcu risus. Sed tincidunt pellentesque ultricies. Aenean vitae purus hendrerit metus rhoncus porttitor sed et metus. Nulla facilisi.
                </div>
            </div>
            <div class="foot-round-map">
                <div class="round-map">
                    <div class="grid-round-map">
                        <div class=" left-item " style="background-image:url(assets/img/1.jpg);"><a href="" class="galerie-link">Galeria</a></div>
                        <div class=" right-top-item" style="background-image:url(assets/img/2.jpg);"><a href="" class="galerie-link">Galeria</a></div>
                        <div class=" right-bottom-item" style="background-image:url(assets/img/3.jpg);"><a href="" class="galerie-link">texto</a></div>
                        
                    </div>
                </div>
            </div>
        

        </section>
        <aside>
        <?php include_once('assets/php/includes/aside.php');?>

        </aside>    
    </div>
</main>
<section class="final">
    <?php include_once('assets/php/includes/internalContentFinal.php');?>
</section>
<footer>


</footer>
</body>
</html>