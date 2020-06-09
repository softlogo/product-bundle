<?php

namespace Softlogo\ProductBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Softlogo\ProductBundle\Entity\Product;
use Softlogo\ProductBundle\Form\ProductType;
use Softlogo\ProductBundle\Form\SearchType;

/**
 * Product controller.
 *
 */
class ProductController extends Controller
{
	public function getCatRepository()
	{
		$em = $this->getDoctrine()->getManager();
		return $em->getRepository('SoftlogoProductBundle:Category');
	}

	public function getRepository()
	{
		$em = $this->getDoctrine()->getManager();
		return $em->getRepository('SoftlogoProductBundle:Product');
	}

	/**
	 * Lists all Product entities.
	 *
	 */
	public function indexAction(Request $request)
	{
/*
 *        $em = $this->getDoctrine()->getManager();
 *
 *        $entities = $em->getRepository('SoftlogoProductBundle:Product')->findAll();
 *
 *        $paginator  = $this->get('knp_paginator');
 *        $pagination = $paginator->paginate(
 *            $entities,
 *            $request->query->get('page', 1)[>page number<],
 *            12[>limit per page<]
 *        );
 */
		$em    = $this->get('doctrine.orm.entity_manager');
		$dql   = "SELECT a FROM SoftlogoProductBundle:Product a";
		$query = $em->createQuery($dql);

		$paginator  = $this->get('knp_paginator');
		$pagination = $paginator->paginate(
			$query,
			$request->query->getInt('page', 1)/*page number*/,
			10/*limit per page*/
		);



		$categories = $this->getCatRepository()->findBy(array('parent'=>null), array('itemorder' => 'ASC'));
		return $this->render('SoftlogoProductBundle:Product:index.html.twig', array(
			'entities' => $pagination,
			'categories' => $categories,
			'category' => null,
			'categoryMain' => null,
		));
	}


	public function garnitureAction(Request $request)
	{
		$em 		= $this->getDoctrine()->getManager();
		$locale 	= $request->getLocale();
		$language 	= $em->getRepository('SoftlogoCMSBundle:Language')->findOneBy(array('abbr'=>$locale));
		$entities	= $em->getRepository('SoftlogoCMSBundle:Article')->findBy(array('section' => 1), array());
		return $this->render('SoftlogoProductBundle:Product:garniture.html.twig', array(
			'entities' => $entities,
		));
	}



	/**
	 * Finds and displays a Product entity.
	 *
	 */
	public function showAction(Request $request, $id)
	{
		$em = $this->getDoctrine()->getManager();

		$entity = $em->getRepository('SoftlogoProductBundle:Product')->find($id);
		$categories = $this->getCatRepository()->findBy(array(), array('itemorder' => 'ASC'));

		if (!$entity) {
			throw $this->createNotFoundException('Unable to find Product entity.');
		}

		$shop=$this->get('softlogo_shop');	
		$shop->initProductForm($request, $entity);
		//$shop->setProduct($entity);
		$basket=$shop->getBasket();
		if($shop->isValid()==true){
			return $this->redirect($this->generateUrl('softlogo_shop.basket'));	
		}

		return $this->render('SoftlogoProductBundle:Product:show.html.twig', array(
			'entity'      => $entity,
			'categories' => $categories,
			'form' => $shop->getProductForm(),
		));
	}
	public function findByCategoryAction(Request $request,$id){
		$category= $this->getCatRepository()->findOneBy(array('id'=>$id), array());
		$categories = $this->getCatRepository()->findBy(array('parent'=>null), array('itemorder' => 'ASC'));
		$query = $this->getRepository()->findByCategoryQuery($id);

		$paginator  = $this->get('knp_paginator');
		$pagination = $paginator->paginate(
			$query,
			$request->query->getInt('page', 1)/*page number*/,
			10/*limit per page*/
		);


		return $this->render('SoftlogoProductBundle:Product:index.html.twig', array(
			'entities' => $pagination,
			'categories' => $categories,
			'category' => $category,
			'categoryMain' => $category->getParent(),
		));
	}




}
