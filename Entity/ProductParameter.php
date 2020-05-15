<?php

namespace Softlogo\ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductParameter
 *
 * @ORM\Table(name="product_parameter")
 * @ORM\Entity
 */
class ProductParameter
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="itemorder", type="integer", nullable=true)
     */
    private $itemorder;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=255, nullable=true)
     */
    private $value;

    /**
     * @var string
     *
     * @ORM\Column(name="value2", type="string", length=255, nullable=true)
     */
    private $value2;
    /**
     * @var string
     *
     * @ORM\Column(name="prod_id", type="string", length=255, nullable=true)
     */
    private $prodId;
    /**
     * @var string
     *
     * @ORM\Column(name="dimensions", type="string", length=255, nullable=true)
     */
    private $dimensions;
    /**
     * @var string
     *
     * @ORM\Column(name="pressure", type="string", length=255, nullable=true)
     */
    private $pressure;

    /**
     * @var \Softlogo\CMSBundle\Entity\Parameter
     *
     * @ORM\ManyToOne(targetEntity="\Softlogo\CMSBundle\Entity\Parameter")
     */
    
    private $parameter;

    /**
     * @var \Section
     *
     * @ORM\ManyToOne(targetEntity="Product")
     */
    private $product;

    private $type;
    

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
     * Set itemorder
     *
     * @param integer $itemorder
     * @return ProductParameter
     */
    public function setItemorder($itemorder)
    {
        $this->itemorder = $itemorder;

        return $this;
    }

    /**
     * Get itemorder
     *
     * @return integer 
     */
    public function getItemorder()
    {
        return $this->itemorder;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return ProductParameter
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set parameter
     *
     * @param \\Softlogo\CMSBundle\Entity\Parameter $parameter
     * @return ProductParameter
     */
    public function setParameter(\Softlogo\CMSBundle\Entity\Parameter $parameter = null)
    {
        $this->parameter = $parameter;

        return $this;
    }

    /**
     * Get parameter
     *
     * @return \Softlogo\CMSBundle\Entity\Parameter 
     */
    public function getParameter()
    {
        return $this->parameter;
    }

    /**
     * Set product
     *
     * @param \Softlogo\ProductBundle\Entity\Product $product
     * @return ProductParameter
     */
    public function setProduct(\Softlogo\ProductBundle\Entity\Product $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \Softlogo\ProductBundle\Entity\Product 
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set value
     *
     * @param string $value
     *
     * @return ProductParameter
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set value2
     *
     * @param string $value2
     *
     * @return ProductParameter
     */
    public function setValue2($value2)
    {
        $this->value2 = $value2;

        return $this;
    }

    /**
     * Get value2
     *
     * @return string
     */
    public function getValue2()
    {
        return $this->value2;
    }

    /**
     * Set prodId
     *
     * @param string $prodId
     *
     * @return ProductParameter
     */
    public function setProdId($prodId)
    {
        $this->prodId = $prodId;

        return $this;
    }

    /**
     * Get prodId
     *
     * @return string
     */
    public function getProdId()
    {
        return $this->prodId;
    }

    /**
     * Set dimensions
     *
     * @param string $dimensions
     *
     * @return ProductParameter
     */
    public function setDimensions($dimensions)
    {
        $this->dimensions = $dimensions;

        return $this;
    }

    /**
     * Get dimensions
     *
     * @return string
     */
    public function getDimensions()
    {
        return $this->dimensions;
    }

    /**
     * Set pressure
     *
     * @param string $pressure
     *
     * @return ProductParameter
     */
    public function setPressure($pressure)
    {
        $this->pressure = $pressure;

        return $this;
    }

    /**
     * Get pressure
     *
     * @return string
     */
    public function getPressure()
    {
        return $this->pressure;
    }
}
