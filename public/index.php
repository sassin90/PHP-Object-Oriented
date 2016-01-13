<?php 

use app\Controller\ArticlesController;

use app\Controller\UsersController;


define('ROOT', dirname(__DIR__));

require ROOT . '/app/App.php'; 

app::load();

if(isset($_GET['page'])){

	$page = $_GET['page'];

} else {

	$page='articles.index';
}

$page = explode('.', $page);

if($page[0] == 'admin'){

	$controller = 'app\Controller\Admin\\' . ucfirst($page[1]) . 'Controller';

	$action = $page[2];

} else {

	$controller = 'app\Controller\\' . ucfirst($page[0]) . 'Controller';

	$action = $page[1];
}

$controller = new $controller();

$controller->$action();








