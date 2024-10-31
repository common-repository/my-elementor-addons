<?php
namespace MyElementorAddons\Elementor\Widget;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;
use Elementor\Core\Schemes\Typography;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Testimonial_Carousel extends Base {

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
		return __( 'Testimonial Carousel', 'my-elementor-addons' );
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
		return 'eicon-testimonial-carousel';
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
		return [ 'owl-theme-default', 'owl-carousel', 'owl' ];
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
		return [ 'owl-carousel', 'testimonial-carousel' ];
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
				'label' => __( 'Content', 'my-elementor-addons' ),
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'photo', [
				'label'       => __( 'Photo', 'my-elementor-addons' ),
				'type'        => Controls_Manager::MEDIA,
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'name', [
				'label'       => __( 'Name', 'my-elementor-addons' ),
				'default'	  => __( 'Jane Doe', 'my-elementor-addons' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'designation', [
				'label'       => __( 'Designation', 'my-elementor-addons' ),
				'default'	  => __( 'CEO', 'my-elementor-addons' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'description', [
				'label'      => __( 'Description', 'my-elementor-addons' ),
				'default'	 => __( 'Description goes to here..', 'my-elementor-addons' ),
				'type'       => Controls_Manager::TEXTAREA,
			]
		);

		$this->add_control(
			'testimonials',
			[
				'label'       => __( 'Testimonials', 'my-elementor-addons' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'title_field' => '{{{ name }}}',
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
			'item_show',
			[
				'label'   => __( 'Item Show', 'my-elementor-addons' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '2',
				'options' => [
					'1' => __( '1', 'my-elementor-addons' ),
					'2' => __( '2', 'my-elementor-addons' ),
					'3' => __( '3', 'my-elementor-addons' ),
					'4' => __( '4', 'my-elementor-addons' ),
					'5' => __( '5', 'my-elementor-addons' ),
				],
			]
		);

		$this->add_control(
			'autoplay',
			[
				'label'        => __( 'Autoplay', 'my-elementor-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'On', 'my-elementor-addons' ),
				'label_off'    => __( 'Off', 'my-elementor-addons' ),
				'return_value' => 'true',
				'default'      => 'true',
			]
		);

		$this->end_controls_section();

	}

	protected function register_style_controls() {
		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Box Area', 'my-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
            'box_padding',
            [
                'label' => __( 'Padding', 'my-elementor-addons' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .testimonial-item .card-body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

		$this->add_control(
			'box_color',
			[
				'label'     => __( 'Background Color', 'my-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonial-item .testimonial-card' => 'background: {{VALUE}}',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'box_border',
				'selector' => '{{WRAPPER}} .testimonial-item .testimonial-card',
			]
		);

		$this->add_responsive_control(
			'box_border_radius',
			[
				'label'      => __( 'Border Radius', 'my-elementor-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} .testimonial-item .testimonial-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_testimonial',
			[
				'label' => __( 'Testimonial', 'my-elementor-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'photo_height',
			[
				'label'      => __( 'Photo Size', 'my-elementor-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range'      => [
					'px' => [
						'min' => 100,
						'max' => 300,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .testimonial-card .card-body img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'photo_spacing',
			[
				'label'      => __( 'Bottom Spacing', 'my-elementor-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors'  => [
					'{{WRAPPER}} .testimonial-card .card-body img' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
				],
			]
		);

		$this->add_control(
			'name',
			[
				'label'     => __( 'Name', 'my-elementor-addons' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'name_color',
			[
				'label'     => __( 'Text Color', 'my-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonial-name' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'name_typography',
				'label'    => __( 'Typography', 'my-elementor-addons' ),
				'selector' => '{{WRAPPER}} .testimonial-name',
				'scheme'   => Typography::TYPOGRAPHY_1,
			]
		);

		$this->add_responsive_control(
			'name_spacing',
			[
				'label'      => __( 'Bottom Spacing', 'my-elementor-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors'  => [
					'{{WRAPPER}} .testimonial-name' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
				],
			]
		);

		$this->add_control(
			'designation',
			[
				'label'     => __( 'Designation', 'my-elementor-addons' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'designation_color',
			[
				'label'     => __( 'Text Color', 'my-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonial-designation' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'designation_typography',
				'label'    => __( 'Typography', 'my-elementor-addons' ),
				'selector' => '{{WRAPPER}} .testimonial-designation',
				'scheme'   => Typography::TYPOGRAPHY_2,
			]
		);

		$this->add_control(
			'description',
			[
				'label'     => __( 'Description', 'my-elementor-addons' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'description_color',
			[
				'label'     => __( 'Text Color', 'my-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonial-description' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'description_typography',
				'label'    => __( 'Typography', 'my-elementor-addons' ),
				'selector' => '{{WRAPPER}} .testimonial-description',
				'scheme'   => Typography::TYPOGRAPHY_3,
			]
		);

		$this->add_responsive_control(
			'description_spacing',
			[
				'label'      => __( 'Bottom Spacing', 'my-elementor-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors'  => [
					'{{WRAPPER}} .testimonial-description' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
				],
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

		$autoplay = '';
		if( true == $settings['autoplay'] ){
			$autoplay = 'true';
		}else{
			$autoplay = 'false';
		}
		?>
		<div class="owl-carousel owl-theme dot-style-2" data-items="[<?php echo esc_attr( $settings['item_show'] );?>]" data-margin="30" data-loop="true" data-autoplay="<?php echo esc_attr( $autoplay );?>" data-dots="true">
			<?php
			foreach($settings['testimonials'] as $testimonial){
				$image = wp_get_attachment_image_url( $testimonial['photo']['id'] );
				?>
				<div class="testimonial-item">
					<div class="testimonial-card">
						<div class="card-body">
							<img src="<?php echo esc_url( $image );?>" alt="<?php echo esc_attr( $testimonial['name'] );?>">
							<div class="testimonial-description">
								<?php echo esc_html( $testimonial['description'] ) ;?>
							</div>
							<div class="testimonial-name"><?php echo esc_html( $testimonial['name'] );?></div>
							<div class="testimonial-designation"><?php echo esc_html( $testimonial['designation'] );?></div>
						</div>
					</div>
				</div>
				<?php
			}
			?>
		</div>
		<?php
	}
}
