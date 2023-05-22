<?php $render('head');?>


    <?php $render('header', ['loggedUser'=>$loggedUser]);?>
    <main>
        <aside>
            <h4>Navegação</h4>
            <?php $render('nav',['loggedUser'=>$loggedUser]);?>
        </aside>
        <section>
            <div class="container column">
                <?php $render('breadcrumbs',['page'=>$page]);?>
                <div class="content column">
                    <h2><?=$page;?></h2>
                    
                    <div class="dash-boxes ">
                        <!-- inicio dos boxes individuais-->
                        <?php $render('dashBoxes', [
                                                    'loggedUser'=>$loggedUser, 
                                                    'totalPack'=>$totalPack, 
                                                    'totalActive'=>$totalActive,
                                                    'totalForaPrazo'=>$totalForaPrazo,
                                                    'totalNews'=>$totalNews,
                                                    'totalNewsActive'=>$totalNewsActive,
                                                    'totalPartner'=>$totalPartner,
                                                    'totalPartnerActive'=>$totalPartnerActive,
                                                    'totalPost'=>$totalPost,
                                                    'totalPostActive'=>$totalPostActive,
                                                    'totalRoadmap'=>$totalRoadmap,
                                                    'totalRoadmapActive'=>$totalRoadmapActive,
                                                    'totalEvent'=>$totalEvent,
                                                    'totalEventActive'=>$totalEventActive,
                                                    'totalUser'=>$totalUser,
                                                    'totalUserActive'=>$totalUserActive,
                                                    'totalNewsletter'=>$totalNewsletter,
                                                    'totalBanner'=>$totalBanner,
                                                    'totalBannerActive'=>$totalBannerActive,
                                                    ]);?>
                        <!-- fim dos boxes individuais-->
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php $render('footer');?>