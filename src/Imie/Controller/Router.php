<?php //src/Imie/Router.php
/**
 * Created by PhpStorm.
 * User: r-1
 * Date: 15/12/2015
 * Time: 14:57
 */

namespace Imie\Controller;


use Doctrine\ORM\EntityManager;

class Router
{
    /**
     * @var EntityManager
     */
    private $em;
    /**
     * @var DefaultController
     */
    private $defaultController;

    /**
     * Router constructor.
     * @param $em EntityManager
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
        $this->defaultController = new DefaultController($this->em);
    }

    /**
     * Find out if the request corresponds to a controller
     */
    public function routerRequest()
    {
        $flag = false;
        if (isset($_GET['controller']) && isset($_GET['action'])) {
            $path = _CTRLPATH_ . ucfirst($_GET['controller'] . 'Controller.php');
            $controller = '\\Imie\\Controller\\'.ucfirst($_GET['controller']) . 'Controller';
            $action = $_GET['action'] . 'Action';
            if (file_exists($path)) {
                $myController = new $controller($this->em);
                if (method_exists($myController, $action)) {
                    $myController->$action();
                    $flag = true;
                }
            } else {
                echo 'plop';
            }
        }
        // if nothing was set and the flag is false
        if (!$flag) {
            $this->defaultController->indexAction();
        }
    }

}