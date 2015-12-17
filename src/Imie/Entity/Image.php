<?php
/**
 * Created by PhpStorm.
 * User: r-1
 * Date: 16/12/2015
 * Time: 13:48
 */

namespace Imie\Entity;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\Mapping\Table;

/**
 * Class Image
 * @package Imie\Entity
 * @Table(name="images")
 * @Entity()
 */
class Image
{
    /**
     * @var id the id
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    protected $id;
    /**
     * @var the name of the image
     * @Column(type="string")
     */
    protected $name;
    /**
     * @var Connect to product
     * @OneToOne(targetEntity="Product", mappedBy="image")
     */
    private  $product;

    /**
     * @return Id
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return the
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param the $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param mixed $product
     */
    public function setProduct(Product $product=null)
    {
        $this->product = $product;
    }



}