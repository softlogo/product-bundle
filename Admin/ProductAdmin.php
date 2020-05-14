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

class ProductAdmin extends Admin
{
	/**
	 * @param DatagridMapper $datagridMapper
	 */
	protected function configureDatagridFilters(DatagridMapper $datagridMapper)
	{
		$datagridMapper
			->add('name')
			->add('price')
			->add('stock')
			;
	}

	/**
	 * @param ListMapper $listMapper
	 */
	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper

			//->add('firstProductMedia.media', 'sonata_type_model_list', array('template' => 'SoftlogoShopBundle:Admin:list-image.html.twig'), array('link_parameters' => array('context' => 'Foto')))
			->add('name')
			//->add('firstProductMedia.media')
			->add('price')
			->add('stock')
			->add('category')
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
			->tab('Product')
                ->with('Product', array('class' => 'col-md-12'))->end()
            ->end()
			->tab('Options')
                //->with('Shipping', array('class' => 'col-md-6'))->end()
                ->with('Parameters', array('class' => 'col-md-6'))->end()
            ->end();
		$formMapper
			->tab('Product')
				->with('Product')
					->add('name')
					->add('price')
					->add('description')
					->add('stock')
					->add('category')
					->add('productMedias', CollectionType::class, array('label' => 'Media', 'required' => false, 'by_reference' => false), array('edit' => 'inline','inline' => 'table'))
				->end()
            ->end()
			->tab('Options')
				/*
				 *->with('Shipping')
				 *    ->add('weight')
				 *    ->add('shippingPackage')
				 *    ->add('shippingCalculationType')
				 *->end()
				 */
				->with('Parameters')
					->add('productParameters', CollectionType::class, array('label' => 'Parameters', 'required' => false, 'by_reference' => false), array('edit' => 'inline','inline' => 'table'))
				->end()
			->end()

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
			->add('price')
			->add('description')
			->add('stock')
			;
	}
}
