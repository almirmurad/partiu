<header>
    <div class="container">
        <div class="area-logo">
            <img src="" alt="">
            <h2>GERENCIADOR - PARTIU!</h2>
        </div>
        <div class="area-help">
            <div class="help">
                ?
            </div>
            <div class="notifications">
                <img src="<?=$base?>/assets/img/img_admin/sino.png" alt="Avatar-Usuario" >
            </div>
            <div class="user"  onclick="showHideAvatarInfo();" >
                <img src="<?=$base?>/assets/img/img_admin/<?=$loggedUser->avatar;?>" alt="Avatar-Usuario">
            </div>
            
        </div>
        <div class="avatar-info" style="display: none;">
                <div class="avatar-img">
                    <img src="<?=$base?>/assets/img/img_admin/<?=$loggedUser->avatar;?>" alt="Avatar-Usuario" >
                </div>
                <div class="avatar-name">
                    <h5><?=$loggedUser->name;?></h5>
                </div>
                <div class="avatar-email">
                    <h5><?=$loggedUser->mail;?></h5>
                </div>
                <div class="avatar-type">
                    <span class="avatar-type-tag"><?=$loggedUser->type;?></span>
                </div>
                <div class="avatar-logout">
                    <a href="<?=$base?>/logout" class="logout">Sair</a>
                </div>
            </div>
    
    </div>
</header>