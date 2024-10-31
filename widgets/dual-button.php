<?php
namespace MyElementorAddons\Elementor\Widget;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Icons_Manager;
use Elementor\Core\Schemes\Typography;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Dual_Button extends Base {

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
		return __( 'Dual Button', 'my-elementor-addons' );
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
		return 'eicon-dual-button';
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
		return [ 'dual-button' ];
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
				'label' => __( 'Dual Button', 'my-elementor-addons' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->start_controls_tabs( 'tabs_buttons' );

		$this->start_controls_tab(
			'tab_button_primary',
			[
				'label' => __( 'Primary', 'my-elementor-addons' ),
			]
		);

		$this->add_control(
			'left_button_text',
			[
				'label'       => __( 'Text', 'my-elementor-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Button Text', 'my-elementor-addons' ),
				'dynamic'     => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'left_button_link',
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
			'left_button_selected_icon',
			[
				'label'            => __( 'Icon', 'my-elementor-addons' ),
				'type'             => Controls_Manager::ICONS,
				'fa4compatibility' => 'left_button_icon',
				'default'          => [
					'value'   => 'far fa-star',
					'library' => 'fa-solid',
				],
			]
		);

		$condition = ['left_button_selected_icon[value]!' => ''];

		$this->add_control(
			'left_button_icon_position',
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
				'toggle'         => false,
				'default'        => 'before',
				'condition'      => $condition,
				'style_transfer' => true,
			]
		);

		$this->add_control(
			'left_button_icon_spacing',
			[
				'label'     => __( 'Icon Spacing', 'my-elementor-addons' ),
				'type'      => Controls_Manager::SLIDER,
				'condition' => $condition,
				'selectors' => [
					'{{WRAPPER}} .my-dual-btn--left .my-dual-btn-icon--before' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .my-dual-btn--left .my-dual-btn-icon--after'  => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_secondary',
			[
				'label' => __( 'Secondary', 'my-elementor-addons' ),
			]
		);

		$this->add_control(
			'right_button_text',
			[
				'label'       => __( 'Text', 'my-elementor-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Buttom Text', 'my-elementor-addons' ),
				'dynamic'     => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'right_button_link',
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
			'right_button_selected_icon',
			[
				'label'            => __( 'Icon', 'my-elementor-addons' ),
				'type'             => Controls_Manager::ICONS,
				'fa4compatibility' => 'right_button_icon',
				'default'          => [
					'value'   => 'far fa-edit',
					'library' => 'fa-solid',
				],
			]
		);
		$condition = ['right_button_selected_icon[value]!' => ''];

		$this->add_control(
			'right_button_icon_position',
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
				'toggle'         => false,
				'default'        => 'before',
				'condition'      => $condition,
				'style_transfer' => true,
			]
		);

		$this->add_control(
			'right_button_icon_spacing',
			[
				'label'     => __( 'Icon Spacing', 'my-elementor-addons' ),
				'type'      => Controls_Manager::SLIDER,
				'condition' => $condition,
				'selectors' => [
					'{{WRAPPER}} .my-dual-btn--right .my-dual-btn-icon--before' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .my-dual-btn--right .my-dual-btn-icon--after'  => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

	}

	protected function register_style_controls() {
		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Dual', 'my-elementor-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'button_padding',
			[
				'label'      => __( 'Padding', 'my-elementor-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors'  => [
					'{{WRAPPER}} .my-dual-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'button_gap',
			[
				'label'      => __( 'Space Between Buttons', 'my-elementor-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors'  => [
					'{{WRAPPER}} .my-dual-btn--left'  => 'margin-right: calc({{SIZE}}{{UNIT}}/2);',
					'{{WRAPPER}} .my-dual-btn--right' => 'margin-left: calc({{SIZE}}{{UNIT}}/2);',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'button_typography',
				'label'    => __( 'Typography', 'my-elementor-addons' ),
				'selector' => '{{WRAPPER}} .my-dual-btn',
				'scheme'   => Typography::TYPOGRAPHY_1,
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'button_box_shadow',
				'selector' => '{{WRAPPER}} .my-dual-btn',
			]
		);

		$this->add_responsive_control(
			'button_align_x',
			[
				'label'        => __( 'Alignment', 'my-elementor-addons' ),
				'type'         => Controls_Manager::CHOOSE,
				'label_block'  => false,
				'options'      => [
					'left'   => [
						'title' => __( 'Left', 'my-elementor-addons' ),
						'icon'  => 'eicon-h-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'my-elementor-addons' ),
						'icon'  => 'eicon-h-align-center',
					],
					'right'  => [
						'title' => __( 'Right', 'my-elementor-addons' ),
						'icon'  => 'eicon-h-align-right',
					],
				],
				'toggle'       => true,
				'prefix_class' => 'my-dual-button-%s-align-',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_left_button',
			[
				'label' => __( 'Primary Button', 'my-elementor-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'left_button_padding',
			[
				'label'      => __( 'Padding', 'my-elementor-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors'  => [
					'{{WRAPPER}} .my-dual-btn--left' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'left_button_border',
				'selector' => '{{WRAPPER}} .my-dual-btn--left',
			]
		);

		$this->add_responsive_control(
			'left_button_border_radius',
			[
				'label'      => __( 'Border Radius', 'my-elementor-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} .my-dual-btn--left' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'left_button_typography',
				'label'    => __( 'Typography', 'my-elementor-addons' ),
				'selector' => '{{WRAPPER}} .my-dual-btn--left',
				'scheme'   => Typography::TYPOGRAPHY_2,
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'left_button_box_shadow',
				'selector' => '{{WRAPPER}} .my-dual-btn--left',
			]
		);

		$this->start_controls_tabs( 'tabs_left_button' );

		$this->start_controls_tab(
			'tab_left_button_normal',
			[
				'label' => __( 'Normal', 'my-elementor-addons' ),
			]
		);

		$this->add_control(
			'left_button_text_color',
			[
				'label'     => __( 'Text Color', 'my-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .my-dual-btn--left' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'left_button_bg_color',
			[
				'label'     => __( 'Background Color', 'my-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .my-dual-btn--left' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tabs_left_button_hover',
			[
				'label' => __( 'Hover', 'my-elementor-addons' ),
			]
		);

		$this->add_control(
			'left_button_hover_text_color',
			[
				'label'     => __( 'Text Color', 'my-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .my-dual-btn--left:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'left_button_hover_bg_color',
			[
				'label'     => __( 'Background Color', 'my-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .my-dual-btn--left:hover' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'left_button_hover_border_color',
			[
				'label'     => __( 'Border Color', 'my-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .my-dual-btn--left:hover' => 'border-color: {{VALUE}}',
				],
				'condition' => [
					'left_button_border_border!' => '',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_right_button',
			[
				'label' => __( 'Secondary Button', 'my-elementor-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'right_button_padding',
			[
				'label'      => __( 'Padding', 'my-elementor-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors'  => [
					'{{WRAPPER}} .my-dual-btn--right' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'right_button_border',
				'selector' => '{{WRAPPER}} .my-dual-btn--right',
			]
		);

		$this->add_responsive_control(
			'right_button_border_radius',
			[
				'label'      => __( 'Border Radius', 'my-elementor-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} .my-dual-btn--right' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'right_button_typography',
				'label'    => __( 'Typography', 'my-elementor-addons' ),
				'selector' => '{{WRAPPER}} .my-dual-btn--right',
				'scheme'   => Typography::TYPOGRAPHY_3,
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'right_button_box_shadow',
				'selector' => '{{WRAPPER}} .my-dual-btn--right',
			]
		);

		$this->start_controls_tabs( '_tabs_right_button' );

		$this->start_controls_tab(
			'tab_right_button_normal',
			[
				'label' => __( 'Normal', 'my-elementor-addons' ),
			]
		);

		$this->add_control(
			'right_button_text_color',
			[
				'label'     => __( 'Text Color', 'my-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .my-dual-btn--right' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'right_button_bg_color',
			[
				'label'     => __( 'Background Color', 'my-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .my-dual-btn--right' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tabs_right_button_hover',
			[
				'label' => __( 'Hover', 'my-elementor-addons' ),
			]
		);

		$this->add_control(
			'right_button_hover_text_color',
			[
				'label'     => __( 'Text Color', 'my-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .my-dual-btn--right:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'right_button_hover_bg_color',
			[
				'label'     => __( 'Background Color', 'my-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .my-dual-btn--right:hover' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'right_button_hover_border_color',
			[
				'label'     => __( 'Border Color', 'my-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .my-dual-btn--right:hover' => 'border-color: {{VALUE}}',
				],
				'condition' => [
					'right_button_border_border!' => '',
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

		/* Left Button */
		$this->add_render_attribute( 'left_button', 'class', 'my-dual-btn my-dual-btn--left' );
		$this->add_render_attribute( 'left_button', 'href', esc_url( $settings['left_button_link']['url'] ) );

		if ( ! empty( $settings['left_button_link']['is_external'] ) ) {
			$this->add_render_attribute( 'left_button', 'target', '_blank' );
		}

		if ( ! empty( $settings['left_button_link']['nofollow'] ) ) {
			$this->add_render_attribute( 'left_button', 'rel', 'nofollow' );
		}

		$this->add_inline_editing_attributes( 'left_button_text', 'none' );

		if ( ! empty( $settings['left_button_selected_icon'] ) ) {
			$this->add_render_attribute( 'left_button_selected_icon', 'class', [
				'my-dual-btn-icon',
				'my-dual-btn-icon--' . esc_attr( $settings['left_button_icon_position'] ),
			] );
		}

		/* Right Button */
		$this->add_render_attribute( 'right_button', 'class', 'my-dual-btn my-dual-btn--right' );
		$this->add_render_attribute( 'right_button', 'href', esc_url( $settings['right_button_link']['url'] ) );

		if ( ! empty( $settings['right_button_link']['is_external'] ) ) {
			$this->add_render_attribute( 'right_button', 'target', '_blank' );
		}

		if ( ! empty( $settings['right_button_link']['nofollow'] ) ) {
			$this->add_render_attribute( 'right_button', 'rel', 'nofollow' );
		}

		$this->add_inline_editing_attributes( 'right_button_text', 'none' );

		if ( ! empty( $settings['right_button_selected_icon'] ) ) {
			$this->add_render_attribute( 'right_button_selected_icon', 'class', [
				'my-dual-btn-icon',
				'my-dual-btn-icon--' . esc_attr( $settings['right_button_icon_position'] ),
			] );
		}
		?>

		<div class="my-dual-btn-wrapper">
            <a <?php $this->print_render_attribute_string( 'left_button' ); ?>>
                <?php if ( $settings['left_button_icon_position'] === 'before' && ! empty( $settings['left_button_selected_icon']['value'] ) ) : ?>
                    <span <?php $this->print_render_attribute_string( 'left_button_selected_icon' ); ?>>
                       <?php Icons_Manager::render_icon( $settings['left_button_selected_icon'], [ 'aria-hidden' => 'true' ] );?>
                    </span>
                <?php endif; ?>

                <?php if ( $settings['left_button_text'] ) : ?>
                	<span <?php $this->print_render_attribute_string( 'left_button_text' ); ?>><?php echo esc_html( $settings['left_button_text'] ); ?></span>
                <?php endif; ?>

                <?php if ( $settings['left_button_icon_position'] === 'after' && ! empty( $settings['left_button_selected_icon']['value'] ) ) : ?>
                    <span <?php $this->print_render_attribute_string( 'left_button_selected_icon' ); ?>>
                       <?php Icons_Manager::render_icon( $settings['left_button_selected_icon'], [ 'aria-hidden' => 'true' ] );?>
                    </span>
                <?php endif; ?>
            </a>
        </div>

        <div class="my-dual-btn-wrapper">
            <a <?php $this->print_render_attribute_string( 'right_button' ); ?>>
                <?php if ( $settings['right_button_icon_position'] === 'before' && ! empty( $settings['right_button_selected_icon']['value'] ) ) : ?>
                    <span <?php $this->print_render_attribute_string( 'right_button_selected_icon' ); ?>>
                       <?php Icons_Manager::render_icon( $settings['right_button_selected_icon'], [ 'aria-hidden' => 'true' ] );?>
                    </span>
                <?php endif; ?>

                <?php if ( $settings['right_button_text'] ) : ?>
                	<span <?php $this->print_render_attribute_string( 'right_button_text' ); ?>><?php echo esc_html( $settings['right_button_text'] ); ?></span>
                <?php endif; ?>

                <?php if ( $settings['right_button_icon_position'] === 'after' && ! empty( $settings['right_button_selected_icon']['value'] ) ) : ?>
                    <span <?php $this->print_render_attribute_string( 'right_button_selected_icon' ); ?>>
                       <?php Icons_Manager::render_icon( $settings['right_button_selected_icon'], [ 'aria-hidden' => 'true' ] );?>
                    </span>
                <?php endif; ?>
            </a>
        </div>
		<?php
	}

}
