<?php

namespace WebcajaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrderItem
 */
class OrderItem
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
     * @return OrderItem
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

    public function __toString() {
        return strval($this->id);
    }
    /**
     * @var \WebcajaBundle\Entity\OrderInfo
     */
    private $orderInfo;


    /**
     * Set orderInfo
     *
     * @param \WebcajaBundle\Entity\OrderInfo $orderInfo
     * @return OrderItem
     */
    public function setOrderInfo(\WebcajaBundle\Entity\OrderInfo $orderInfo = null)
    {
        $this->orderInfo = $orderInfo;

        return $this;
    }

    /**
     * Get orderInfo
     *
     * @return \WebcajaBundle\Entity\OrderInfo 
     */
    public function getOrderInfo()
    {
        return $this->orderInfo;
    }
    /**
     * @var integer
     */
    private $productId;

    /**
     * @var \WebcajaBundle\Entity\Product
     */
    private $product;


    /**
     * Set productId
     *
     * @param integer $productId
     * @return OrderItem
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
     * Set product
     *
     * @param \WebcajaBundle\Entity\Product $product
     * @return OrderItem
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
