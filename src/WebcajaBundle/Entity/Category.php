<?php

namespace WebcajaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 */
class Category
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $nameEs;


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
     * Set name
     *
     * @param string $name
     * @return Category
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
     * @return Category
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $products;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add products
     *
     * @param \WebcajaBundle\Entity\Product $products
     * @return Category
     */
    public function addProduct(\WebcajaBundle\Entity\Product $products)
    {
        $this->products[] = $products;

        return $this;
    }

    /**
     * Remove products
     *
     * @param \WebcajaBundle\Entity\Product $products
     */
    public function removeProduct(\WebcajaBundle\Entity\Product $products)
    {
        $this->products->removeElement($products);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProducts()
    {
        return $this->products;
    }

    public function __toString() {
        return strval($this->id);
    }
    /**
     * @var string
     */
    private $categoryFoto;


    /**
     * Set categoryFoto
     *
     * @param string $categoryFoto
     * @return Category
     */
    public function setCategoryFoto($categoryFoto)
    {
        if(!empty($categoryFoto)){
            $this->categoryFoto = $categoryFoto;
        }
        return $this;
    }

    /**
     * Get categoryFoto
     *
     * @return string 
     */
    public function getCategoryFoto()
    {
        return $this->categoryFoto;
    }
}
