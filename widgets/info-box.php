<?php
namespace MyElementorAddons\Elementor\Widget;

use Elementor\Controls_Manager;
use Elementor\Control_Media;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Icons_Manager;
use Elementor\Core\Schemes\Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Info_Box extends Base {

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
		return __( 'Info Box', 'my-elementor-addons' );
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
		return 'eicon-info-box';
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
		return [ 'info-box' ];
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
				'label' => __( 'Icon / Image', 'my-elementor-addons' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'type',
			[
				'label'          => __( 'Media Type', 'my-elementor-addons' ),
				'type'           => Controls_Manager::CHOOSE,
				'label_block'    => false,
				'options'        => [
					'icon'  => [
						'title' => __( 'Icon', 'my-elementor-addons' ),
						'icon'  => 'fa fa-smile-o',
					],
					'image' => [
						'title' => __( 'Image', 'my-elementor-addons' ),
						'icon'  => 'fa fa-image',
					],
				],
				'default'        => 'icon',
				'toggle'         => false,
				'style_transfer' => true,
			]
		);

		$this->add_control(
			'image',
			[
				'label'     => __( 'Image', 'my-elementor-addons' ),
				'type'      => Controls_Manager::MEDIA,
				'default'   => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'type' => 'image',
				],
				'dynamic'   => [
					'active' => true,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name'      => 'thumbnail',
				'default'   => 'medium_large',
				'separator' => 'none',
				'exclude'   => [
					'full',
					'custom',
					'large',
					'shop_catalog',
					'shop_single',
					'shop_thumbnail',
				],
				'condition' => [
					'type' => 'image',
				],
			]
		);

		$this->add_control(
			'selected_icon',
			[
				'type'        => Controls_Manager::ICONS,
				'label_block' => true,
				'default'     => [
					'value'   => 'fas fa-smile',
					'library' => 'fa-solid',
				],
				'condition'   => [
					'type' => 'icon',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_title',
			[
				'label' => __( 'Title & Description', 'my-elementor-addons' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'my-elementor-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'My Info Box Title', 'my-elementor-addons' ),
				'placeholder' => __( 'Title', 'my-elementor-addons' ),
				'dynamic'     => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'description',
			[
				'label'       => __( 'Description', 'my-elementor-addons' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => __( 'My info box description goes here', 'my-elementor-addons' ),
				'placeholder' => __( 'Type info box description', 'my-elementor-addons' ),
				'rows'        => 5,
				'dynamic'     => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'title_tag',
			[
				'label'   => __( 'Title HTML Tag', 'my-elementor-addons' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'h1' => [
						'title' => __( 'H1', 'my-elementor-addons' ),
						'icon'  => 'eicon-editor-h1',
					],
					'h2' => [
						'title' => __( 'H2', 'my-elementor-addons' ),
						'icon'  => 'eicon-editor-h2',
					],
					'h3' => [
						'title' => __( 'H3', 'my-elementor-addons' ),
						'icon'  => 'eicon-editor-h3',
					],
					'h4' => [
						'title' => __( 'H4', 'my-elementor-addons' ),
						'icon'  => 'eicon-editor-h4',
					],
					'h5' => [
						'title' => __( 'H5', 'my-elementor-addons' ),
						'icon'  => 'eicon-editor-h5',
					],
					'h6' => [
						'title' => __( 'H6', 'my-elementor-addons' ),
						'icon'  => 'eicon-editor-h6',
					],
				],
				'default' => 'h3',
				'toggle'  => false,
			]
		);

		$this->add_responsive_control(
			'align',
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
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_button',
			[
				'label' => __( 'Button', 'my-elementor-addons' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'button',
			[
				'label'       => __( 'Text', 'my-elementor-addons' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Button Text', 'my-elementor-addons' ),
				'placeholder' => __( 'Type button text here', 'my-elementor-addons' ),
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'button_link',
			[
				'label'       => __( 'Link', 'my-elementor-addons' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => __( 'https://example.com/', 'my-elementor-addons' ),
				'dynamic'     => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'button_selected_icon',
			[
				'type'             => Controls_Manager::ICONS,
				'fa4compatibility' => 'button_icon',
				'label_block'      => true,
			]
		);
		$condition = ['button_selected_icon[value]!' => ''];

		$this->add_control(
			'button_icon_position',
			[
				'label'          => __( 'Icon Position', 'my-elementor-addons' ),
				'type'           => Controls_Manager::CHOOSE,
				'label_block'    => false,
				'options'        => [
					'before' => [
						'title' => __( 'Before', 'my-elementor-addons' ),
						'icon'  => 'eicon-h-align-left',
					],
					'after'  => [
						'title' => __( 'After', 'my-elementor-addons' ),
						'icon'  => 'eicon-h-align-right',
					],
				],
				'default'        => 'before',
				'toggle'         => false,
				'condition'      => $condition,
				'style_transfer' => true,
			]
		);

		$this->add_control(
			'button_icon_spacing',
			[
				'label'     => __( 'Icon Spacing', 'my-elementor-addons' ),
				'type'      => Controls_Manager::SLIDER,
				'default'   => [
					'size' => 6,
				],
				'condition' => $condition,
				'selectors' => [
					'{{WRAPPER}} .my-btn-icon--before' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .my-btn-icon--after'  => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function register_style_controls() {
		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Infobox', 'my-elementor-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'infobox_padding',
			[
				'label'      => __( 'Padding', 'my-elementor-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors'  => [
					'{{WRAPPER}}.my-info-box .elementor-widget-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'infobox_border_radius',
			[
				'label'      => __( 'Border Radius', 'my-elementor-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}}.my-info-box .elementor-widget-container' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs( 'tabs_infobox' );

		$this->start_controls_tab(
			'tab_infobox_normal',
			[
				'label' => __( 'Normal', 'my-elementor-addons' ),
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'infobox_border',
				'selector' => '{{WRAPPER}}.my-info-box .elementor-widget-container',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'infobox_box_shadow',
				'selector' => '{{WRAPPER}}.my-info-box .elementor-widget-container',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tabs_infobox_hover',
			[
				'label' => __( 'Hover', 'my-elementor-addons' ),
			]
		);

		$this->add_control(
			'infobox_hover_border_color',
			[
				'label'     => __( 'Border Color', 'my-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}.my-info-box .elementor-widget-container:hover' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'infobox_box_shadow_hover',
				'selector' => '{{WRAPPER}}.my-info-box .elementor-widget-container:hover',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		$this->start_controls_section(
			'section_media_style',
			[
				'label' => __( 'Icon / Image', 'my-elementor-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'icon_size',
			[
				'label'      => __( 'Size', 'my-elementor-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range'      => [
					'px' => [
						'min' => 10,
						'max' => 300,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .my-info-box-figure--icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'type' => 'icon',
				],
			]
		);

		$this->add_responsive_control(
			'image_width',
			[
				'label'      => __( 'Width', 'my-elementor-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range'      => [
					'px' => [
						'min' => 1,
						'max' => 400,
					],
					'%'  => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .my-info-box-figure--image' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'type' => 'image',
				],
			]
		);

		$this->add_responsive_control(
			'image_height',
			[
				'label'      => __( 'Height', 'my-elementor-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range'      => [
					'px' => [
						'min' => 1,
						'max' => 400,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .my-info-box-figure--image' => 'height: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'type' => 'image',
				],
			]
		);

		$this->add_responsive_control(
			'media_spacing',
			[
				'label'      => __( 'Bottom Spacing', 'my-elementor-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors'  => [
					'{{WRAPPER}} .my-info-box-figure' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
				],
			]
		);

		$this->add_responsive_control(
			'media_padding',
			[
				'label'      => __( 'Padding', 'my-elementor-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors'  => [
					'{{WRAPPER}} .my-info-box-figure--image img, {{WRAPPER}} .my-info-box-figure--icon' => 'padding: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'media_border',
				'selector' => '{{WRAPPER}} .my-info-box-figure--image img, {{WRAPPER}} .my-info-box-figure--icon',
			]
		);

		$this->add_responsive_control(
			'media_border_radius',
			[
				'label'      => __( 'Border Radius', 'my-elementor-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} .my-info-box-figure--image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .my-info-box-figure--icon'      => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'media_box_shadow',
				'exclude'  => [
					'box_shadow_position',
				],
				'selector' => '{{WRAPPER}} .my-info-box-figure--image img, {{WRAPPER}} .my-info-box-figure--icon',
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label'     => __( 'Color', 'my-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .my-info-box-figure--icon' => 'color: {{VALUE}}',
				],
				'condition' => [
					'type' => 'icon',
				],
			]
		);

		$this->add_control(
			'icon_bg_color',
			[
				'label'     => __( 'Background Color', 'my-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .my-info-box-figure--icon' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'type' => 'icon',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_title_style',
			[
				'label' => __( 'Title & Description', 'my-elementor-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'content_padding',
			[
				'label'      => __( 'Content Box Padding', 'my-elementor-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors'  => [
					'{{WRAPPER}} .my-info-box-body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'title_heading',
			[
				'type'      => Controls_Manager::HEADING,
				'label'     => __( 'Title', 'my-elementor-addons' ),
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'title_spacing',
			[
				'label'      => __( 'Bottom Spacing', 'my-elementor-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors'  => [
					'{{WRAPPER}} .my-info-box-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'     => __( 'Text Color', 'my-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .my-info-box-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typography',
				'label'    => __( 'Typography', 'my-elementor-addons' ),
				'selector' => '{{WRAPPER}} .my-info-box-title',
				'scheme'   => Typography::TYPOGRAPHY_2,
			]
		);

		$this->add_control(
			'description_heading',
			[
				'label'     => __( 'Description', 'my-elementor-addons' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'description_spacing',
			[
				'label'      => __( 'Bottom Spacing', 'my-elementor-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors'  => [
					'{{WRAPPER}} .my-info-box-text' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'description_color',
			[
				'label'     => __( 'Text Color', 'my-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .my-info-box-text, p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'description_typography',
				'label'    => __( 'Typography', 'my-elementor-addons' ),
				'selector' => '{{WRAPPER}} .my-info-box-text, p',
				'scheme'   => Typography::TYPOGRAPHY_3,
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
					'{{WRAPPER}} .my-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'btn_typography',
				'selector' => '{{WRAPPER}} .my-btn',
				'scheme'   => Typography::TYPOGRAPHY_4,
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'button_border',
				'selector' => '{{WRAPPER}} .my-btn',
			]
		);

		$this->add_control(
			'button_border_radius',
			[
				'label'      => __( 'Border Radius', 'my-elementor-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} .my-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'button_box_shadow',
				'selector' => '{{WRAPPER}} .my-btn',
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
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .my-btn' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_bg_color',
			[
				'label'     => __( 'Background Color', 'my-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .my-btn' => 'background-color: {{VALUE}};',
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
					'{{WRAPPER}} .my-btn:hover, {{WRAPPER}} .my-btn:focus' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_bg_color',
			[
				'label'     => __( 'Background Color', 'my-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .my-btn:hover, {{WRAPPER}} .my-btn:focus' => 'background-color: {{VALUE}};',
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
					'{{WRAPPER}} .my-btn:hover, {{WRAPPER}} .my-btn:focus' => 'border-color: {{VALUE}};',
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

		$this->add_inline_editing_attributes( 'title', 'none' );
		$this->add_render_attribute( 'title', 'class', 'my-info-box-title' );
		$this->add_inline_editing_attributes( 'description', 'none' );
		$this->add_render_attribute( 'description', 'class', 'my-info-box-text' );
		$this->add_inline_editing_attributes( 'button', 'none' );
		$this->add_render_attribute( 'button', 'class', 'my-btn my-btn--link' );
		$this->add_render_attribute( 'button', 'href', esc_url( $settings['button_link']['url'] ) );

		if ( ! empty( $settings['button_link']['is_external'] ) ) {
            $this->add_render_attribute( 'button', 'target', '_blank' );
        }

        if ( ! empty( $settings['button_link']['nofollow'] ) ) {
            $this->add_render_attribute( 'button', 'rel', 'nofollow' );
        }

        if ( ! empty( $settings['button_selected_icon'] ) ) {
            $this->add_render_attribute( 'button_selected_icon', 'class', [
                'my-btn-icon--' . esc_attr( $settings['button_icon_position'] )
            ] );
        }
		?>

		<?php
		if ( $settings['type'] === 'image' && ( $settings['image']['url'] || $settings['image']['id'] ) ) :
			$this->add_render_attribute( 'image', 'src', $settings['image']['url'] );
			$this->add_render_attribute( 'image', 'alt', Control_Media::get_image_alt( $settings['image'] ) );
			$this->add_render_attribute( 'image', 'title', Control_Media::get_image_title( $settings['image'] ) );
			?>
			<div class="my-info-box-figure my-info-box-figure--image">
				<?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' ); ?>
			</div>
		<?php
		elseif ( ! empty( $settings['selected_icon'] ) ) : ?>
			<div class="my-info-box-figure my-info-box-figure--icon">
				<?php Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] ); ?>
			</div>
		<?php
		endif;
		?>

		<div class="my-info-box-body">
			<?php
			if ( $settings['title' ] ) {
				printf( '<%1$s %2$s>%3$s</%1$s>',
					tag_escape( $settings['title_tag'] ),
					$this->get_render_attribute_string( 'title' ),
					wp_kses_post( $settings['title' ] )
				);
			}
			?>

			<?php if ( $settings['description'] ) { ?>
				<div <?php $this->print_render_attribute_string( 'description' ); ?>>
					<p><?php echo esc_html( $settings['description'] ); ?></p>
				</div>
			<?php } ?>

			<div>
				<a <?php $this->print_render_attribute_string( 'button' ); ?>>
					<?php if ( $settings['button_icon_position'] === 'before' && ! empty( $settings['button_selected_icon']['value'] ) ) { ?>
						<span <?php $this->print_render_attribute_string( 'button_selected_icon' ); ?>>
							<?php Icons_Manager::render_icon( $settings['button_selected_icon'], [ 'aria-hidden' => 'true' ] ); ?>
						</span>
					<?php } ?>

					<?php if ( $settings['button'] ) { ?>
						<span><?php echo esc_html( $settings['button'] ); ?></span>
					<?php } ?>

					<?php if ( $settings['button_icon_position'] === 'after' && ! empty( $settings['button_selected_icon']['value'] ) ) { ?>
						<span <?php $this->print_render_attribute_string( 'button_selected_icon' ); ?>>
							<?php Icons_Manager::render_icon( $settings['button_selected_icon'], [ 'aria-hidden' => 'true' ] ); ?>
						</span>
					<?php } ?>
				</a>
			</div>
		</div>
		<?php
	}
}
