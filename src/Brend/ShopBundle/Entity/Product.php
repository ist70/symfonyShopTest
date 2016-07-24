<?php

namespace Brend\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Status
 * @package Brend\ShopBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="Products")
 */
class Product
{

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @ORM\Column(type="float")
     */
    protected $price;

    /**
     * @ORM\ManyToMany(targetEntity="Category", mappedBy="Product")
     */
    protected $categories;

    /**
     * @ORM\ManyToMany(targetEntity="Sale", mappedBy="Product")
     */
    protected $sales;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
        $this->sales = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function addPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function addCategories($categories)
    {
        $this->categories[] = $categories;
        return $this;
    }

    public function getCategories()
    {
        return $this->categories;
    }

    public function addSales($sales)
    {
        $this->sales[] = $sales;
        return $this;
    }

    public function getSales()
    {
        return $this->sales;
    }
}