<?php
namespace src\controllers\site;

use core\ControllerSite;

use src\models\Post;
use src\handlers\LoginHandler;
use src\handlers\site\SubCatsSiteHandler;
use src\handlers\site\PostSiteHandler;
use src\handlers\site\EventsSiteHandler;
use src\handlers\site\BannerSiteHandler;

class BlogController extends ControllerSite{

    private $loggedUser;

    public function __construct()
    {   
        $this->loggedUser = LoginHandler::checkLogin();
  
    }
    
    public function index() {
        $categoriaBlog =  PostSiteHandler::nameCategoriePosts();
        $categories = SubCatsSiteHandler::catsBlog();
        $posts= PostSiteHandler::posts();
        $postsAll = Post::select()->get(); //todos os po
        $totalPostCat = PostSiteHandler::totalPostCategoria($categoriaBlog);
        $postsDestaques = PostSiteHandler::postsDestaques();
        $internalBanner = BannerSiteHandler::bannerPublicityInternals();
        $publicityFoot = BannerSiteHandler::publicityFoot();
        $this->render('blog',[
            'page' => 'Blog',
            'postsAll' => $postsAll,
            'postsDestaques'=>$postsDestaques,
            'nameCategorie'=>$categoriaBlog,
            'posts' => $posts,
            'categories'=>$categories,
            'total'=>$totalPostCat,
            'internalPublicity'=>$internalBanner,
            'publicityFoot'=>$publicityFoot,
            'loggedUser'=>$this->loggedUser,
        ]);                
    }

    public function readBlog($args){
        $posts= PostSiteHandler::posts();
        $post = PostSiteHandler::readPost($args['id']);
        $categoriaBlog =  PostSiteHandler::nameCategoriePosts();
        $totalPostCat = PostSiteHandler::totalPostCategoria($categoriaBlog);
        $categories = SubCatsSiteHandler::catsBlog();
        $eventsFoot = EventsSiteHandler::eventsFoot();
        $internalBanner = BannerSiteHandler::bannerPublicityInternals();
        $publicityFoot = BannerSiteHandler::publicityFoot();
        $this->render('readBlog',[
            'page'=>'Ler Postagem',
            'data'=>$post,
            'posts' => $posts,
            'categories'=>$categories,
            'total'=>$totalPostCat,
            'eventsFoot'=>$eventsFoot,
            'internalPublicity'=>$internalBanner,
            'publicityFoot'=>$publicityFoot
        ]);
    }

    
}