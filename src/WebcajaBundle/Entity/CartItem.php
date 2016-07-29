<?php

namespace WebcajaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CartItem
 */
class CartItem
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var float
     */
    private $unitPrice;

    /**
     * @var int
     */
    private $quantity;

    /**
     * @var int
     */
    private $unit;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $codigo;

    /**
     * @var float
     */
    private $price;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set unitPrice
     *
     * @param float $unitPrice
     * @return CartItem
     */
    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = $unitPrice;

        return $this;
    }

    /**
     * Get unitPrice
     *
     * @return float 
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     * @return CartItem
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set unit
     *
     * @param integer $unit
     * @return CartItem
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;

        return $this;
    }

    /**
     * Get unit
     *
     * @return integer 
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return CartItem
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set codigo
     *
     * @param string $codigo
     * @return CartItem
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return string 
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return CartItem
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }
    /**
     * @var \WebcajaBundle\Entity\Cart
     */
    private $cart;


    /**
     * Set cart
     *
     * @param \WebcajaBundle\Entity\Cart $cart
     * @return CartItem
     */
    public function setCart(\WebcajaBundle\Entity\Cart $cart = null)
    {
        $this->cart = $cart;

        return $this;
    }

    /**
     * Get cart
     *
     * @return \WebcajaBundle\Entity\Cart 
     */
    public function getCart()
    {
        return $this->cart;
    }
    /**
     * @var integer
     */
    private $productId;


    /**
     * Set productId
     *
     * @param integer $productId
     * @return CartItem
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * Get productId
     *
     * @return integer 
     */
    public function getProductId()
    {
        return $this->productId;
    }
}
