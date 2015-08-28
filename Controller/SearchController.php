<?php

namespace Softlogo\ProductBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Astina\Bundle\FotoliaBundle\Client\Client as Client;
use Softlogo\ProductBundle\Form\SearchType;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormEvent;

class SearchController extends ProductController
{

	public function indexAction(Request $request)
	{

		$phrase=$_GET['searchType']['search'];

		$query = $this->getRepository()->searchQuery($phrase);

		$categories = $this->getCatRepository()->findBy(array('parent'=>null), array('itemorder' => 'ASC'));
		/*
		 *$paginator  = $this->get('knp_paginator');
		 *if($this->getRequest()->isMethod('GET')){
		 *    $page=$this->getRequest()->get('page');
		 *}else $page=1;
		 *$pagination = $paginator->paginate($target, $page);
		 */

		$paginator  = $this->get('knp_paginator');
		$pagination = $paginator->paginate(
			$query,
			$request->query->getInt('page', 1)/*page number*/,
			10/*limit per page*/
		);


		return $this->render('SoftlogoProductBundle:Search:index.html.twig', array(
			'categories' => $categories,
			'entities' => $pagination,
			'category' => null,
			//'pagination'=>$pagination,
		));   
	}

	public function formAction(Request $request){
		$form = $this->createForm(new SearchType(),null, array( 
			'action' => $this->generateUrl('product_search'),
			'method' => 'GET',
		));

		/** @var \Symfony\Component\HttpFoundation\RequestStack $requestStack */
		$requestStack = $this->get('request_stack');
		$masterRequest = $requestStack->getMasterRequest();
		$form->handleRequest($masterRequest);
		if ($form->isValid()) {
		//$form->handleRequest($request);
		}

		return $this->render('SoftlogoProductBundle:Search:form.html.twig', array(
			'form' => $form->createView()
		));	
	}

}
