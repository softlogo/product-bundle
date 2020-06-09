<?php

namespace Softlogo\ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Translatable\Translatable;

/**
 * Category
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Softlogo\ProductBundle\Entity\CategoryRepository")
 */
class Category implements Translatable
{
	public function __toString(){
		if($this->getParent()){
			return $this->getParent()." : ".$this->getName();
		}else return $this->getName();
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
 	 * @Gedmo\Translatable
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
 	 * @Gedmo\Translatable
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
     * @var \App\Application\Sonata\MediaBundle\Entity\Media
     *
     * @ORM\ManyToOne(targetEntity="\App\Application\Sonata\MediaBundle\Entity\Media")
     */
    private $media;

	/**
	 * @ORM\OneToMany(targetEntity="Category", mappedBy="parent", cascade="persist", orphanRemoval=true)
	 * @ORM\OrderBy({"itemorder" = "ASC"})
     */
    private $categories;

	/**
	 * @ORM\ManyToMany(targetEntity="Product", mappedBy="categories", cascade="persist", orphanRemoval=false)
	 * @ORM\OrderBy({"number" = "ASC"})
     */
    private $products;

    /**
     * @var \Softlogo\CMSBundle\Entity\Page
     *
     * @ORM\ManyToMany(targetEntity="\Softlogo\CMSBundle\Entity\Page", inversedBy="category")
     */
    private $page;

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
     * @param \App\Application\Sonata\MediaBundle\Entity\Media $media
     * @return Category
     */
    public function setMedia(\App\Application\Sonata\MediaBundle\Entity\Media $media = null)
    {
        $this->media = $media;

        return $this;
    }

    /**
     * Get media
     *
     * @return \App\Application\Sonata\MediaBundle\Entity\Media 
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
     * @param \Softlogo\ProductBundle\Entity\Product $product
     * @return Category
     */
    public function addProduct(\Softlogo\ProductBundle\Entity\Product $product)
    {
		//$products->setCategory($this);
        $this->products[] = $product;

        return $this;
    }

    /**
     * Remove products
     *
     * @param \Softlogo\ProductBundle\Entity\Product $product
     */
    public function removeProduct(\Softlogo\ProductBundle\Entity\Product $product)
    {
        $this->products->removeElement($product);
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


    /**
     * Get page
     *
     * @return \Softlogo\CMSBundle\Entity\Page
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Add page
     *
     * @param \Softlogo\CMSBundle\Entity\Page $page
     *
     * @return Category
     */
    public function addPage(\Softlogo\CMSBundle\Entity\Page $page)
    {
        $this->page[] = $page;

        return $this;
    }

    /**
     * Remove page
     *
     * @param \Softlogo\CMSBundle\Entity\Page $page
     */
    public function removePage(\Softlogo\CMSBundle\Entity\Page $page)
    {
        $this->page->removeElement($page);
    }


}
