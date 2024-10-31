<?php
namespace MyElementorAddons\Elementor\Widget;

use Elementor\Controls_Manager;
use Elementor\Control_Media;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Icons_Manager;
use Elementor\Core\Schemes\Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Flip_Box extends Base {

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Flip Box', 'my-elementor-addons' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-flip-box';
	}

	/**
	 * Retrieve styles dependencies
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget styles dependencies.
	 */
	public function get_style_depends() {
		return [ 'flip-box' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function register_content_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Front Side', 'my-elementor-addons' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'front_icon_type',
			[
				'label'          => __( 'Media Type', 'my-elementor-addons' ),
				'type'           => Controls_Manager::CHOOSE,
				'label_block'    => false,
				'default'        => 'icon',
				'options'        => [
					'none'  => [
						'title' => __( 'None', 'my-elementor-addons' ),
						'icon'  => 'eicon-close',
					],
					'icon'  => [
						'title' => __( 'Icon', 'my-elementor-addons' ),
						'icon'  => 'eicon-star',
					],
					'image' => [
						'title' => __( 'Image', 'my-elementor-addons' ),
						'icon'  => 'eicon-image',
					],
				],
				'toggle'         => false,
				'style_transfer' => true,
			]
		);

		$this->add_control(
			'front_image',
			[
				'type'      => Controls_Manager::MEDIA,
				'default'   => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'front_icon_type' => 'image',
				],
				'dynamic'   => [
					'active' => true,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name'      => 'front_thumbnail',
				'default'   => 'medium_large',
				'separator' => 'none',
				'exclude'   => [
					'full',
					'large',
					'shop_catalog',
					'shop_single',
					'shop_thumbnail',
				],
				'condition' => [
					'front_icon_type' => 'image',
				],
			]
		);

		$this->add_control(
			'front_selected_icon',
			[
				'type'        => Controls_Manager::ICONS,
				'label_block' => true,
				'default'     => [
					'value'   => 'fas fa-smile',
					'library' => 'fa-solid',
				],
				'condition'   => [
					'front_icon_type' => 'icon',
				],
			]
		);

		$this->add_control(
			'front_title',
			[
				'label'       => __( 'Title', 'my-elementor-addons' ),
				'label_block' => true,
				'separator'   => 'before',
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Flip Box Title', 'my-elementor-addons' ),
				'placeholder' => __( 'Title', 'my-elementor-addons' ),
				'dynamic'     => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'front_description',
			[
				'label'   => __( 'Description', 'my-elementor-addons' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => __( 'My Flip box description goes here', 'my-elementor-addons' ),
				'rows'    => 5,
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'front_title_tag',
			[
				'label'   => __( 'Title HTML Tag', 'my-elementor-addons' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'h1' => [
						'front_title' => __( 'H1', 'my-elementor-addons' ),
						'icon'        => 'eicon-editor-h1',
					],
					'h2' => [
						'front_title' => __( 'H2', 'my-elementor-addons' ),
						'icon'        => 'eicon-editor-h2',
					],
					'h3' => [
						'front_title' => __( 'H3', 'my-elementor-addons' ),
						'icon'        => 'eicon-editor-h3',
					],
					'h4' => [
						'front_title' => __( 'H4', 'my-elementor-addons' ),
						'icon'        => 'eicon-editor-h4',
					],
					'h5' => [
						'front_title' => __( 'H5', 'my-elementor-addons' ),
						'icon'        => 'eicon-editor-h5',
					],
					'h6' => [
						'title' => __( 'H6', 'my-elementor-addons' ),
						'icon'  => 'eicon-editor-h6',
					],
				],
				'default' => 'h4',
				'toggle'  => false,
			]
		);

		$this->add_responsive_control(
			'front_text_align',
			[
				'label'     => __( 'Alignment', 'my-elementor-addons' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => [
					'left'   => [
						'title' => __( 'Left', 'my-elementor-addons' ),
						'icon'  => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'my-elementor-addons' ),
						'icon'  => 'fa fa-align-center',
					],
					'right'  => [
						'title' => __( 'Right', 'my-elementor-addons' ),
						'icon'  => 'fa fa-align-right',
					],
				],
				'toggle'    => true,
				'selectors' => [
					'{{WRAPPER}} .my-flip-front' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_back',
			[
				'label' => __( 'Back Side', 'my-elementor-addons' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'back_icon_type',
			[
				'label'          => __( 'Media Type', 'my-elementor-addons' ),
				'type'           => Controls_Manager::CHOOSE,
				'label_block'    => false,
				'default'        => 'icon',
				'options'        => [
					'none'  => [
						'title' => __( 'None', 'my-elementor-addons' ),
						'icon'  => 'eicon-close',
					],
					'icon'  => [
						'title' => __( 'Icon', 'my-elementor-addons' ),
						'icon'  => 'eicon-star',
					],
					'image' => [
						'title' => __( 'Image', 'my-elementor-addons' ),
						'icon'  => 'eicon-image',
					],
				],
				'toggle'         => false,
				'style_transfer' => true,
			]
		);

		$this->add_control(
			'back_image',
			[
				'type'      => Controls_Manager::MEDIA,
				'default'   => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'back_icon_type' => 'image',
				],
				'dynamic'   => [
					'active' => true,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name'      => 'back_thumbnail',
				'default'   => 'medium_large',
				'separator' => 'none',
				'exclude'   => [
					'full',
					'large',
					'shop_catalog',
					'shop_single',
					'shop_thumbnail',
				],
				'condition' => [
					'back_icon_type' => 'image',
				],
			]
		);

		$this->add_control(
			'back_selected_icon',
			[
				'type'        => Controls_Manager::ICONS,
				'label_block' => true,
				'default'     => [
					'value'   => 'fas fa-smile',
					'library' => 'fa-solid',
				],
				'condition'   => [
					'back_icon_type' => 'icon',
				],
			]
		);

		$this->add_control(
			'back_title',
			[
				'label'       => __( 'Title', 'my-elementor-addons' ),
				'label_block' => true,
				'separator'   => 'before',
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Flip Box Title', 'my-elementor-addons' ),
				'placeholder' => __( 'Title', 'my-elementor-addons' ),
				'dynamic'     => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'back_description',
			[
				'label'   => __( 'Description', 'my-elementor-addons' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => __( 'My Flip box description goes here', 'my-elementor-addons' ),
				'rows'    => 5,
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'back_title_tag',
			[
				'label'   => __( 'Title HTML Tag', 'my-elementor-addons' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'h1' => [
						'back_title' => __( 'H1', 'my-elementor-addons' ),
						'icon'       => 'eicon-editor-h1',
					],
					'h2' => [
						'back_title' => __( 'H2', 'my-elementor-addons' ),
						'icon'       => 'eicon-editor-h2',
					],
					'h3' => [
						'back_title' => __( 'H3', 'my-elementor-addons' ),
						'icon'       => 'eicon-editor-h3',
					],
					'h4' => [
						'back_title' => __( 'H4', 'my-elementor-addons' ),
						'icon'       => 'eicon-editor-h4',
					],
					'h5' => [
						'back_title' => __( 'H5', 'my-elementor-addons' ),
						'icon'       => 'eicon-editor-h5',
					],
					'h6' => [
						'title' => __( 'H6', 'my-elementor-addons' ),
						'icon'  => 'eicon-editor-h6',
					],
				],
				'default' => 'h4',
				'toggle'  => false,
			]
		);

		$this->add_responsive_control(
			'back_text_align',
			[
				'label'     => __( 'Alignment', 'my-elementor-addons' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => [
					'left'   => [
						'title' => __( 'Left', 'my-elementor-addons' ),
						'icon'  => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'my-elementor-addons' ),
						'icon'  => 'fa fa-align-center',
					],
					'right'  => [
						'title' => __( 'Right', 'my-elementor-addons' ),
						'icon'  => 'fa fa-align-right',
					],
				],
				'toggle'    => true,
				'selectors' => [
					'{{WRAPPER}} .my-flip-back' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'back_button',
			[
				'label'       => __( 'Button Text', 'my-elementor-addons' ),
				'type'        => Controls_Manager::TEXT,
				'separator'   => 'before',
				'default'     => __( 'Button Text', 'my-elementor-addons' ),
				'placeholder' => __( 'Type button text here', 'my-elementor-addons' ),
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'back_button_link',
			[
				'label'       => __( 'Link', 'my-elementor-addons' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => __( 'https://example.com/', 'my-elementor-addons' ),
				'dynamic'     => [
					'active' => true,
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_settings',
			[
				'label' => __( 'Settings', 'my-elementor-addons' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'flip_position',
			[
				'label'          => __( 'Flip Direction', 'my-elementor-addons' ),
				'type'           => Controls_Manager::CHOOSE,
				'default'        => 'left-right',
				'label_block'    => false,
				'options'        => [
					'right-left' => [
						'title' => __( 'Left To Right', 'my-elementor-addons' ),
						'icon'  => 'eicon-h-align-left',
					],
					'bottom-top' => [
						'title' => __( 'Bottom To Top', 'my-elementor-addons' ),
						'icon'  => 'eicon-v-align-top',
					],
					'left-right' => [
						'title' => __( 'Left To Right', 'my-elementor-addons' ),
						'icon'  => 'eicon-h-align-right',
					],
				],
				'toggle'         => false,
				'default'        => 'right-left',
				'prefix_class'   => 'my-flip--',
				'style_transfer' => true,
			]
		);

		$this->end_controls_section();
	}

	protected function register_style_controls() {
		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Flip Box', 'my-elementor-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'flip_border',
				'selector' => '{{WRAPPER}} .my-flip-side',
			]
		);

		$this->add_responsive_control(
			'flip_border_radius',
			[
				'label'      => __( 'Border Radius', 'my-elementor-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} .my-flip-side' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'flip_box_shadow',
				'exclude'  => [
					'box_shadow_position',
				],
				'selector' => '{{WRAPPER}} .my-flip-side',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_front_side',
			[
				'label' => __( 'Front Side', 'my-elementor-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'front_media_padding',
			[
				'label'      => __( 'Padding', 'my-elementor-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} .my-flip-details' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'front_flip_background',
				'label'    => __( 'Background', 'my-elementor-addons' ),
				'types'    => ['classic', 'gradient'],
				'selector' => '{{WRAPPER}} .my-flip-details',
			]
		);

		$this->add_control(
			'front_title_image',
			[
				'type'      => Controls_Manager::HEADING,
				'label'     => __( 'Icon / Image', 'my-elementor-addons' ),
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'front_icon_size',
			[
				'label'      => __( 'Icon Size', 'my-elementor-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range'      => [
					'px' => [
						'min' => 10,
						'max' => 300,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .my-flip-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'front_icon_type' => 'icon',
				],
			]
		);

		$this->add_control(
			'front_icon_color',
			[
				'label'     => __( 'Icon Color', 'my-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .my-flip-icon' => 'color: {{VALUE}}',
				],
				'condition' => [
					'front_icon_type' => 'icon',
				],
			]
		);

		$this->add_responsive_control(
			'front_image_width',
			[
				'label'      => __( 'Image Polygon', 'my-elementor-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range'      => [
					'px' => [
						'min' => 1,
						'max' => 240,
					],
					'%'  => [
						'min' => 1,
						'max' => 100,
					],
				],
				'default'    => [
					'unit' => '%',
					'size' => 85,
				],
				'selectors'  => [
					'{{WRAPPER}} .my-flip-image' => 'clip-path: polygon(0 0, 100% 0, 100% {{SIZE}}{{UNIT}}, 0 100%);',
				],
				'condition'  => [
					'front_icon_type' => 'image',
				],
			]
		);

		$this->add_responsive_control(
			'front_image_height',
			[
				'label'      => __( 'Image Height', 'my-elementor-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range'      => [
					'px' => [
						'min' => 100,
						'max' => 400,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .my-flip-image' => 'height: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'front_icon_type' => 'image',
				],
			]
		);

		$this->add_responsive_control(
			'front_media_spacing',
			[
				'label'      => __( 'Bottom Spacing', 'my-elementor-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors'  => [
					'{{WRAPPER}} .my-flip-icon' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
				],
				'condition'  => [
					'front_icon_type' => 'icon',
				],
			]
		);

		$this->add_control(
			'front_title_heading',
			[
				'type'      => Controls_Manager::HEADING,
				'label'     => __( 'Title', 'my-elementor-addons' ),
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'front_title_spacing',
			[
				'label'      => __( 'Bottom Spacing', 'my-elementor-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors'  => [
					'{{WRAPPER}} .my-flip-heading' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'front_title_color',
			[
				'label'     => __( 'Text Color', 'my-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .my-flip-heading' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'front_title_typography',
				'label'    => __( 'Typography', 'my-elementor-addons' ),
				'selector' => '{{WRAPPER}} .my-flip-heading',
				'scheme'   => Typography::TYPOGRAPHY_1,
			]
		);

		$this->add_control(
			'front_description_heading',
			[
				'label'     => __( 'Description', 'my-elementor-addons' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'front_description_color',
			[
				'label'     => __( 'Text Color', 'my-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .my-flip-text > p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'front_description_typography',
				'label'    => __( 'Typography', 'my-elementor-addons' ),
				'selector' => '{{WRAPPER}} .my-flip-text > p',
				'scheme'   => Typography::TYPOGRAPHY_2,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_back_side',
			[
				'label' => __( 'Back Side', 'my-elementor-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'back_media_padding',
			[
				'label'      => __( 'Padding', 'my-elementor-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} .my-flip-back-details' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'back_flip_background',
				'label'    => __( 'Background', 'my-elementor-addons' ),
				'types'    => ['classic', 'gradient'],
				'selector' => '{{WRAPPER}} .my-flip-back-details',
			]
		);

		$this->add_control(
			'back_title_image',
			[
				'type'      => Controls_Manager::HEADING,
				'label'     => __( 'Icon / Image', 'my-elementor-addons' ),
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'back_icon_size',
			[
				'label'      => __( 'Icon Size', 'my-elementor-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range'      => [
					'px' => [
						'min' => 10,
						'max' => 300,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .my-flip-back-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'back_icon_type' => 'icon',
				],
			]
		);

		$this->add_control(
			'back_icon_color',
			[
				'label'     => __( 'Icon Color', 'my-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .my-flip-back-icon' => 'color: {{VALUE}}',
				],
				'condition' => [
					'back_icon_type' => 'icon',
				],
			]
		);

		$this->add_responsive_control(
			'back_image_width',
			[
				'label'      => __( 'Image Polygon', 'my-elementor-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range'      => [
					'px' => [
						'min' => 1,
						'max' => 240,
					],
					'%'  => [
						'min' => 1,
						'max' => 100,
					],
				],
				'default'    => [
					'unit' => '%',
					'size' => 85,
				],
				'selectors'  => [
					'{{WRAPPER}} .my-flip-back-image' => 'clip-path: polygon(0 0, 100% 0, 100% {{SIZE}}{{UNIT}}, 0 100%);',
				],
				'condition'  => [
					'back_icon_type' => 'image',
				],
			]
		);

		$this->add_responsive_control(
			'back_image_height',
			[
				'label'      => __( 'Image Height', 'my-elementor-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range'      => [
					'px' => [
						'min' => 100,
						'max' => 400,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .my-flip-back-image' => 'height: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'back_icon_type' => 'image',
				],
			]
		);

		$this->add_responsive_control(
			'back_media_spacing',
			[
				'label'      => __( 'Bottom Spacing', 'my-elementor-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors'  => [
					'{{WRAPPER}} .my-flip-back-icon' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
				],
				'condition'  => [
					'back_icon_type' => 'icon',
				],
			]
		);

		$this->add_control(
			'back_title_heading',
			[
				'label'     => __( 'Title', 'my-elementor-addons' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'back_title_spacing',
			[
				'label'      => __( 'Bottom Spacing', 'my-elementor-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors'  => [
					'{{WRAPPER}} .my-flip-back-heading' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'back_title_color',
			[
				'label'     => __( 'Text Color', 'my-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .my-flip-back-heading' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'back_title_typography',
				'label'    => __( 'Typography', 'my-elementor-addons' ),
				'selector' => '{{WRAPPER}} .my-flip-back-heading',
				'scheme'   => Typography::TYPOGRAPHY_3,
			]
		);

		$this->add_control(
			'back_description_heading',
			[
				'label'     => __( 'Description', 'my-elementor-addons' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'back_description_color',
			[
				'label'     => __( 'Text Color', 'my-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .my-flip-back-text > p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'back_description_typography',
				'label'    => __( 'Typography', 'my-elementor-addons' ),
				'selector' => '{{WRAPPER}} .my-flip-back-text > p',
				'scheme'   => Typography::TYPOGRAPHY_4,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_button',
			[
				'label' => __( 'Button', 'my-elementor-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'link_padding',
			[
				'label'      => __( 'Padding', 'my-elementor-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors'  => [
					'{{WRAPPER}} .my-flip-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'btn_typography',
				'selector' => '{{WRAPPER}} .my-flip-btn',
				'scheme'   => Typography::TYPOGRAPHY_4,
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'button_border',
				'selector' => '{{WRAPPER}} .my-flip-btn',
			]
		);

		$this->add_control(
			'button_border_radius',
			[
				'label'      => __( 'Border Radius', 'my-elementor-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} .my-flip-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'button_box_shadow',
				'selector' => '{{WRAPPER}} .my-flip-btn',
			]
		);

		$this->add_control(
			'hr',
			[
				'type'  => Controls_Manager::DIVIDER,
				'style' => 'thick',
			]
		);

		$this->start_controls_tabs( 'tabs_button' );

		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => __( 'Normal', 'my-elementor-addons' ),
			]
		);

		$this->add_control(
			'link_color',
			[
				'label'     => __( 'Text Color', 'my-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .my-flip-btn' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_bg_color',
			[
				'label'     => __( 'Background Color', 'my-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .my-flip-btn' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => __( 'Hover', 'my-elementor-addons' ),
			]
		);

		$this->add_control(
			'link_hover_color',
			[
				'label'     => __( 'Text Color', 'my-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .my-flip-btn:hover, {{WRAPPER}} .my-flip-btn:focus' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_bg_color',
			[
				'label'     => __( 'Background Color', 'my-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .my-flip-btn:hover, {{WRAPPER}} .my-flip-btn:focus' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_border_color',
			[
				'label'     => __( 'Border Color', 'my-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'condition' => [
					'button_border_border!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .my-flip-btn:hover, {{WRAPPER}} .my-flip-btn:focus' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'front_title', 'class', 'my-flip-heading' );
		$this->add_inline_editing_attributes( 'front_description', 'none' );
		$this->add_render_attribute( 'front_description', 'class', 'my-flip-text' );

        $this->add_inline_editing_attributes( 'back_title', 'none' );
        $this->add_render_attribute( 'back_title', 'class', 'my-flip-back-heading' );
        $this->add_inline_editing_attributes( 'back_description', 'none' );
        $this->add_render_attribute( 'back_description', 'class', 'my-flip-back-text' );

		$this->add_inline_editing_attributes( 'back_button', 'none' );
		$this->add_render_attribute( 'back_button', 'class', 'my-flip-btn' );
		$this->add_render_attribute( 'back_button', 'href', esc_url( $settings['back_button_link']['url'] ) );

		if ( ! empty( $settings['back_button_link']['is_external'] ) ) {
            $this->add_render_attribute( 'back_button', 'target', '_blank' );
        }

        if ( ! empty( $settings['back_button_link']['nofollow'] ) ) {
            $this->add_render_attribute( 'back_button', 'rel', 'nofollow' );
        }
		?>

        <div class="my-flip-container">
            <div class="my-flip-inner-wrapper">
                <div class="my-flip-side my-flip-front">
                    <?php if ( isset ( $settings['front_image']['id'] ) && isset( $settings['front_image']['url'] ) ):
                        $this->add_render_attribute( 'front_image', 'src', $settings['front_image']['url'] );
                        $this->add_render_attribute( 'front_image', 'alt', Control_Media::get_image_alt( $settings['front_image'] ) );
                        $this->add_render_attribute( 'front_image', 'title', Control_Media::get_image_title( $settings['front_image'] ) );
                        ?>
                        <div class="my-flip-image">
                            <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'large', 'front_image' ); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($settings['front_title']) || !empty($settings['front_description'])) { ?>
                        <div class="my-flip-details">
                            <?php if ( ! empty( $settings['front_selected_icon'] ) ) { ?>
                                <div class="my-flip-icon">
                                    <?php Icons_Manager::render_icon( $settings['front_selected_icon'], [ 'aria-hidden' => 'true' ] );?>
                                </div>
                            <?php } ?>

                            <?php if ( $settings['front_title'] ) {
                                printf( '<%1$s %2$s>%3$s</%1$s>',
                                    tag_escape( $settings['front_title_tag'] ),
                                    $this->get_render_attribute_string( 'front_title' ),
                                    wp_kses_post( $settings['front_title' ] )
                                );
                            } ?>

                            <?php if ( $settings['front_description'] ) { ?>
                                <div <?php echo $this->get_render_attribute_string( 'front_description' ); ?>>
									<p><?php echo esc_html( $settings['front_description'] ); ?></p>
								</div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>

                <div class="my-flip-side my-flip-back">
                    <?php if ( isset( $settings['back_image']['id'] ) && isset( $settings['back_image']['url'] ) ) :
                        $this->add_render_attribute( 'back_image', 'src', $settings['back_image']['url'] );
                        $this->add_render_attribute( 'back_image', 'alt', Control_Media::get_image_alt( $settings['back_image'] ) );
                        $this->add_render_attribute( 'back_image', 'title', Control_Media::get_image_title( $settings['back_image'] ) );
                        ?>
                        <div class="my-flip-back-image">
                            <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'large', 'back_image' ); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($settings['back_title']) || !empty($settings['back_description'])) { ?>
                        <div class="my-flip-back-details">
                            <?php if ( ! empty( $settings['back_selected_icon'] ) ) { ?>
                                <div class="my-flip-back-icon">
                                    <?php Icons_Manager::render_icon( $settings['back_selected_icon'], [ 'aria-hidden' => 'true' ] );?>
                                </div>
                            <?php } ?>

                            <?php if ( $settings['back_title'] ) {
                                printf( '<%1$s %2$s>%3$s</%1$s>',
                                    tag_escape( $settings['back_title_tag'] ),
                                    $this->get_render_attribute_string( 'back_title' ),
                                    wp_kses_post( $settings['back_title' ] )
                                );
                            } ?>

                            <?php if ( $settings['back_description'] ) { ?>
                                <div <?php echo $this->get_render_attribute_string( 'back_description' ); ?>>
									<p><?php echo esc_html( $settings['back_description'] ); ?></p>
								</div>
                            <?php } ?>

                            <?php if($settings['back_button']) { ?>
                                <div class="my-flip-btn-box">
                                    <a <?php $this->print_render_attribute_string( 'back_button' ); ?>>
										<?php echo esc_html( $settings['back_button'] ); ?>
									</a>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
		<?php
	}
}
