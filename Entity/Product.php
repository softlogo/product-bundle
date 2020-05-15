<?php

namespace Softlogo\ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Softlogo\ShopBundle\Model\ProductInterface;

/**
 * Product
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Softlogo\ProductBundle\Entity\ProductRepository")
 */
class Product implements ProductInterface
{

	public function __toString(){
		return $this->getName()."";
	}
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

	/**
	 * @var \ProductMedia
	 *
	 * @ORM\OneToMany(targetEntity="ProductMedia", mappedBy="product",cascade={"all"}, orphanRemoval=true)
	 * @ORM\OrderBy({"itemorder" = "ASC"})
	 */
	private $productMedias;

	/**
	 * @var \ProductParameter
	 *
	 * @ORM\OneToMany(targetEntity="ProductParameter", mappedBy="product",cascade={"all"}, orphanRemoval=true)
	 * @ORM\OrderBy({"itemorder" = "ASC"})
	 */
	private $productParameters;


	/**
	 *
	 * @ORM\ManyToOne(targetEntity="Category")
	 */
	private $category;

	/**
	 *
	 *@ORM\ManyToMany(targetEntity="Category", inversedBy="products")
	 */
	private $categories;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="price", type="integer")
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="stock", type="integer")
     */
    private $stock;

    /**
     * @var string
     *
     * @ORM\Column(name="weight", type="decimal", nullable=true)
     */
    private $weight;

	/**
	 *
	 * @ORM\ManyToOne(targetEntity="Softlogo\ShopBundle\Entity\ShippingPack")
	 */
	private $shippingPackage;

    /**
     * @var string
     *
	 * @ORM\ManyToOne(targetEntity="Softlogo\ShopBundle\Entity\ShippingCalculationType")
     */

    private $shippingCalculationType;


	/**
	 *
	 * @ORM\OneToMany(targetEntity="Softlogo\CMSBundle\Entity\Content", mappedBy="product",cascade={"all"}, orphanRemoval=true)
	 */
	private $contents;




	public function getFirstProductMedia(){
		return $this->getProductMedias()->first();
	}
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
     * @return Product
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
     * Set price
     *
     * @param integer $price
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Product
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

    /**
     * Set stock
     *
     * @param integer $stock
     * @return Product
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock
     *
     * @return integer 
     */
    public function getStock()
    {
        return $this->stock;
    }


    /**
     * Set category
     *
     * @param \Softlogo\ProductBundle\Entity\Category $category
     * @return Product
     */
    public function setCategory(\Softlogo\ProductBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Softlogo\ProductBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->productMedias = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add productMedias
     *
     * @param \Softlogo\ProductBundle\Entity\ProductMedia $productMedias
     * @return Product
     */
    public function addProductMedia(\Softlogo\ProductBundle\Entity\ProductMedia $productMedias)
    {
		$productMedias->setProduct($this);
        $this->productMedias[] = $productMedias;

        return $this;
    }

    /**
     * Remove productMedias
     *
     * @param \Softlogo\ProductBundle\Entity\ProductMedia $productMedias
     */
    public function removeProductMedia(\Softlogo\ProductBundle\Entity\ProductMedia $productMedias)
    {
        $this->productMedias->removeElement($productMedias);
    }

    /**
     * Get productMedias
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProductMedias()
    {
        return $this->productMedias;
    }

    /**
     * Set weight
     *
     * @param string $weight
     *
     * @return Product
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return string
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set shippingPackage
     *
     * @param \Softlogo\ShopBundle\Entity\ShippingPack $shippingPackage
     *
     * @return Product
     */
    public function setShippingPackage(\Softlogo\ShopBundle\Entity\ShippingPack $shippingPackage = null)
    {
        $this->shippingPackage = $shippingPackage;

        return $this;
    }

    /**
     * Get shippingPackage
     *
     * @return \Softlogo\ShopBundle\Entity\ShippingPack
     */
    public function getShippingPackage()
    {
        return $this->shippingPackage;
    }

    /**
     * Set shippingCalculationType
     *
     * @param \Softlogo\ShopBundle\Entity\ShippingCalculationType $shippingCalculationType
     *
     * @return Product
     */
    public function setShippingCalculationType(\Softlogo\ShopBundle\Entity\ShippingCalculationType $shippingCalculationType = null)
    {
        $this->shippingCalculationType = $shippingCalculationType;

        return $this;
    }

    /**
     * Get shippingCalculationType
     *
     * @return \Softlogo\ShopBundle\Entity\ShippingCalculationType
     */
    public function getShippingCalculationType()
    {
        return $this->shippingCalculationType;
    }

    /**
     * Add productParameter
     *
     * @param \Softlogo\ProductBundle\Entity\ProductParameter $productParameter
     *
     * @return Product
     */
    public function addProductParameter(\Softlogo\ProductBundle\Entity\ProductParameter $productParameter)
    {
		$productParameter->setProduct($this);
        $this->productParameters[] = $productParameter;

        return $this;
    }

    /**
     * Remove productParameter
     *
     * @param \Softlogo\ProductBundle\Entity\ProductParameter $productParameter
     */
    public function removeProductParameter(\Softlogo\ProductBundle\Entity\ProductParameter $productParameter)
    {
        $this->productParameters->removeElement($productParameter);
    }

    /**
     * Get productParameters
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProductParameters()
    {
        return $this->productParameters;
    }

    /**
     * Add content
     *
     * @param \Softlogo\CMSBundle\Entity\Content $content
     *
     * @return Product
     */
    public function addContent(\Softlogo\CMSBundle\Entity\Content $content)
    {
        $this->contents[] = $content;

        return $this;
    }

    /**
     * Remove content
     *
     * @param \Softlogo\CMSBundle\Entity\Content $content
     */
    public function removeContent(\Softlogo\CMSBundle\Entity\Content $content)
    {
        $this->contents->removeElement($content);
    }

    /**
     * Get contents
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContents()
    {
        return $this->contents;
    }

    /**
     *
     * @return Product
     */

    public function getProduct()
    {
        return $this->product;;
    }







    public function addCategory(\Softlogo\ProductBundle\Entity\Category $category)
    {
    	$category->addProduct($this);
        $this->categories[] = $category;

        return $this;
    }

    public function removeCategory(\Softlogo\ProductBundle\Entity\Category $category)
    {
        $this->categories->removeElement($category);
    }

    public function getCategories()
    {
        return $this->categories;
    }











}
