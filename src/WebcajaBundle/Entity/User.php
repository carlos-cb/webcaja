<?php

namespace WebcajaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 */
class User extends BaseUser
{
    /**
     * @var int
     */
    protected $id;

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
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function __toString() {
        return strval($this->id);
    }
    /**
     * @var \WebcajaBundle\Entity\Cart
     */
    private $cart;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $orderInfos;


    /**
     * Set cart
     *
     * @param \WebcajaBundle\Entity\Cart $cart
     * @return User
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
     * Add orderInfos
     *
     * @param \WebcajaBundle\Entity\OrderInfo $orderInfos
     * @return User
     */
    public function addOrderInfo(\WebcajaBundle\Entity\OrderInfo $orderInfos)
    {
        $this->orderInfos[] = $orderInfos;

        return $this;
    }

    /**
     * Remove orderInfos
     *
     * @param \WebcajaBundle\Entity\OrderInfo $orderInfos
     */
    public function removeOrderInfo(\WebcajaBundle\Entity\OrderInfo $orderInfos)
    {
        $this->orderInfos->removeElement($orderInfos);
    }

    /**
     * Get orderInfos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOrderInfos()
    {
        return $this->orderInfos;
    }
}
