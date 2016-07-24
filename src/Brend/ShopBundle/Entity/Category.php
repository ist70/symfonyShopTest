<?php

namespace Brend\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Status
 * @package Brend\ShopBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="Categories")
 */

class Category
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
     * @ORM\ManyToMany(targetEntity="Product", inversedBy="Category")
     */
    protected $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
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

    public function addProductss($products)
    {
        $this->products[] = $products;
        return $this;
    }

    public function getProducts()
    {
        return $this->products;
    }

}