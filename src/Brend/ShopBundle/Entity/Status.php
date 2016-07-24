<?php

namespace Brend\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Status
 * @package Brend\ShopBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="Status")
 */

class Status
{

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="name", type="string")
     */
    protected $name;

    /**
     * @ORM\OneToMany(targetEntity="Sale", mappedBy="status")
     */
    protected $sales;

    public function __construct()
    {
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

    public function addSales($sale)
    {
        $this->sales[] = $sale;
        return $this;
    }

    public function getSales()
    {
        return $this->sales;
    }

}