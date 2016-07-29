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
     * @var int
     */
    private $quantity;
    
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
    /**
     * @var \WebcajaBundle\Entity\Product
     */
    private $product;


    /**
     * Set product
     *
     * @param \WebcajaBundle\Entity\Product $product
     * @return CartItem
     */
    public function setProduct(\WebcajaBundle\Entity\Product $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \WebcajaBundle\Entity\Product 
     */
    public function getProduct()
    {
        return $this->product;
    }
}
