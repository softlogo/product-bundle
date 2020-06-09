<?php

namespace Softlogo\ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Softlogo\ShopBundle\Model\ProductInterface;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Translatable\Translatable;

/**
 * Product
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Softlogo\ProductBundle\Entity\ProductRepository")
 */
class Product implements  Translatable
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->productMedias = new \Doctrine\Common\Collections\ArrayCollection();


    }


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
	 * @var boolean
	 * @ORM\Column(type="boolean", nullable=true, options={"default" = true})
	 */
	private $isCard;

	 /**
	 * @var boolean
	 * @ORM\Column(type="boolean", nullable=true, options={"default" = true})
	 */
	private $isDocumentation;

	 /**
	 * @var boolean
	 * @ORM\Column(type="boolean", nullable=true, options={"default" = true})
	 */
	private $docPL;


	 /**
	 * @var boolean
	 * @ORM\Column(type="boolean", nullable=true, options={"default" = true})
	 */
	private $docEN;

	 /**
	 * @var boolean
	 * @ORM\Column(type="boolean", nullable=true, options={"default" = true})
	 */
	private $docDE;

	 /**
	 * @var boolean
	 * @ORM\Column(type="boolean", nullable=true, options={"default" = true})
	 */
	private $docDK;

    /**
     * @var \App\Application\Sonata\MediaBundle\Entity\Media
     *
     * @ORM\ManyToOne(targetEntity="\App\Application\Sonata\MediaBundle\Entity\Media")
     */
    private $media;

    /**
     * @var \App\Application\Sonata\MediaBundle\Entity\Media
     *
     * @ORM\ManyToOne(targetEntity="\App\Application\Sonata\MediaBundle\Entity\Media")
     */
    private $thumbnail;


	/**
	 * @var \ProductMedia
	 *
	 * @ORM\OneToMany(targetEntity="ProductMedia", mappedBy="product",cascade={"all"}, orphanRemoval=true)
	 * @ORM\OrderBy({"language" = "ASC", "type"="ASC"})
	 */
	private $productMedias;

	/**
	 * @var \ProductParameter
	 *
	 * @ORM\OneToMany(targetEntity="ProductParameter", mappedBy="product",cascade={"all"}, orphanRemoval=true)
	 * @ORM\OrderBy({"prodId" = "ASC"})
	 */
	private $productParameters;



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
     * @ORM\Column(name="price", type="integer", nullable=true)
     */
    private $price;

    /**
     * @var integer
     *
     * @ORM\Column(name="number", type="integer", nullable=true)
     */
    private $number;


    /**
     * @var string
     *
 	 * @Gedmo\Translatable
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
 	 * @Gedmo\Translatable
     * @ORM\Column(name="short_description", type="text", nullable=true)
     */
    private $shortDescription;



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


	public function getCategory(){
		return $this->getCategories()->first();
	}

    /**
     * Set media
     *
     * @param \App\Application\Sonata\MediaBundle\Entity\Media $media
     * @return Product
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
     *
     * @return Product
     */
    public function setShortDescription($description)
    {
        $this->shortDescription = $description;

        return $this;
    }

    /**
     *
     * @return string 
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

	public function isCard(){
		$files =Array();
		foreach($this->getProductMedias() as $pm){
		if($pm->getType()==5 && $pm->getMedia())

		return true;
		}return false;
	}
	public function isDocumentation(){
		$types=Array();
		foreach($this->getProductMedias() as $pm){
			if($pm->getMedia()){
				$types[]=$pm->getType();
			}
		}
		if(array_diff(Array(1,2,3,4),$types)==false){
		return true;
		}else return false;

	}

	private function docLang($abbr){
		$types=Array();
		foreach($this->getProductMedias() as $pm){
			$docAbbr=($docLanguage = $pm->getLanguage()) ? $docLanguage->getAbbr() : '';
			if($pm->getMedia() && $docAbbr==$abbr){
				$types[]=$pm->getType();
			}
		}
		if(array_diff(Array(1,2,3,4,5),$types)==false){
			return true;
		}else return false;

	}

	public function isDocPL(){
		return $this->docLang('pl');
	}
	public function isDocEN(){
		return $this->docLang('en');
	}
	public function isDocDE(){
		return $this->docLang('de');
	}
	public function isDocDK(){
		return $this->docLang('dk');
	}


    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function getPrice()
    {
        return 1;
    }



}
