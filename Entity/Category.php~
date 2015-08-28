<?php

namespace Softlogo\ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Softlogo\ProductBundle\Entity\CategoryRepository")
 */
class Category
{
	public function __toString(){
		return $this->getParent()." -- ".$this->getName();
	}
	public function getFullName(){
		return $this->__toString();
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
	 *
	 * @ORM\ManyToOne(targetEntity="Category")
	 */
	private $parent;


    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="itemorder", type="integer")
     */
    private $itemorder;

	/**
     * @var \Application\Sonata\MediaBundle\Entity\Media
     *
     * @ORM\ManyToOne(targetEntity="\Application\Sonata\MediaBundle\Entity\Media")
     */
    private $media;

	/**
	 * @ORM\OneToMany(targetEntity="Category", mappedBy="parent", cascade="persist", orphanRemoval=true)
	 * @ORM\OrderBy({"itemorder" = "ASC"})
     */
    private $categories;

	/**
	 * @ORM\OneToMany(targetEntity="Product", mappedBy="category", cascade="persist", orphanRemoval=true)
	 * @ORM\OrderBy({"itemorder" = "ASC"})
     */
    private $products;


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
     * Set description
     *
     * @param string $description
     * @return Category
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
     * Set itemorder
     *
     * @param integer $itemorder
     * @return Category
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
     * Set category
     *
     * @param \Softlogo\ProductBundle\Entity\Category $category
     * @return Category
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
     * Set parent
     *
     * @param \Softlogo\ProductBundle\Entity\Category $parent
     * @return Category
     */
    public function setParent(\Softlogo\ProductBundle\Entity\Category $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \Softlogo\ProductBundle\Entity\Category 
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set media
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $media
     * @return Category
     */
    public function setMedia(\Application\Sonata\MediaBundle\Entity\Media $media = null)
    {
        $this->media = $media;

        return $this;
    }

    /**
     * Get media
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media 
     */
    public function getMedia()
    {
        return $this->media;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categories = new \Doctrine\Common\Collections\ArrayCollection();
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add categories
     *
     * @param \Softlogo\ProductBundle\Entity\Category $categories
     * @return Category
     */
    public function addCategory(\Softlogo\ProductBundle\Entity\Category $categories)
    {
		$categories->setParent($this);
        $this->categories[] = $categories;

        return $this;
    }

    /**
     * Remove categories
     *
     * @param \Softlogo\ProductBundle\Entity\Category $categories
     */
    public function removeCategory(\Softlogo\ProductBundle\Entity\Category $categories)
    {
        $this->categories->removeElement($categories);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Add products
     *
     * @param \Softlogo\ProductBundle\Entity\Product $products
     * @return Category
     */
    public function addProduct(\Softlogo\ProductBundle\Entity\Product $products)
    {
		$products->setCategory($this);
        $this->products[] = $products;

        return $this;
    }

    /**
     * Remove products
     *
     * @param \Softlogo\ProductBundle\Entity\Product $products
     */
    public function removeProduct(\Softlogo\ProductBundle\Entity\Product $products)
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
}
