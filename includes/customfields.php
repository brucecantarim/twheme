<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_home',
		'title' => 'Home',
		'fields' => array (
			array (
				'key' => 'field_581985625ce2e',
				'label' => 'Ícone',
				'name' => 'icon',
				'type' => 'image',
				'instructions' => 'Suba aqui o ícone para a seção em SVG.',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_582dff181d10c',
				'label' => 'Link para a Página',
				'name' => 'pagelink',
				'type' => 'page_link',
				'post_type' => array (
					0 => 'page',
				),
				'allow_null' => 0,
				'multiple' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
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
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_maquinas',
		'title' => 'Máquinas',
		'fields' => array (
			array (
				'key' => 'field_58191dbc91791',
				'label' => 'Especificações Técnicas ',
				'name' => 'specs',
				'type' => 'wysiwyg',
				'instructions' => 'Insira aqui a tabela com as especificações técnicas da máquina. Você pode tanto inserir como uma imagem, como também utilizar o shortcode [card title="Título" footer="Rodapé" table="yes" single="yes"] inserindo a tabela do tinyMCE no meio dos tags [/card].',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_581b33e73590d',
				'label' => 'Vídeos',
				'name' => 'videos',
				'type' => 'text',
				'instructions' => 'Coloque aqui os códigos de ID dos vídeos do Youtube, separados por vírgula. O limite é de 2 vídeos. Ex: zGSqyqcImsw, cR7o7Uh5zAo',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_58194ce007d1c',
				'label' => 'Galeria de Fotos',
				'name' => 'gallery',
				'type' => 'photo_gallery',
				'instructions' => 'Inclua aqui as imagens da máquina. O tamanho da galeria foi pré-determinado com um limite de 6 fotos, pelo cliente.',
			),
			array (
				'key' => 'field_58191ceb91790',
				'label' => 'Catálogos',
				'name' => 'files',
				'type' => 'file',
				'instructions' => 'Suba os arquivos relevantes a máquina. Estes ficaram disponíveis aos visitantes, para download.',
				'save_format' => 'object',
				'library' => 'uploadedTo',
			),
			array (
				'key' => 'field_5822199a76849',
				'label' => 'Imagem principal',
				'name' => 'mainimg',
				'type' => 'image',
				'instructions' => 'Coloque aqui a imagem principal do produto, isolado com fundo branco. Esta será exibida na procura e na página de outros produtos.',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'maquina',
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
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_seminovos',
		'title' => 'Seminovos',
		'fields' => array (
			array (
				'key' => 'field_58236e646b7ac',
				'label' => 'Número de Série',
				'name' => 'serialnumber',
				'type' => 'number',
				'instructions' => 'Digite aqui o número de série da máquina, para referência.',
				'default_value' => '',
				'placeholder' => 'XXXXX-x',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array (
				'key' => 'field_58236e9b6b7ad',
				'label' => 'Ano',
				'name' => 'year',
				'type' => 'number',
				'instructions' => 'Selecione o ano de fabricação da máquina.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => 1948,
				'max' => 2048,
				'step' => '',
			),
			array (
				'key' => 'field_58236f086b7ae',
				'label' => 'Horímetro',
				'name' => 'hours',
				'type' => 'number',
				'instructions' => 'Digite aqui o número aproximado de horas de uso.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => 'horas',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array (
				'key' => 'field_58236f336b7af',
				'label' => 'Local',
				'name' => 'location',
				'type' => 'text',
				'instructions' => 'Digite aqui onde a máquina se encontra.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_58236f636b7b0',
				'label' => 'Composição',
				'name' => 'composition',
				'type' => 'wysiwyg',
				'instructions' => 'Digite aqui o que integra o produto, quais os itens inclusos, e outros detalhes importantes.',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_58236f7b6b7b1',
				'label' => 'Preço',
				'name' => 'price',
				'type' => 'text',
				'instructions' => 'Digite aqui, em reais, o preço do produto.',
				'default_value' => '',
				'placeholder' => '0,00',
				'prepend' => 'R$',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_58236fc16b7b2',
				'label' => 'Galeria de Imagens',
				'name' => 'gallery',
				'type' => 'photo_gallery',
				'instructions' => 'Coloque aqui as fotos do produto. Limite de 4 fotos.',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'seminovo',
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
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_slides',
		'title' => 'Slides',
		'fields' => array (
			array (
				'key' => 'field_5819864e1fcb4',
				'label' => ' Subtítulo',
				'name' => 'subtitle',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_58236df78f189',
				'label' => 'Exibição',
				'name' => 'active',
				'type' => 'checkbox',
				'instructions' => 'Define se esse deve ser o primeiro slide em destaque. Somente um slide deve estar com essa opção ativa.',
				'choices' => array (
					'ativo' => 'Marque para ativar',
				),
				'default_value' => '',
				'layout' => 'vertical',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'slides',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}

