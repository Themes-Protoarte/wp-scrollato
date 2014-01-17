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







	register_field_group(array (
		'id' => 'acf_author-page-colors',
		'title' => 'Author page colors',
		'fields' => array (
			array (
				'key' => 'field_52d90d3af023e',
				'label' => 'Background color',
				'name' => 'bgcolor',
				'type' => 'color_picker',
				'instructions' => 'Choose a color for the background',
				'default_value' => '',
			),
			array (
				'key' => 'field_52d90dc1d7e5b',
				'label' => 'Text color',
				'name' => 'text_color',
				'type' => 'color_picker',
				'instructions' => 'Choose a color for the text',
				'default_value' => '',
			),
			array (
				'key' => 'field_52d90dd0d7e5c',
				'label' => 'Link color',
				'name' => 'link_color',
				'type' => 'color_picker',
				'instructions' => 'Choose a color for the links',
				'default_value' => '',
			),
			array (
				'key' => 'field_52d90de4d7e5d',
				'label' => 'Link (hover) color',
				'name' => 'link_color_hover',
				'type' => 'color_picker',
				'instructions' => 'Choose a color for the link-hover',
				'default_value' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'ef_user',
					'operator' => '==',
					'value' => 'all',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_page-colors',
		'title' => 'Page colors',
		'fields' => array (
			array (
				'key' => 'field_52d90ac24f3dd',
				'label' => 'Background color',
				'name' => 'bgcolor',
				'type' => 'color_picker',
				'instructions' => 'Choose the background colour of the page.',
				'default_value' => '',
			),
			array (
				'key' => 'field_52d90b0a4f3de',
				'label' => 'Text color',
				'name' => 'text_color',
				'type' => 'color_picker',
				'instructions' => 'Choose the color of the text',
				'default_value' => '',
			),
			array (
				'key' => 'field_52d90b1e4f3df',
				'label' => 'Link color',
				'name' => 'link_color',
				'type' => 'color_picker',
				'instructions' => 'Choose the color of the links',
				'default_value' => '',
			),
			array (
				'key' => 'field_52d90b324f3e0',
				'label' => 'Link color (hover)',
				'name' => 'link_color_hover',
				'type' => 'color_picker',
				'instructions' => 'Choose the color of the link:hover',
				'default_value' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'default',
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
				1 => 'custom_fields',
				2 => 'discussion',
				3 => 'comments',
				4 => 'revisions',
				5 => 'format',
				6 => 'featured_image',
				7 => 'categories',
				8 => 'tags',
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_nav-colors',
		'title' => 'Nav colors',
		'fields' => array (
			array (
				'key' => 'field_52d90c64c4a25',
				'label' => 'Nav background color',
				'name' => 'nav_bgcolor',
				'type' => 'color_picker',
				'instructions' => 'Choose the background color of the nav menu',
				'default_value' => '',
			),
			array (
				'key' => 'field_52d90c7bc4a26',
				'label' => 'Nav link color',
				'name' => 'nav_link_color',
				'type' => 'color_picker',
				'instructions' => 'Choose the color of the nav links',
				'default_value' => '',
			),
			array (
				'key' => 'field_52d90ca5c4a27',
				'label' => 'Nav link (hover) color',
				'name' => 'nav_link_color_hover',
				'type' => 'color_picker',
				'instructions' => 'Choose the color of the nav link-hover',
				'default_value' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'default',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 1,
	));
}


?>
