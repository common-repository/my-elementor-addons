<?php
namespace MyElementorAddons\Elementor\Widget;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography;
use Elementor\Repeater;
use Elementor\Icons_Manager;
use Elementor\Group_Control_Text_Shadow;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Pricing_Table extends Base {

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
		return __( 'Pricing Table', 'my-elementor-addons' );
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
		return 'eicon-price-table';
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
		return ['pricing-table'];
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
				'label' => __( 'Header', 'my-elementor-addons' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'my-elementor-addons' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => __( 'Basic', 'my-elementor-addons' ),
				'dynamic'     => [
					'active' => true,
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_pricing',
			[
				'label' => __( 'Pricing', 'my-elementor-addons' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'currency',
			[
				'label'       => __( 'Currency', 'my-elementor-addons' ),
				'type'        => Controls_Manager::SELECT,
				'label_block' => false,
				'options'     => [
					''             => __( 'None', 'my-elementor-addons' ),
					'baht'         => '&#3647; ' . _x( 'Baht', 'Currency Symbol', 'my-elementor-addons' ),
					'bdt'          => '&#2547; ' . _x( 'BD Taka', 'Currency Symbol', 'my-elementor-addons' ),
					'dollar'       => '&#36; ' . _x( 'Dollar', 'Currency Symbol', 'my-elementor-addons' ),
					'euro'         => '&#128; ' . _x( 'Euro', 'Currency Symbol', 'my-elementor-addons' ),
					'franc'        => '&#8355; ' . _x( 'Franc', 'Currency Symbol', 'my-elementor-addons' ),
					'guilder'      => '&fnof; ' . _x( 'Guilder', 'Currency Symbol', 'my-elementor-addons' ),
					'krona'        => 'kr ' . _x( 'Krona', 'Currency Symbol', 'my-elementor-addons' ),
					'lira'         => '&#8356; ' . _x( 'Lira', 'Currency Symbol', 'my-elementor-addons' ),
					'peseta'       => '&#8359 ' . _x( 'Peseta', 'Currency Symbol', 'my-elementor-addons' ),
					'peso'         => '&#8369; ' . _x( 'Peso', 'Currency Symbol', 'my-elementor-addons' ),
					'pound'        => '&#163; ' . _x( 'Pound Sterling', 'Currency Symbol', 'my-elementor-addons' ),
					'real'         => 'R$ ' . _x( 'Real', 'Currency Symbol', 'my-elementor-addons' ),
					'ruble'        => '&#8381; ' . _x( 'Ruble', 'Currency Symbol', 'my-elementor-addons' ),
					'rupee'        => '&#8360; ' . _x( 'Rupee', 'Currency Symbol', 'my-elementor-addons' ),
					'indian_rupee' => '&#8377; ' . _x( 'Rupee (Indian)', 'Currency Symbol', 'my-elementor-addons' ),
					'shekel'       => '&#8362; ' . _x( 'Shekel', 'Currency Symbol', 'my-elementor-addons' ),
					'won'          => '&#8361; ' . _x( 'Won', 'Currency Symbol', 'my-elementor-addons' ),
					'yen'          => '&#165; ' . _x( 'Yen/Yuan', 'Currency Symbol', 'my-elementor-addons' ),
					'custom'       => __( 'Custom', 'my-elementor-addons' ),
				],
				'default'     => 'dollar',
			]
		);

		$this->add_control(
			'currency_custom',
			[
				'label'     => __( 'Custom Symbol', 'my-elementor-addons' ),
				'type'      => Controls_Manager::TEXT,
				'condition' => [
					'currency' => 'custom',
				],
				'dynamic'   => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'price',
			[
				'label'   => __( 'Price', 'my-elementor-addons' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '49', 'my-elementor-addons' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'period',
			[
				'label'   => __( 'Period', 'my-elementor-addons' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Per Month', 'my-elementor-addons' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_features',
			[
				'label' => __( 'Features', 'my-elementor-addons' ),
			]
		);

		$this->add_control(
			'features_title',
			[
				'label'       => __( 'Title', 'my-elementor-addons' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Features', 'my-elementor-addons' ),
				'separator'   => 'after',
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'list_title',
			[
				'label'   => __( 'Title', 'my-elementor-addons' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => __( 'Exciting Feature', 'my-elementor-addons' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);

		if ( myea_elementor_version( '<', '2.6.0' ) ) {
			$repeater->add_control(
				'icon',
				[
					'label'       => __( 'Icon', 'my-elementor-addons' ),
					'type'        => Controls_Manager::ICON,
					'label_block' => false,
					'default'     => 'fa fa-check',
					'include'     => [
						'fa fa-check',
						'fa fa-close',
					],
				]
			);
		} else {
			$repeater->add_control(
				'selected_icon',
				[
					'label'            => __( 'Icon', 'my-elementor-addons' ),
					'type'             => Controls_Manager::ICONS,
					'fa4compatibility' => 'icon',
					'default'          => [
						'value'   => 'fas fa-check',
						'library' => 'fa-solid',
					],
					'recommended'      => [
						'fa-regular' => [
							'check-square',
							'window-close',
						],
						'fa-solid'   => [
							'check',
						],
					],
				]
			);
		}

		$this->add_control(
			'features_list',
			[
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'show_label'  => false,
				'default'     => [
					[
						'list_title' => __( 'Feature One', 'my-elementor-addons' ),
						'icon' => 'fa fa-check',
					],
					[
						'list_title' => __( 'Feature Two', 'my-elementor-addons' ),
						'icon' => 'fa fa-check',
					],
					[
						'list_title' => __( 'Feature Three', 'my-elementor-addons' ),
						'icon' => 'fa fa-check',
					],
					[
						'list_title' => __( 'Feature Four', 'my-elementor-addons' ),
						'icon' => 'fa fa-check',
					],
				],
				'title_field' => '{{{ list_title }}}',

			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_footer',
			[
				'label' => __( 'Footer', 'my-elementor-addons' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'button_text',
			[
				'label'       => __( 'Button Text', 'my-elementor-addons' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Subscribe', 'my-elementor-addons' ),
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
				'label_block' => true,
				'placeholder' => __( 'https://example.com', 'my-elementor-addons' ),
				'dynamic'     => [
					'active' => true,
				],
				'default'     => [
					'url' => '#',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function register_style_controls() {
		$this->start_controls_section(
			'section_style_general',
			[
				'label' => __( 'General', 'my-elementor-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'text_color',
			[
				'label'     => __( 'Text Color', 'my-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .my-pricing-table-title,'
					. '{{WRAPPER}} .my-pricing-table-currency,'
					. '{{WRAPPER}} .my-pricing-table-period,'
					. '{{WRAPPER}} .my-pricing-table-features-title,'
					. '{{WRAPPER}} .my-pricing-table-features-list li,'
					. '{{WRAPPER}} .my-pricing-table-price-text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_header',
			[
				'label' => __( 'Header', 'my-elementor-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'title_spacing',
			[
				'label'      => __( 'Bottom Spacing', 'my-elementor-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors'  => [
					'{{WRAPPER}} .my-pricing-table-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'     => __( 'Title Color', 'my-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .my-pricing-table-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typography',
				'selector' => '{{WRAPPER}} .my-pricing-table-title',
				'scheme'   => Typography::TYPOGRAPHY_2,
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name'     => 'title_text_shadow',
				'selector' => '{{WRAPPER}} .my-pricing-table-title',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_pricing',
			[
				'label' => __( 'Pricing', 'my-elementor-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'heading_price',
			[
				'label' => __( 'Price', 'my-elementor-addons' ),
				'type'  => Controls_Manager::HEADING,
			]
		);

		$this->add_responsive_control(
			'price_spacing',
			[
				'label'      => __( 'Bottom Spacing', 'my-elementor-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors'  => [
					'{{WRAPPER}} .my-pricing-table-price-tag' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'price_color',
			[
				'label'     => __( 'Text Color', 'my-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .my-pricing-table-price-text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'price_typography',
				'selector' => '{{WRAPPER}} .my-pricing-table-price-text',
				'scheme'   => Typography::TYPOGRAPHY_3,
			]
		);

		$this->add_control(
			'heading_currency',
			[
				'label'     => __( 'Currency', 'my-elementor-addons' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'currency_spacing',
			[
				'label'      => __( 'Side Spacing', 'my-elementor-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors'  => [
					'{{WRAPPER}} .my-pricing-table-currency' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'currency_color',
			[
				'label'     => __( 'Text Color', 'my-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .my-pricing-table-currency' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'currency_typography',
				'selector' => '{{WRAPPER}} .my-pricing-table-currency',
				'scheme'   => Typography::TYPOGRAPHY_3,
			]
		);

		$this->add_control(
			'heading_period',
			[
				'label'     => __( 'Period', 'my-elementor-addons' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'period_spacing',
			[
				'label'      => __( 'Bottom Spacing', 'my-elementor-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors'  => [
					'{{WRAPPER}} .my-pricing-table-price' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'period_color',
			[
				'label'     => __( 'Text Color', 'my-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .my-pricing-table-period' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'period_typography',
				'selector' => '{{WRAPPER}} .my-pricing-table-period',
				'scheme'   => Typography::TYPOGRAPHY_3,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_features',
			[
				'label' => __( 'Features', 'my-elementor-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'features_container_spacing',
			[
				'label'      => __( 'Container Bottom Spacing', 'my-elementor-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors'  => [
					'{{WRAPPER}} .my-pricing-table-body' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'heading_features_title',
			[
				'type'      => Controls_Manager::HEADING,
				'label'     => __( 'Title', 'my-elementor-addons' ),
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'features_title_spacing',
			[
				'label'      => __( 'Bottom Spacing', 'my-elementor-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors'  => [
					'{{WRAPPER}} .my-pricing-table-features-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'features_title_color',
			[
				'label'     => __( 'Text Color', 'my-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .my-pricing-table-features-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'features_title_typography',
				'selector' => '{{WRAPPER}} .my-pricing-table-features-title',
				'scheme'   => Typography::TYPOGRAPHY_2,
			]
		);

		$this->add_control(
			'heading_features_list',
			[
				'type'      => Controls_Manager::HEADING,
				'label'     => __( 'List', 'my-elementor-addons' ),
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'features_list_spacing',
			[
				'label'      => __( 'Spacing Between', 'my-elementor-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors'  => [
					'{{WRAPPER}} .my-pricing-table-features-list > li' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'features_list_color',
			[
				'label'     => __( 'Text Color', 'my-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .my-pricing-table-features-list > li' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'features_list_typography',
				'selector' => '{{WRAPPER}} .my-pricing-table-features-list > li',
				'scheme'   => Typography::TYPOGRAPHY_3,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_footer',
			[
				'label' => __( 'Footer', 'my-elementor-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'heading_button',
			[
				'type'  => Controls_Manager::HEADING,
				'label' => __( 'Button', 'my-elementor-addons' ),
			]
		);

		$this->add_responsive_control(
			'button_padding',
			[
				'label'      => __( 'Padding', 'my-elementor-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors'  => [
					'{{WRAPPER}} .my-pricing-table-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'button_border',
				'selector' => '{{WRAPPER}} .my-pricing-table-btn',
			]
		);

		$this->add_control(
			'button_border_radius',
			[
				'label'      => __( 'Border Radius', 'my-elementor-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} .my-pricing-table-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'button_box_shadow',
				'selector' => '{{WRAPPER}} .my-pricing-table-btn',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'button_typography',
				'selector' => '{{WRAPPER}} .my-pricing-table-btn',
				'scheme'   => Typography::TYPOGRAPHY_4,
			]
		);

		$this->add_control(
			'hr',
			[
				'type'  => Controls_Manager::DIVIDER,
				'style' => 'thick',
			]
		);

		$this->start_controls_tabs( '_tabs_button' );

		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => __( 'Normal', 'my-elementor-addons' ),
			]
		);

		$this->add_control(
			'button_color',
			[
				'label'     => __( 'Text Color', 'my-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .my-pricing-table-btn' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_bg_color',
			[
				'label'     => __( 'Background Color', 'my-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .my-pricing-table-btn' => 'background-color: {{VALUE}};',
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
			'button_hover_color',
			[
				'label'     => __( 'Text Color', 'my-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .my-pricing-table-btn:hover, {{WRAPPER}} .my-pricing-table-btn:focus' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_bg_color',
			[
				'label'     => __( 'Background Color', 'my-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .my-pricing-table-btn:hover, {{WRAPPER}} .my-pricing-table-btn:focus' => 'background-color: {{VALUE}};',
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
					'{{WRAPPER}} .my-pricing-table-btn:hover, {{WRAPPER}} .my-pricing-table-btn:focus' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

	}

	private static function get_currency_symbol( $symbol_name ) {
        $symbols = [
            'baht' => '&#3647;',
            'bdt' => '&#2547;',
            'dollar' => '&#36;',
            'euro' => '&#128;',
            'franc' => '&#8355;',
            'guilder' => '&fnof;',
            'indian_rupee' => '&#8377;',
            'pound' => '&#163;',
            'peso' => '&#8369;',
            'peseta' => '&#8359',
            'lira' => '&#8356;',
            'ruble' => '&#8381;',
            'shekel' => '&#8362;',
            'rupee' => '&#8360;',
            'real' => 'R$',
            'krona' => 'kr',
            'won' => '&#8361;',
            'yen' => '&#165;',
        ];

        return isset( $symbols[ $symbol_name ] ) ? $symbols[ $symbol_name ] : '';
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

		$this->add_inline_editing_attributes( 'title', 'basic' );
        $this->add_render_attribute( 'title', 'class', 'my-pricing-table-title' );

        $this->add_inline_editing_attributes( 'price', 'basic' );
        $this->add_render_attribute( 'price', 'class', 'my-pricing-table-price-text' );

        $this->add_inline_editing_attributes( 'period', 'basic' );
        $this->add_render_attribute( 'period', 'class', 'my-pricing-table-period' );

        $this->add_inline_editing_attributes( 'features_title', 'basic' );
        $this->add_render_attribute( 'features_title', 'class', 'my-pricing-table-features-title' );

        $this->add_inline_editing_attributes( 'button_text', 'none' );
        $this->add_render_attribute( 'button_text', 'class', 'my-pricing-table-btn' );

        $this->add_link_attributes( 'button_text', $settings['button_link'] );

		if ( $settings['currency'] === 'custom' ) {
            $currency = $settings['currency_custom'];
        } else {
            $currency = self::get_currency_symbol( $settings['currency'] );
        }
        ?>

		<div class="my-pricing-table-header">
            <?php if ( $settings['title'] ) : ?>
                <h2 <?php $this->print_render_attribute_string( 'title' ); ?>><?php echo esc_html( $settings['title'] ); ?></h2>
            <?php endif; ?>
        </div>
        <div class="my-pricing-table-price">
            <div class="my-pricing-table-price-tag"><span class="my-pricing-table-currency"><?php echo esc_html( $currency ); ?></span><span <?php $this->print_render_attribute_string( 'price' ); ?>><?php echo esc_html( $settings['price'] ); ?></span></div>
            <?php if ( $settings['period'] ) : ?>
                <div <?php $this->print_render_attribute_string( 'period' ); ?>><?php echo esc_html( $settings['period'] ); ?></div>
            <?php endif; ?>
        </div>
        <div class="my-pricing-table-body">
            <?php if ( $settings['features_title'] ) : ?>
                <h3 <?php $this->print_render_attribute_string( 'features_title' ); ?>><?php echo esc_html( $settings['features_title'] ); ?></h3>
            <?php endif; ?>
            <?php if ( is_array( $settings['features_list'] ) ) : ?>
                <ul class="my-pricing-table-features-list">
                    <?php foreach ( $settings['features_list'] as $index => $feature ) :
                        $name_key = $this->get_repeater_setting_key( 'list_title', 'features_list', $index );
                        $this->add_inline_editing_attributes( $name_key, 'intermediate' );
                        $this->add_render_attribute( $name_key, 'class', 'my-pricing-table-feature-text' );
                        ?>
                        <li class="<?php echo esc_attr( 'elementor-repeater-item-' . $feature['_id'] ); ?>">
                            <?php if ( ! empty( $feature['icon'] ) || ! empty( $feature['selected_icon']['value'] ) ) :
								myea_render_icon( $feature, 'icon', 'selected_icon' );
                            endif; ?>
                            <div <?php $this->print_render_attribute_string( $name_key ); ?>><?php echo esc_html( $feature['list_title'] ); ?></div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
        <?php if ( $settings['button_text'] ) : ?>
            <a <?php $this->print_render_attribute_string( 'button_text' ); ?>><?php echo esc_html( $settings['button_text'] ); ?></a>
        <?php endif; ?>
		<?php
	}
}
