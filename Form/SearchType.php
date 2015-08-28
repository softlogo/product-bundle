<?php
namespace Softlogo\ProductBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Constraints\NotBlank;
class SearchType extends AbstractType {

	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('search', 'text', array(
				'constraints' => new NotBlank(),
				'label'=>'Słowo kluczowe',
				'attr' => array(
					'input_group' => array(
						'size' => 'standard'
					)
				)
			))
			->add('submit', 'submit', array(
				'label' => 'Szukaj'
			))

			;
	}

    public function getDefaultOptions(array $options)
    {
        return array(
            'csrf_protection' => false
        );
    }


	public function getName()
	{
		return 'searchType';
	}
}
