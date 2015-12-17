<?php
/**
 * Created by PhpStorm.
 * User: r-1
 * Date: 15/12/2015
 * Time: 15:01
 */

namespace Imie\Controller;


class DefaultController extends Controller
{
    public function indexAction(){
        $this->render('layout.php');
    }
}