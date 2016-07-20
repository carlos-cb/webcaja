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
     * @var float
     */
    private $unitPrice;

    /**
     * @var int
     */
    private $unit;

    /**
     * @var int
     */
    private $quantity;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $nameEs;

    /**
     * @var string
     */
    private $codigo;

    /**
     * @var string
     */
    private $description;


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
     * @return OrderItem
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
     * Set unit
     *
     * @param integer $unit
     * @return OrderItem
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

    /**
     * Set name
     *
     * @param string $name
     * @return OrderItem
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
     * Set nameEs
     *
     * @param string $nameEs
     * @return OrderItem
     */
    public function setNameEs($nameEs)
    {
        $this->nameEs = $nameEs;

        return $this;
    }

    /**
     * Get nameEs
     *
     * @return string 
     */
    public function getNameEs()
    {
        return $this->nameEs;
    }

    /**
     * Set codigo
     *
     * @param string $codigo
     * @return OrderItem
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
     * Set description
     *
     * @param string $description
     * @return OrderItem
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
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
}
