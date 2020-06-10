<?php

namespace Softlogo\ProductBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Sonata\Form\Type\CollectionType;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class CategoryAdmin extends Admin
{
	protected $datagridValues = array(
		'_page' => 1,
		'_sort_order' => 'ASC',
		'_sort_by' => 'parent.itemorder',
	);
	/**
	 * @param DatagridMapper $datagridMapper
	 */
	protected function configureDatagridFilters(DatagridMapper $datagridMapper)
	{
		$datagridMapper
			->add('name')
			->add('description')
			->add('itemorder')
			;
	}

	/**
	 * @param ListMapper $listMapper
	 */
	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper
			->add('fullName')
			->add('itemorder')
			->add('parent')
			->add('_action', 'actions', array(
				'actions' => array(
					'show' => array(),
					'edit' => array(),
					'delete' => array(),
				)
			))
			;
	}

	/**
	 * @param FormMapper $formMapper
	 */
	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper
			->add('name')
			->add('description')
			->add('itemorder')
			->add('parent')
			->add('slug')
			->add('page')
			->add('media', ModelListType::class, array('required' => false,), array())
			;
	}

	/**
	 * @param ShowMapper $showMapper
	 */
	protected function configureShowFields(ShowMapper $showMapper)
	{
		$showMapper
			->add('id')
			->add('name')
			->add('description')
			->add('itemorder')
			->add('parent')
			;
	}
}
