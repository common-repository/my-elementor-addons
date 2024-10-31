<?php
namespace MyElementorAddons\Elementor\Widget;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Review extends Base {

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
		return __( 'Review', 'my-elementor-addons' );
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
		return 'eicon-rating';
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
		return [ 'review' ];
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
				'label' => __( 'Review', 'my-elementor-addons' ),
			]
		);

		$this->add_control(
			'ratting',
			[
				'label'      => __( 'Rating', 'my-elementor-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'default'    => [
					'unit' => 'px',
					'size' => 4.2,
				],
				'size_units' => ['px'],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 5,
						'step' => .5,
					],
				],
				'dynamic'    => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'ratting_style',
			[
				'label'          => __( 'Rating Style', 'my-elementor-addons' ),
				'type'           => Controls_Manager::SELECT,
				'options'        => [
					'star' => __( 'Star', 'my-elementor-addons' ),
					'num'  => __( 'Number', 'my-elementor-addons' ),
				],
				'default'        => 'star',
				'style_transfer' => true,
			]
		);

		$this->add_control(
			'review',
			[
				'label'       => __( 'Review', 'my-elementor-addons' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => __( 'Lorem ipsum dolor sit amet', 'my-elementor-addons' ),
				'separator'   => 'before',
				'dynamic'     => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'review_position',
			[
				'label'          => __( 'Review Position', 'my-elementor-addons' ),
				'type'           => Controls_Manager::SELECT,
				'options'        => [
					'before' => __( 'Before Rating', 'my-elementor-addons' ),
					'after'  => __( 'After Rating', 'my-elementor-addons' ),
				],
				'default'        => 'before',
				'style_transfer' => true,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_reviewer',
			[
				'label' => __( 'Reviewer', 'my-elementor-addons' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'image',
			[
				'label'   => __( 'Photo', 'my-elementor-addons' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name'      => 'thumbnail',
				'default'   => 'large',
				'separator' => 'none',
			]
		);

		$this->add_control(
			'image_position',
			[
				'label'          => __( 'Image Position', 'my-elementor-addons' ),
				'type'           => Controls_Manager::CHOOSE,
				'label_block'    => false,
				'options'        => [
					'left'  => [
						'title' => __( 'Left', 'my-elementor-addons' ),
						'icon'  => 'eicon-h-align-left',
					],
					'top'   => [
						'title' => __( 'Top', 'my-elementor-addons' ),
						'icon'  => 'eicon-v-align-top',
					],
					'right' => [
						'title' => __( 'Right', 'my-elementor-addons' ),
						'icon'  => 'eicon-h-align-right',
					],
				],
				'default'        => 'top',
				'toggle'         => false,
				'prefix_class'   => 'my-review--',
				'style_transfer' => true,
			]
		);

		$this->add_control(
			'title',
			[
				'label'       => __( 'Name', 'my-elementor-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => 'John Doe',
				'separator'   => 'before',
				'dynamic'     => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'job_title',
			[
				'label'       => __( 'Job Title', 'my-elementor-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'CEO', 'my-elementor-addons' ),
				'dynamic'     => [
					'active' => true,
				],
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label'     => __( 'Alignment', 'my-elementor-addons' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => [
					'left'    => [
						'title' => __( 'Left', 'my-elementor-addons' ),
						'icon'  => 'eicon-text-align-left',
					],
					'center'  => [
						'title' => __( 'Center', 'my-elementor-addons' ),
						'icon'  => 'eicon-text-align-center',
					],
					'right'   => [
						'title' => __( 'Right', 'my-elementor-addons' ),
						'icon'  => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => __( 'Justify', 'my-elementor-addons' ),
						'icon'  => 'eicon-text-align-justify',
					],
				],
				'toggle'    => true,
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .elementor-widget-container' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'title_tag',
			[
				'label'   => __( 'Name HTML Tag', 'my-elementor-addons' ),
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
				'default' => 'h2',
				'toggle'  => false,
			]
		);

		$this->end_controls_section();

	}

	protected function register_style_controls() {
		$this->start_controls_section(
			'section_photo_style',
			[
				'label' => __( 'Photo', 'my-elementor-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
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
						'min' => 70,
						'max' => 500,
					],
					'%'  => [
						'min' => 10,
						'max' => 100,
					],
				],
				'selectors'  => [
					'{{WRAPPER}}' => '--my-review-media-width: {{SIZE}}{{UNIT}};',
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
						'min' => 70,
						'max' => 500,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .my-review-figure' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'offset_toggle',
			[
				'label'        => __( 'Offset', 'my-elementor-addons' ),
				'type'         => Controls_Manager::POPOVER_TOGGLE,
				'label_off'    => __( 'None', 'my-elementor-addons' ),
				'label_on'     => __( 'Custom', 'my-elementor-addons' ),
				'return_value' => 'yes',
			]
		);

		$this->start_popover();

		$this->add_responsive_control(
			'image_offset_x',
			[
				'label'      => __( 'Offset X', 'my-elementor-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'condition'  => [
					'offset_toggle' => 'yes',
				],
				'range'      => [
					'px' => [
						'min' => -1000,
						'max' => 1000,
					],
				],
				'selectors'  => [
					'{{WRAPPER}}' => '--my-review-media-offset-x: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'image_offset_y',
			[
				'label'      => __( 'Offset Y', 'my-elementor-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'condition'  => [
					'offset_toggle' => 'yes',
				],
				'range'      => [
					'px' => [
						'min' => -1000,
						'max' => 1000,
					],
				],
				'selectors'  => [
					'{{WRAPPER}}' => '--my-review-media-offset-y: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_popover();

		$this->add_responsive_control(
			'image_padding',
			[
				'label'      => __( 'Padding', 'my-elementor-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors'  => [
					'{{WRAPPER}} .my-review-figure img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'image_border',
				'selector' => '{{WRAPPER}} .my-review-figure img',
			]
		);

		$this->add_responsive_control(
			'image_border_radius',
			[
				'label'      => __( 'Border Radius', 'my-elementor-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} .my-review-figure img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'image_box_shadow',
				'exclude'  => [
					'box_shadow_position',
				],
				'selector' => '{{WRAPPER}} .my-review-figure img',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_review_style',
			[
				'label' => __( 'Review & Reviewer', 'my-elementor-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'body_padding',
			[
				'label'      => __( 'Text Box Padding', 'my-elementor-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors'  => [
					'{{WRAPPER}} .my-review-body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'heading_name',
			[
				'type'      => Controls_Manager::HEADING,
				'label'     => __( 'Name', 'my-elementor-addons' ),
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
					'{{WRAPPER}} .my-review-reviewer' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'name_color',
			[
				'label'     => __( 'Text Color', 'my-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .my-review-reviewer' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'name_typography',
				'selector' => '{{WRAPPER}} .my-review-reviewer',
				'scheme'   => Typography::TYPOGRAPHY_2,
			]
		);

		$this->add_control(
			'heading_job_title',
			[
				'type'      => Controls_Manager::HEADING,
				'label'     => __( 'Job Title', 'my-elementor-addons' ),
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'job_title_spacing',
			[
				'label'      => __( 'Bottom Spacing', 'my-elementor-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors'  => [
					'{{WRAPPER}} .my-review-position' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'job_title_color',
			[
				'label'     => __( 'Text Color', 'my-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .my-review-position' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'job_title_typography',
				'selector' => '{{WRAPPER}} .my-review-position',
				'scheme'   => Typography::TYPOGRAPHY_3,
			]
		);

		$this->add_control(
			'heading_review',
			[
				'type'      => Controls_Manager::HEADING,
				'label'     => __( 'Review', 'my-elementor-addons' ),
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'review_spacing',
			[
				'label'      => __( 'Bottom Spacing', 'my-elementor-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors'  => [
					'{{WRAPPER}} .my-review-desc' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'review_color',
			[
				'label'     => __( 'Text Color', 'my-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .my-review-desc' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'review_typography',
				'selector' => '{{WRAPPER}} .my-review-desc',
				'scheme'   => Typography::TYPOGRAPHY_3,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_rating_style',
			[
				'label' => __( 'Rating', 'my-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'ratting_size',
			[
				'label'      => __( 'Size', 'my-elementor-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors'  => [
					'{{WRAPPER}} .my-review-ratting' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'ratting_spacing',
			[
				'label'      => __( 'Bottom Spacing', 'my-elementor-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors'  => [
					'{{WRAPPER}} .my-review-ratting' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'ratting_padding',
			[
				'label'      => __( 'Padding', 'my-elementor-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors'  => [
					'{{WRAPPER}} .my-review-ratting' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'ratting_color',
			[
				'label'     => __( 'Text Color', 'my-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .my-review-ratting' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'ratting_bg_color',
			[
				'label'     => __( 'Background Color', 'my-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .my-review-ratting' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'ratting_border',
				'selector' => '{{WRAPPER}} .my-review-ratting',
			]
		);

		$this->add_control(
			'ratting_border_radius',
			[
				'label'      => __( 'Border Radius', 'my-elementor-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} .my-review-ratting' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

		$this->add_inline_editing_attributes( 'title', 'basic' );
		$this->add_render_attribute( 'title', 'class', 'my-review-reviewer' );

		$this->add_inline_editing_attributes( 'job_title', 'basic' );
		$this->add_render_attribute( 'job_title', 'class', 'my-review-position' );

		$this->add_inline_editing_attributes( 'review', 'intermediate' );
		$this->add_render_attribute( 'review', 'class', 'my-review-desc' );

		$this->add_render_attribute( 'ratting', 'class', [
			'my-review-ratting',
			'my-review-ratting--' . $settings['ratting_style']
		] );

		$ratting = max( 0, $settings['ratting']['size'] );

		if ( $settings['image']['url'] || $settings['image']['id'] ) :
			$settings['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
			?>
			<figure class="my-review-figure">
				<?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' ); ?>
			</figure>
		<?php endif; ?>

		<div class="my-review-body">
			<?php if ( $settings['review_position'] === 'before' && $settings['review'] ) : ?>
				<div <?php $this->print_render_attribute_string( 'review' ); ?>>
					<p><?php echo esc_html( $settings['review'] ); ?></p>
				</div>
			<?php endif; ?>

			<div class="my-review-header">
				<?php if ( $settings['title' ] ) :
					printf( '<%1$s %2$s>%3$s</%1$s>',
						tag_escape( $settings['title_tag'] ),
						$this->get_render_attribute_string( 'title' ),
						esc_html( $settings['title' ] )
						);
				endif; ?>

				<?php if ( $settings['job_title' ] ) : ?>
					<div <?php $this->print_render_attribute_string( 'job_title' ); ?>><?php echo esc_html( $settings['job_title' ] ); ?></div>
				<?php endif; ?>

				<div <?php $this->print_render_attribute_string( 'ratting' ); ?>>
					<?php if ( $settings['ratting_style'] === 'num' ) : ?>
						<?php echo esc_html( $ratting ); ?> <i class="fas fa-star" aria-hidden="true"></i>
					<?php else :
						for ( $i = 1; $i <= 5; ++$i ) :
							if ( $i <= $ratting ) {
								echo '<i class="fas fa-star" aria-hidden="true"></i>';
							} else {
								echo '<i class="far fa-star" aria-hidden="true"></i>';
							}
						endfor;
					endif; ?>
				 </div>
			</div>

			<?php if ( $settings['review_position'] === 'after' && $settings['review'] ) : ?>
				<div <?php $this->print_render_attribute_string( 'review' ); ?>>
					<p><?php echo esc_html( $settings['review'] ); ?></p>
				</div>
			<?php endif; ?>
		</div>
		<?php
	}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _content_template() {
		?>
		<#
		view.addInlineEditingAttributes( 'title', 'basic' );
		view.addRenderAttribute( 'title', 'class', 'my-review-reviewer' );

		view.addInlineEditingAttributes( 'job_title', 'basic' );
		view.addRenderAttribute( 'job_title', 'class', 'my-review-position' );

		view.addInlineEditingAttributes( 'review', 'intermediate' );
		view.addRenderAttribute( 'review', 'class', 'my-review-desc' );

		var ratting = Math.max(0, settings.ratting.size);

		if (settings.image.url || settings.image.id) {
			var image = {
				id: settings.image.id,
				url: settings.image.url,
				size: settings.thumbnail_size,
				dimension: settings.thumbnail_custom_dimension,
				model: view.getEditModel()
			};

			var image_url = elementor.imagesManager.getImageUrl( image );
			#>
			<figure class="my-review-figure">
				<img src="{{ image_url }}">
			</figure>
		<# } #>

		<div class="my-review-body">
			<# if (settings.review_position === 'before' && settings.review) { #>
				<div {{{ view.getRenderAttributeString( 'review' ) }}}>
					<p>{{{ settings.review }}}</p>
				</div>
			<# } #>
			<div class="my-review-header">
				<# if (settings.title) { #>
					<{{ settings.title_tag }} {{{ view.getRenderAttributeString( 'title' ) }}}>{{{ settings.title }}}</{{ settings.title_tag }}>
				<# } #>
				<# if (settings.job_title) { #>
					<div {{{ view.getRenderAttributeString( 'job_title' ) }}}>{{{ settings.job_title }}}</div>
				<# } #>
				<# if ( settings.ratting_style === 'num' ) { #>
					<div class="my-review-ratting my-review-ratting--num">{{ ratting }} <i class="fa fa-star"></i></div>
				<# } else { #>
					<div class="my-review-ratting my-review-ratting--star">
						<# _.each(_.range(1, 6), function(i) {
							if (i <= ratting) {
								print('<i class="fas fa-star"></i>');
							} else {
								print('<i class="far fa-star"></i>');
							}
						}); #>
					</div>
				<# } #>
			</div>
			<# if ( settings.review_position === 'after' && settings.review) { #>
				<div {{{ view.getRenderAttributeString( 'review' ) }}}>
					<p>{{{ settings.review }}}</p>
				</div>
			<# } #>
		</div>
		<?php
	}
}
