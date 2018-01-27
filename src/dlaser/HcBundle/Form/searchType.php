<?php

namespace dlaser\HcBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class searchType extends AbstractType
{
	public function buildForm(FormBuilder $builder, array $options)
	{
		$builder
		->add('tipo', 'choice', array(
				'label'=> 'Opcion de busqueda:',
				'property_path' => false,
				 'choices' => array(
				 		'cedula'=> 'Cedula',
				 		'nombre'=> 'Nombre',
				 		'apellido'=> 'Apellido',),
				'multiple'=>false,
				))
						
		->add('paciente','text',array('label'=> 'Busqueda rapida:','property_path' => false, 'required'=>false))
						
		;
	}
	
	public function getName()
	{
		return 'newSearch';
	}
}
