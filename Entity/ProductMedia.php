<?php

namespace Softlogo\ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductMedia
 *
 * @ORM\Table(name="product_media")
 * @ORM\Entity
 */
class ProductMedia
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
     * @ORM\Column(name="itemorder", type="integer")
     */
    private $itemorder;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     */
    private $type;


    /**
     * @var \Application\Sonata\MediaBundle\Entity\Media
     *
     * @ORM\ManyToOne(targetEntity="\Application\Sonata\MediaBundle\Entity\Media")
     */
    private $media;

    /**
     * @var \Section
     *
     * @ORM\ManyToOne(targetEntity="Product")
     */
    private $product;



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
     * @return ProductMedias
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
     * @return ProductMedias
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
     * Set media
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $media
     * @return ProductMedia
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
     * Set product
     *
     * @param \Softlogo\ProductBundle\Entity\Product $product
     * @return ProductMedia
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
}
