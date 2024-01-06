<?php
declare(strict_types=1);

require_once 'configs.php';
require_once ROOT . 'database/Connect.php';
require_once ROOT . 'system/Request.php';
require_once ROOT . 'system/Router.php';

//try {
//    $connect = Connect::getInstance();
//} catch (PDOException $exception) {
//    echo $exception->getMessage();
//    exit;
//}

$router = new Router();

$router->addRoute('/', [
    'get' => 'HomeController@view'
]);
$router->addRoute('/game', [
    'get' => 'GameController@view',
    'post' => 'GameController@process'
]);


$uri = Request::getPath();
$method = Request::getMethod();
$router->processRequest($uri, $method);

