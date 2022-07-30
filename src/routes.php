<?php
use core\Router;

$router = new Router();

/* Rotas do site */
$router->get('/', 'HomeController@index');
$router->get('/quemSomos', 'site\QmSmsController@index');

//roteiros
$router->get('/roteiros', 'site\RMController@index');
$router->get('/readRoadMap/{id}/read', 'site\RMController@readRoadMap');
$router->get('/roteiros/{id}/roteirosCat', 'site\RMController@roteirosCat');

//$router->get('/readRoadMap/{id}/read', 'HomeController@readRoadMap');

/* Blog */
$router->get('/blog', 'site\BlogController@index');
$router->get('/blog/{id}/readBlog', 'site\BlogController@readBlog');

/* Notícias */
$router->get('/noticias', 'site\NotController@index');
$router->get('/readNews/{id}/read', 'site\NotController@read');

/* Pacotes */
$router->get('/pacotes', 'site\PacController@index');
$router->get('/package/{id}/readPackage', 'site\PacController@readPackage');

/* Eventos */
$router->get('/eventos', 'site\EvenController@index');
$router->get('/events/{id}/readEvent', 'site\EvenController@readEvent');

/* Parceiros */
//$router->get('/partner', 'site\ParcController@partners');
$router->get('/partner/{id}/readPartner', 'site\ParcController@readPartner');

/********** Rotas do Gerenciador **********/

/* CmsController */
$router->get('/gerenciador', 'CmsController@index');

/********** Sistema de Login **********/
/* LoginController / loginHandler  / User*/
/* Rotas */
$router->get('/login', 'LoginController@signin');
$router->post('/login', 'LoginController@signinAction');
$router->get('/registration', 'LoginController@signup');
$router->get('/logout', 'LoginController@signout');

/********** Controle de Ususários do sistema **********/
/* UsersController / loginHandler / User */
/* Rotas */
$router->get('/newUser', 'UsersController@addUser');
$router->post('/newUser', 'UsersController@addUserAction');
$router->get('/users', 'UsersController@listUsers');
$router->get('/user/{id}/editUser','UsersController@editUser');
$router->post('/user/{id}/editUser','UsersController@editUserAction');
$router->get('/user/{id}/deleteUser', 'UsersController@deleteUser');

/********** Controle de Notícias **********/
/* NewsController / NewsHandler / Noticia */
/* Rotas */
$router->get('/newNews', 'NewsController@addNews');
$router->post('/newNews', 'NewsController@addNewsAction');
$router->get('/news', 'NewsController@listNews');
$router->get('/news/{id}/editNews','NewsController@editNews');
$router->post('/news/{id}/editNews','NewsController@editNewsAction');
$router->get('/news/{id}/deleteNews', 'NewsController@deleteNews');

/********** Controle de Categorias  **********/
/* CatsController / CatHandler / Categorie */
/* Rotas Categoria */
$router->get('/categories', 'CatsController@index');
$router->get('/newCat', 'CatsController@addCat');
$router->post('/newCat', 'CatsController@addCatAction');
//edição de categorias
$router->get('/cat/{id}/editCat', 'CatsController@editCat');
$router->post('/cat/{id}/editCat','CatsController@editCatAction');
$router->get('/cat/{id}/deleteCat', 'CatsController@deleteCat');

/********** Controle de SubCategorias  **********/
/* CatsController / CatHandler / Subcategorie */
/* Rotas Subcategoria */
$router->get('/cat/{id}/newSubCat', 'SubCatsController@addSubCat');
$router->post('/cat/{id}/newSubCat', 'SubCatsController@addSubCatAction');
$router->get('/cat/{id}/listSubCat', 'SubCatsController@listSubCat');
$router->get('/subCat/{id}/editSubCat', 'SubCatsController@editSubCat');
$router->post('/subCat/{id}/editSubCat','SubCatsController@editSubCatAction');
$router->get('/subCat/{id}/deleteSubCat', 'SubCatsController@deleteSubCat');

/********** Controle de Categorias de Roteiros **********/
//categoria de Roteiros
$router->get('/newRoadMap', 'RMController@addRoadMap');
$router->post('/newRoadMap', 'RMController@addRoadMapAction');
$router->get('/roadMap', 'RMController@listRoadMap');
$router->get('/roadMap/{id}/editRoadMap','RMController@editRoadMap');
$router->post('/roadMap/{id}/editRoadMap','RMController@editRoadMapAction');
$router->get('/roadMap/{id}/deleteRoadMap', 'RMController@deleteRoadMap');

/********** Controle Posts **********/
//Blog
$router->get('/newPost', 'PostController@addPost');
$router->post('/newPost', 'PostController@addPostAction');
$router->get('/post', 'PostController@listPosts');
$router->get('/post/{id}/editPost','PostController@editPost');
$router->post('/post/{id}/editPost','PostController@editPostAction');
$router->get('/post/{id}/deletePost', 'PostController@deletePost');


/********** Controle Packages **********/
//Pacotes
$router->get('/newPackage', 'PackageController@addPackage');
$router->post('/newPackage', 'PackageController@addPackageAction');
$router->get('/package', 'PackageController@listPackages');
$router->get('/package/{id}/editPackage','PackageController@editPackage');
$router->post('/package/{id}/editPackage','PackageController@editPackageAction');
$router->get('/package/{id}/deletePackage', 'PackageController@deletePackage');


/********** Controle Events **********/
//Eventos
$router->get('/newEvent', 'EventsController@addEvent');
$router->post('/newEvent', 'EventsController@addEventAction');
$router->get('/event', 'EventsController@listEvents');
$router->get('/event/{id}/editEvent','EventsController@editEvent');
$router->post('/event/{id}/editEvent','EventsController@editEventAction');
$router->get('/event/{id}/deleteEvent', 'EventsController@deleteEvent');

/********** Controle partners **********/
//Partnes
$router->get('/newPartner', 'PartnerController@addPartner');
$router->post('/newPartner', 'PartnerController@addPartnerAction');
$router->get('/Partner', 'PartnerController@listPartners');
$router->get('/Partner/{id}/editPartner','PartnerController@editPartner');
$router->post('/Partner/{id}/editPartner','PartnerController@editPartnerAction');
$router->get('/Partner/{id}/deletePartner', 'PartnerController@deletePartner');

$router->get('/newPartnerType', 'gerenciador\PartnerTypeController@addPartnerType');
$router->post('/newPartnerType', 'gerenciador\PartnerTypeController@addPartnerTypeAction');
$router->get('/partnersType', 'gerenciador\PartnerTypeController@listPartnersType');
$router->get('/partnersType/{id}/editPartnerType', 'gerenciador\PartnerTypeController@editPartnerType');
$router->post('/partnersType/{id}/editPartnerType', 'gerenciador\PartnerTypeController@editPartnerTypeAction');
$router->get('/partnersType/{id}/deletePartnerType', 'gerenciador\PartnerTypeController@deletePartnerType');