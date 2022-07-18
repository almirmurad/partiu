<?php
namespace src\controllers\site;

use core\ControllerSite;

use src\models\Post;
use src\handlers\site\SubCatsSiteHandler;
use src\handlers\site\PostSiteHandler;
use src\handlers\site\EventsSiteHandler;

class BlogController extends ControllerSite{
    public function index() {
        $categoriaBlog =  PostSiteHandler::nameCategoriePosts();
        $categories = SubCatsSiteHandler::catsBlog();
        $posts= PostSiteHandler::posts();
        $postsAll = Post::select()->get(); //todos os po
        $totalPostCat = PostSiteHandler::totalPostCategoria($categoriaBlog);
        $postsDestaques = PostSiteHandler::postsDestaques();
        $this->render('blog',[
            'page' => 'Blog',
            'postsAll' => $postsAll,
            'postsDestaques'=>$postsDestaques,
            'nameCategorie'=>$categoriaBlog,
            'posts' => $posts,
            'categories'=>$categories,
            'total'=>$totalPostCat
        ]);                
    }

    public function readBlog($args){
        $post = PostSiteHandler::readPost($args['id']);
        $categories = SubCatsSiteHandler::catsBlog();
        $eventsFoot = EventsSiteHandler::eventsFoot();
        $this->render('readBlog',[
            'page'=>'Ler Postagem',
            'data'=>$post,
            'categories'=>$categories,
            'eventsFoot'=>$eventsFoot,
        ]);
    }
}