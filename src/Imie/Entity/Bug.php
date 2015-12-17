<?php
/**
 * Created by PhpStorm.
 * User: r-1
 * Date: 17/12/2015
 * Time: 09:17
 */

namespace Imie\Entity;

use Imie\Entity\Product;

use Doctrine\Common\Collections\ArrayCollection;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\Table;

/**
 * @Table(name="bugs")
 * @Entity()
 */
class Bug
{
    /**
     * @Id()
     * @Column(type="integer")
     * @GeneratedValue
     */
    protected $id;

    /**
     * @Column(type="string")
     */
    protected $description;


    /**
     * @Column(type="datetime")
     */
    protected $date;

    /**
     * @ManyToMany(targetEntity="Product", mappedBy="bugs")
     */
    private $products;

    public function __construct() {
        // DateTime est un objet Doctrine
        $this->date = new \DateTime("now");
        $this->products = new ArrayCollection();
    }

    public function addProduct(Product $prod) {
        $this->products[] = $prod;
        return $this;
    }

    public function removeProduct(Product $prod) {
        $this->products->remove($prod);
        return $this;
    }

    public function getProducts() {
        return $this->products;
    }

    public function getId() {
        return $this->id;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate(\DateTime $date) {
        $this->date = $date;
        return $this;
    }

}