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

class ProductMediaAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('itemorder')
            ->add('type')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('itemorder')
            ->add('type')
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

		$choices= [
			//'' => null,
			'PDF' => 1,
			'CE' => 2,
			'DTR' => 3,
			'DWG' => 4,
			'CARD' => 5,
			];
		$context=($c=array_search($this -> getSubject() -> getType(), $choices)) ? $c : 'PDF';
        $formMapper
            ->add('language', null, array('disabled'=>true))
			->add('type', ChoiceType::class, [
			'choices'  =>$choices,
			'disabled'=>true
			])
			->add('media', ModelListType::class, array('required' => false,), array('link_parameters' => array('context' => $context )))

			;
	}

	/**
	 * @param ShowMapper $showMapper
	 */
	protected function configureShowFields(ShowMapper $showMapper)
	{
		$showMapper
			->add('id')
			->add('itemorder')
			->add('type')
			;
	}
}
