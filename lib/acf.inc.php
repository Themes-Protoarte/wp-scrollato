<?php

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_custom-fields',
		'title' => 'Custom fields',
		'fields' => array (
			array (
				'key' => 'field_52d7ad36b9312',
				'label' => 'Position',
				'name' => 'position',
				'type' => 'number',
				'instructions' => 'Insert the position of the block',
				'required' => 1,
				'default_value' => 0,
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array (
				'key' => 'field_52d79a1eca0a0',
				'label' => 'Skrollr start',
				'name' => 'data-start',
				'type' => 'text',
				'instructions' => 'CSS to instruct skrollr to animate the block from its top.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_52d79a4aca0a1',
				'label' => 'Skrollr end',
				'name' => 'data-end',
				'type' => 'text',
				'instructions' => 'CSS to instruct skrollr to animate the block to its bottom.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_52d79a8d9d59b',
				'label' => 'Hidden block',
				'name' => 'hidden',
				'type' => 'radio',
				'instructions' => 'Hidden block?',
				'required' => 1,
				'choices' => array (
					1 => 'Yes',
					0 => 'No',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 0,
				'layout' => 'vertical',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'block',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
				0 => 'excerpt',
				1 => 'featured_image',
				2 => 'categories',
				3 => 'tags',
			),
		),
		'menu_order' => 0,
	));
}

?>
