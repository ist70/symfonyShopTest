<?php

namespace Brend\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Sale
 * @package Brend\ShopBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="Sale")
 * @ORM\HasLifecycleCallbacks
 */
class Sale
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
    protected $number;

    /**
     * @ORM\Column(type="float")
     */
    protected $salesum;

    /**
     * @var datetime $created
     *
     * @ORM\Column(type="datetime", name="created_at")
     */
    protected $created;

    /**
     * @var datetime $updated
     *
     * @ORM\Column(type="datetime", name="updated_at", nullable=true)
     */
    protected $updated;

    /**
     * @ORM\ManyToOne(targetEntity="Client", inversedBy="purchase")
     */
    protected $client;

    /**
     * @ORM\ManyToOne(targetEntity="Status", inversedBy="sale")
     */
    protected $status;

    /**
     * @ORM\ManyToMany(targetEntity="Product", inversedBy="Sale")
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

    public function getNumber()
    {
        return $this->number;
    }

    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    public function getClient()
    {
        return $this->client;
    }

    public function setClient($client)
    {
        $this->client = $client;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($statuses)
    {
        $this->status = $statuses;
        return $this;
    }

    /**
     * Gets triggered only on insert
     * @ORM\PrePersist
     */
    public function onPrePersist()
    {
        $this->created = new \DateTime("now");
    }

    /**
     * Gets triggered every time on update
     * @ORM\PreUpdate
     */
    public function onPreUpdate()
    {
        $this->updated = new \DateTime("now");
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