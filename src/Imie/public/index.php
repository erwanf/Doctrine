<?php
namespace Imie;

use Imie\Controller\Router;

session_start();

define('_CTRLPATH_',        '..\\Controller\\');
define('_VIEWPATH_',        '..\\View\\');
define('_DOCTRINEPATH_',    '..\\..\\..\\');
define('_INDEXPATH_',       '..\\public\\');

require_once (_DOCTRINEPATH_.'bootstrap.php');

$router = new Router($em);
$router->routerRequest();