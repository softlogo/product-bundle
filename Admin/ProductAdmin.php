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
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Softlogo\ProductBundle\Entity\Product;
use Softlogo\ProductBundle\Entity\Category;
use Softlogo\ProductBundle\Entity\CategoryRepository;
use Sonata\FormatterBundle\Form\Type\SimpleFormatterType;

class ProductAdmin extends Admin
{

	protected $datagridValues = array(
		'_page' => 1,
		'_sort_order' => 'ASC',
		'_sort_by' => 'name',
	);


	/**
	 * @param DatagridMapper $datagridMapper
	 */
	protected function configureDatagridFilters(DatagridMapper $datagridMapper)
	{
		$datagridMapper
			->add('name')
			->add('categories', null, array('show_filter'=>true), EntityType::class, array(
				'class' => Category::class,
				'query_builder' => function(CategoryRepository $er) {
					return $er->createQueryBuilder('u')
						->leftJoin('u.parent', 'p')
						->where('u.parent is not null')
						->groupBy('u.id')
						->orderBy('p.id', 'ASC')
						;
				}
		))
			;
	}

	/**
	 * @param ListMapper $listMapper
	 */
	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper

			//->add('media')
			->add('media', null, array('template' => 'SoftlogoShopBundle:Admin:list-image.html.twig'), array('link_parameters' => array('context' => 'Default')))
			//->add('id')
			->add('name')
			->add('categories')
			->add('docPL', null, array('editable' => false))
			->add('docEN', null, array('editable' => false))
			->add('docDE', null, array('editable' => false))
			->add('docDK', null, array('editable' => false))
			//->add('firstProductMedia.media')
			->add('_action', 'actions', array(
				'actions' => array(
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
			->with('General', array('class' => 'col-md-9'))->end()
			->with('Options', array('class' => 'col-md-3'))->end()
			->end()
			->tab('Variants')
			->with('Parameters', array('class' => 'col-md-12'))->end()
			->end();
		$formMapper
			->tab('Product')
			->with('General')
			->add('name')
			->add('shortDescription')
			//->add('description')
			->add('description', SimpleFormatterType::class, [
			'format' => 'richhtml',
			])
			->end()
			->with('Options')
			->add('categories')
			->add('media', ModelListType::class, array('required' => false,), array())
			->end()
			->end()
			->tab('Variants')
			->with('Parameters')
			->add('productParameters', CollectionType::class, array('label' => 'Parameters', 'required' => false, 'by_reference' => false), array('edit' => 'inline','inline' => 'table'))
			->end()
			->end()


			->tab('Documentation')
			->with('Files')
			->add('productMedias', CollectionType::class, array('label' => 'Media', 'required' => false, 'by_reference' => false), array('edit' => 'inline','inline' => 'table'))
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
