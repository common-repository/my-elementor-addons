<?php
namespace MyElementorAddons\Elementor\Widget;

use Elementor\Controls_Manager;
use Elementor\Control_Media;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Image_Compare extends Base {

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
		return __( 'Image Compare', 'my-elementor-addons' );
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
		return 'eicon-image-before-after';
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
		return [ 'images-compare' ];
	}

	/**
	 * Retrieve scripts dependencies.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'hammer', 'jquery-image-compare', 'image-compare' ];
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
				'label' => __( 'Images', 'my-elementor-addons' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->start_controls_tabs( 'tab_images' );

		$this->start_controls_tab(
			'tab_before_image',
			[
				'label' => __( 'Before', 'my-elementor-addons' ),
			]
		);

		$this->add_control(
			'before_image',
			[
				'label'   => __( 'Image', 'my-elementor-addons' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'before_label',
			[
				'label'       => __( 'Label', 'my-elementor-addons' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Before', 'my-elementor-addons' ),
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_after_image',
			[
				'label' => __( 'After', 'my-elementor-addons' ),
			]
		);

		$this->add_control(
			'after_image',
			[
				'label'   => __( 'Image', 'my-elementor-addons' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'after_label',
			[
				'label'       => __( 'Label', 'my-elementor-addons' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'After', 'my-elementor-addons' ),
			]
		);

		$this->end_controls_tab();

		$this->add_control(
			'show_label',
			[
				'label' => __( 'Before and After', 'my-elementor-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'my-elementor-addons' ),
				'label_off' => __( 'Hide', 'my-elementor-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->end_controls_tabs();

		$this->end_controls_section();
	}

	protected function register_style_controls() {
		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Label', 'my-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
            'label_padding',
            [
                'label' => __( 'Padding', 'my-elementor-addons' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .images-compare-label' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

		$this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'label_border',
                'selector' => '{{WRAPPER}} .images-compare-label',
            ]
        );

        $this->add_responsive_control(
            'label_border_radius',
            [
                'label' => __( 'Border Radius', 'my-elementor-addons' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .images-compare-label' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'label_color',
            [
                'label' => __( 'Color', 'my-elementor-addons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .images-compare-label' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'label_bg_color',
            [
                'label' => __( 'Background Color', 'my-elementor-addons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .images-compare-label' => 'background-color: {{VALUE}}',
                ],
            ]
        );

		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'label_typography',
                'selector' => '{{WRAPPER}} .images-compare-label',
                'scheme' => Typography::TYPOGRAPHY_3,
            ]
        );

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

		if ( isset( $settings['before_image']['url'] ) || isset( $settings['before_image']['id'] ) ) {
            $this->add_render_attribute( 'before_image', 'src', $settings['before_image']['url'] );
            $this->add_render_attribute( 'before_image', 'alt', Control_Media::get_image_alt( $settings['before_image'] ) );
            $this->add_render_attribute( 'before_image', 'title', Control_Media::get_image_title( $settings['before_image'] ) );
		}

		if ( isset( $settings['after_image']['url'] ) || isset( $settings['after_image']['id'] ) ) {
            $this->add_render_attribute( 'after_image', 'src', $settings['after_image']['url'] );
            $this->add_render_attribute( 'after_image', 'alt', Control_Media::get_image_alt( $settings['after_image'] ) );
            $this->add_render_attribute( 'after_image', 'title', Control_Media::get_image_title( $settings['after_image'] ) );
		}

		?>

		<div id="myImageCompare">
			<div style="display: none;">
				<?php if ( $settings['show_label'] == 'yes' ) { ?>
					<span class="images-compare-label"><?php echo esc_html($settings['before_label']);?></span>
				<?php } ?>
				<?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'large', 'before_image' ); ?>
			</div>
			<div>
				<?php if ( $settings['show_label'] == 'yes' ) { ?>
					<span class="images-compare-label"><?php echo esc_html($settings['after_label']);?></span>
				<?php } ?>
				<?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'large', 'after_image' ); ?>
			</div>
		</div>
		<?php
	}
}
