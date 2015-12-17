<?php // bootstrap.php
/**
 * Gives us the EntityManager from Doctrine
 */
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
require_once 'vendor/autoload.php';

$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array(
    __DIR__."/src/Imie/Entity"),
    $isDevMode
);
// database configuration parameters
$conn = array(
//    'driver' => 'pdo_sqlite',
//    'path' => __DIR__ . '/db.sqlite',
  'driver'   => 'pdo_mysql',
   'host'     => '127.0.0.1',
    'user'     => 'root',
    'password' => '',
    'dbname'   => 'doctrine_test',
);

// obtaining the entity manager
$em = EntityManager::create($conn, $config);