<?php
// src/EventListener/SearchIndexer.php
namespace Softlogo\ProductBundle\EventListener;

use Softlogo\ProductBundle\Entity\Product;
use Softlogo\CMSBundle\Entity\Language;
use Softlogo\ProductBundle\Entity\ProductMedia;
use Doctrine\Persistence\Event\LifecycleEventArgs;

class ProductPreparer
{
    // the listener methods receive an argument which gives you access to
    // both the entity object of the event and the entity manager itself
    public function prePersist(LifecycleEventArgs $args)
    {
        $product = $args->getObject();

        // if this listener only applies to certain entity types,
        // add some code to check the entity type as early as possible
		if (!$product instanceof Product) {
			return;
		}



        $em = $args->getObjectManager();
		$langRep=$em->getRepository('SoftlogoCMSBundle:Language');
		$languages= ['pl', 'en', 'de', 'dk'];
		foreach($languages as $abbr){
		$lang = $langRep->findOneByAbbr($abbr);
		$pdf=new ProductMedia();
		$pdf->setType(1);
		$pdf->setLanguage($lang);

		$ce=new ProductMedia();
		$ce->setType(2);
		$ce->setLanguage($lang);

		$dtr=new ProductMedia();
		$dtr->setType(3);
		$dtr->setLanguage($lang);

		$dwg=new ProductMedia();
		$dwg->setType(4);
		$dwg->setLanguage($lang);

		$card=new ProductMedia();
		$card->setType(5);
		$card->setLanguage($lang);

		$product->addProductMedia($pdf);
		$product->addProductMedia($ce);
		$product->addProductMedia($dtr);
		$product->addProductMedia($dwg);
		$product->addProductMedia($card);

		}



    }
}
