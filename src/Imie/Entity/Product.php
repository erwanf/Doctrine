<?php
namespace Imie\Entity;

use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Product
 * @package Imie\Entity
 * @Table(name="products")
 * @Entity(repositoryClass="ProductRepository")
 */
class Product
{
    /**
     * @var
     * @Id()
     * @Column(type="integer")
     * @GeneratedValue()
     */
    protected $id;
    /**
     * @var
     * @Column(type="string")
     */
    protected $name;

    /**
     * @var
     * @OneToOne(targetEntity="Image", inversedBy="product", cascade={"persist","remove"})
     *
     */
    private $image;

    /**
     * @ManyToMany(targetEntity="Bug", inversedBy="products")
     */
    private $bugs;

    public function __construct()
    {
        $this->bugs = new ArrayCollection();
    }

    public function addBug(Bug $bug)
    {
        $this->bugs[] = $bug;
        $bug->addProduct($this);
        return $this;
    }

    public function removeBug(Bug $bug)
    {
        $this->bugs->remove($bug);
        $bug->removeProduct($this);
        return $this;
    }

    public function getBugs()
    {
        return $this->bugs;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage(Image $image = null)
    {
        $this->image = $image;
        $image->setProduct($this);
        return $this;
    }


}