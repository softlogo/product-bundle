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
     * @ORM\Column(name="itemorder", type="integer", nullable=true)
     */
    private $itemorder;

    /**
     * @var integer
     *
     * @ORM\Column(name="type", type="integer", nullable=true)
     */
    private $type;


    /**
     * @var \App\Application\Sonata\MediaBundle\Entity\Media
     *
     * @ORM\ManyToOne(targetEntity="\App\Application\Sonata\MediaBundle\Entity\Media")
     */
    private $media;

    /**
     * @var \Section
     *
     * @ORM\ManyToOne(targetEntity="Product")
     */
    private $product;

    /**
     *
     * @ORM\ManyToOne(targetEntity="\Softlogo\CMSBundle\Entity\Language")
     */
    private $language;

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
     * @param \App\Application\Sonata\MediaBundle\Entity\Media $media
     * @return ProductMedia
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


    public function setLanguage(\Softlogo\CMSBundle\Entity\Language $language = null)
    {
        $this->language = $language;

        return $this;
    }

    public function getLanguage()
    {
        return $this->language;
    }












}
