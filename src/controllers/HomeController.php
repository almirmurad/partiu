<?php
namespace src\controllers;
use \core\ControllerSite;
use src\models\Noticia;
use src\models\Post;
use src\handlers\PostSiteHandler;
use src\models\Package;
use src\handlers\PackageSiteHandler;
use src\models\RoadMap;
use ClanCats\Hydrahon\Query\Expression as Rnd;
use src\models\Event;
use src\handlers\EventsSiteHandler;
use src\handlers\NewsSiteHandler;
use src\handlers\RMHandler;
use src\handlers\RMSiteHandler;
use src\handlers\SubCatsSiteHandler;
use src\models\Categorie;
use src\models\Subcategorie;
use src\models\User;

class HomeController extends ControllerSite {

    private $news;
    private $roadMaps;
    private $pacotes;
    private $events;
    private $categories;

    private $total;
    
    public function __construct()
    {   
        // Posts da página Blog
        $this->posts = Post::select()->get(); //todos os posts
        //posts em destaque
        $this->postsDestaques = Post::select('posts.id, posts.cover,posts.title, posts.title, posts.description, posts.categorie_id, subcategories.id, subcategories.name, subcategories.id_cat_asc')
                                        ->join('subcategories', 'posts.categorie_id', '=', 'id_cat_asc')
                                        //->where('posts.categorie_id', '40')
                                        //->where('subcategories.id_cat_asc', '4')
                                        ->orderBy(new rnd('rand()'))
                                        ->limit(3)
                                        ->execute();

        // Demais Posts
        $this->postsDemais = Post::select('posts.id, posts.cover, posts.title, posts.description, posts.categorie_id, subcategories.id, subcategories.name, subcategories.id_cat_asc')
                                        ->join('subcategories', 'posts.categorie_id', '=', 'id_cat_asc')
                                        ->where('posts.categorie_id','!=', '31')
                                        ->where('subcategories.id_cat_asc','4')
                                        ->orderBy('posts.created_at','desc')
                                        ->execute();

       
        
        

        //posts por categoria
        /*
        $this->postsCategoria = Post::select('posts.id, posts.cover, posts.title, posts.description, posts.categorie_id, subcategories.id, subcategories.name')
                                        ->join('subcategories', 'posts.categorie_id', '=', 'id_cat_asc')
                                        ->where('posts.categorie_id','!=', '31')
                                        ->where('subcategorie.name', $categorie)
                                        ->orderBy('posts.created_at','desc')
                                        ->execute();
*/
        //Notícias
        $this->news = Noticia::select()->limit(8)->get();

        //Roteiros
        $this->roadMaps = RMSiteHandler::roadMaps();
        
        //Pacotes
        $this->pacotes =[];
        $packagesList = Package::select()
        ->orderBy(new rnd('rand()'))
        ->limit(4)
        ->execute();

        foreach($packagesList as $packageItem){
            $newPackage = new Package();
            $newPackage->id = $packageItem['id'];
            $newPackage->title = $packageItem['title'];
            $newPackage->description = $packageItem['description'];
            $newPackage->text = $packageItem['text'];
            $newPackage->cover = $packageItem['cover'];
            $newPackage->img1 = $packageItem['img1'];
            $newPackage->img2 = $packageItem['img2'];
            $newPackage->img3 = $packageItem['img3'];
            $newPackage->img4 = $packageItem['img4'];
            $newPackage->destination = $packageItem['destination'];
            $newPackage->state = $packageItem['state'];
            $newPackage->country = $packageItem['country'];
            $newPackage->price = 'R$ '.number_format($packageItem['price'],2,',','.');
                       

            //4 usuarios que postaram
            /*$newUser = User::select()->where('id',$packageItem['user_id'])->one();
            $newPackage->user = new User();
            $newPackage->user->id=$newUser['id'];
            $newPackage->user->name=$newUser['name'];
            $newPackage->user->avatar=$newUser['avatar'];
            $newPackage->user->type_user=$newUser['type_user'];

            //categorias
            $newCat = Subcategorie::select()->where('id',$packageItem['categorie_id'])->one();
            $newPackage->categorie = new Subcategorie();
            $newPackage->categorie->id=$newCat['id'];
            $newPackage->categorie->name=$newCat['name'];
            $newPackage->categorie->description=$newCat['description'];
            $newPackage->categorie->img=$newCat['img'];
            $newPackage->categorie->id_cat_asc=$newCat['id_cat_asc'];*/

            $this->pacotes[] = $newPackage;

    }


    //Eventos
    $this->events =[];
    $evenstList = Event::select()
 
    ->orderBy(new rnd('rand()'))
    ->limit(6)
    ->execute();

    foreach($evenstList as $eventItem){
        $newEvent = new Event();
        $newEvent->id = $eventItem['id'];
        $newEvent->title = $eventItem['title'];
        $newEvent->description = $eventItem['description'];
        $newEvent->text = $eventItem['text'];
        $newEvent->cover = $eventItem['cover'];
        $newEvent->img1 = $eventItem['img1'];
        $newEvent->img2 = $eventItem['img2'];
        $newEvent->img3 = $eventItem['img3'];
        $newEvent->img4 = $eventItem['img4'];
        $newEvent->created_at = $eventItem['created_at'];
        $newEvent->link = $eventItem['link'];
        $newEvent->expires_at = $eventItem['expires_at'];
        //$newEvent->price = 'R$ '.number_format($eventItem['price'],2,',','.');
                   

        //4 usuarios que postaram
        $newUser = User::select()->where('id',$eventItem['user_id'])->one();
        if(empty($newUser)){
            continue;
        }
        $newEvent->user = new User();
        $newEvent->user->id=$newUser['id'];
        $newEvent->user->name=$newUser['name'];
        $newEvent->user->avatar=$newUser['avatar'];
        $newEvent->user->type_user=$newUser['type_user'];

        //categorias
        /*$newCat = Subcategorie::select()->where('id',$eventItem['categorie_id'])->one();
        $newEvent->categorie = new Subcategorie();
        $newEvent->categorie->id=$newCat['id'];
        $newEvent->categorie->name=$newCat['name'];
        $newEvent->categorie->description=$newCat['description'];
        $newEvent->categorie->img=$newCat['img'];
        $newEvent->categorie->id_cat_asc=$newCat['id_cat_asc'];*/

        $this->events[] = $newEvent;

    }

    //Categorias
    $this->categories = SubCatsSiteHandler::catsHome();
}

    public function index() {
        $this->render('home', [
            'page' => 'Home',
            'news' => $this->news,
            'packages'=>$this->pacotes,
            'events'=>$this->events,
            'categories'=>$this->categories
        ]);
    }

    public function quemSomos() {
        $categories = SubCatsSiteHandler::catsRoadMap();
        $this->render(
            'quemSomos',['page' => 'Quem Somos',
            'categories'=>$categories
        ]);
    }

    public function roteiros() {
        
        $categories = SubCatsSiteHandler::catsRoadMap();
        $this->render(
            'roteiros',[
            'page' => 'Roteiros',
            'roadMaps' =>$this->roadMaps,
            'categories'=>$categories
            
                 ]);
    }

    public function readRoadMap($args) {
        $categories = SubCatsSiteHandler::catsRoadMap();
        $roadMaps = RoadMap::select('roadMaps.title, roadMaps.created_at, roadMaps.text, roadMaps.img1, roadMaps.img2, roadMaps.img3, roadMaps.img4, roadMaps.cover, users.name, categories.name as categorie')
            ->join('users', 'roadMaps.user_id', '=', 'users.id')
            ->join('categories', 'roadMaps.categorie_id', '=', 'categories.id')
            ->where('roadMaps.id', $args['id'])
        ->get();

        $this->render(
            'readRoadMap',[
            'page' => 'Ler Roteiros',
            'roadMaps'=> $roadMaps,
            'categories'=> $categories
        ]);
    }

    public function roteirosCat($args) {
        $roadMaps = RMSiteHandler::roadMapCat($args);

        $this->render(
            'roteiros',[
            'page' => 'Roteiros',
            'roadMaps'=>$roadMaps
        ]);
    }


    public function blog() {
        $categoriaBlog =  PostSiteHandler::nameCategoriePosts();
        $categories = SubCatsSiteHandler::catsBlog();
        $posts= PostSiteHandler::posts();
        $totalPostCat = PostSiteHandler::totalPostCategoria($categoriaBlog);
        $this->render('blog',[
                'page' => 'Blog',
                'posts'=> $this->posts,
                'postsDestaques'=>$this->postsDestaques,
                'nameCategorie'=>$categoriaBlog,
                'posts' => $posts,
                'categories'=>$categories,
                'total'=>$totalPostCat
            ]);                
    }

    public function readBlog($args){
        $post = PostSiteHandler::readPost($args['id']);
        $categories = SubCatsSiteHandler::catsBlog();
            $this->render('readBlog',[
                'page'=>'Ler Postagem',
                'data'=>$post,
                'categories'=>$categories,
                
            ]);
    }

    public function pacotes() {
        //$categoriaBlog =  PackageSiteHandler::nameCategoriePosts();
        $page = intval(filter_input(INPUT_GET, 'page'));
        $pacotes = PackageSiteHandler::pacotes($page);     
        $categories = SubCatsSiteHandler::catsPackages();   //nacionais, internacionais etc    
        $this->render('package',[
            'page' => 'Pacotes',
            'pacotes' => $pacotes,
            'categories'=>$categories,
        ]);                
    }

    public function readPackage($args){
        $package = PackageSiteHandler::readPackage($args['id']);
        $categories = SubCatsSiteHandler::catsPackages();
        $this->render('readPackage',['page'=>'Pacote de Viagem',
                'data'=>$package,
                'categories'=>$categories,
            ]);
    }

    public function noticias() {
        $page = intval(filter_input(INPUT_GET, 'page'));
        $news = NewsSiteHandler::news($page);
        $categories = SubCatsSiteHandler::catsNews();
        $this->render('noticias',[
                'page' => 'Notícias',   
                'news' => $news,
                'categories'=>$categories
            ]);
    }

    public function read($args) {
        $categories = SubCatsSiteHandler::catsNews();
        $oneNews = Noticia::select('noticias.title,noticias.created_at, noticias.source, noticias.text, noticias.user_id, noticias.legend_img1, noticias.legend_img2, noticias.img1, noticias.img2, noticias.cover, noticias.description, users.name')
        ->join('users', 'noticias.user_id', '=', 'users.id')
        ->where('noticias.id', $args['id'])
        ->get();
        //$oneNews = Noticia::select()->where('id', $args['id'])->execute();
        $this->render('readNews',['page' => 'Ler Notícia',
                'oneNews' => $oneNews,
                'categories' => $categories
            ]);
    }

    public function eventos() {
        $page = intval(filter_input(INPUT_GET, 'page'));
        $categories = SubCatsSiteHandler::catsEvents();
        $eventos=EventsSiteHandler::events($page);
        $eventsFoot = EventsSiteHandler::eventsFoot();
        $this->render('eventos',[
                'page' => 'Eventos',
                'events'=> $eventos,
                'categories'=>$categories,
                'eventsFoot'=>$eventsFoot
            ]);

    }

    public function readEvent($args){
        $events = EventsSiteHandler::readEvent($args['id']);
        $categories = SubCatsSiteHandler::catsEvents();
        $this->render('readEvent',[
                'page'=>'Eventos',
                'events'=>$events,
                'categories'=>$categories
        ]);
    }
}