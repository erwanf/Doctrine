<?php
/**
 * Created by PhpStorm.
 * User: r-1
 * Date: 15/12/2015
 * Time: 15:20
 */

namespace Imie\Controller;


use Doctrine\ORM\EntityManager;

class Controller
{
    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * Controller constructor.
     * @param $em EntityManager
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @return EntityManager
     */
    public function getEntityManager()
    {
        return $this->em;
    }

    /**
     * return the request EntityRepository
     * @param $repo String
     * @return EntityRepository
     */
    public function getRepository($repo)
    {
        return $this->em->getRepository($repo);
    }

    public function render($name, $params = false)
    {
        $thePath = _VIEWPATH_.$name;
        if (file_exists($thePath)){
            if ($params){
                foreach ($params as $key => $value){
                    $$key = $value;
                }
            }
            require_once $thePath;
        }else{
            echo "no view";
        }
    }
}