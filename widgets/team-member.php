<?php
namespace MyElementorAddons\Elementor\Widget;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;
use Elementor\Core\Schemes\Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Team_Member extends Base {

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
		return __( 'Team Member', 'my-elementor-addons' );
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
		return 'eicon-person';
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
		return [ 'team-member' ];
	}

	/**
	 * Custom Function
	 */
	protected static function get_profile_names() {
		return [
			'500px'          => __( '500px', 'my-elementor-addons' ),
			'apple'          => __( 'Apple', 'my-elementor-addons' ),
			'behance'        => __( 'Behance', 'my-elementor-addons' ),
			'bitbucket'      => __( 'BitBucket', 'my-elementor-addons' ),
			'codepen'        => __( 'CodePen', 'my-elementor-addons' ),
			'delicious'      => __( 'Delicious', 'my-elementor-addons' ),
			'deviantart'     => __( 'DeviantArt', 'my-elementor-addons' ),
			'digg'           => __( 'Digg', 'my-elementor-addons' ),
			'dribbble'       => __( 'Dribbble', 'my-elementor-addons' ),
			'email'          => __( 'Email', 'my-elementor-addons' ),
			'facebook'       => __( 'Facebook', 'my-elementor-addons' ),
			'flickr'         => __( 'Flicker', 'my-elementor-addons' ),
			'foursquare'     => __( 'FourSquare', 'my-elementor-addons' ),
			'github'         => __( 'Github', 'my-elementor-addons' ),
			'houzz'          => __( 'Houzz', 'my-elementor-addons' ),
			'instagram'      => __( 'Instagram', 'my-elementor-addons' ),
			'jsfiddle'       => __( 'JS Fiddle', 'my-elementor-addons' ),
			'linkedin'       => __( 'LinkedIn', 'my-elementor-addons' ),
			'medium'         => __( 'Medium', 'my-elementor-addons' ),
			'pinterest'      => __( 'Pinterest', 'my-elementor-addons' ),
			'product-hunt'   => __( 'Product Hunt', 'my-elementor-addons' ),
			'reddit'         => __( 'Reddit', 'my-elementor-addons' ),
			'slideshare'     => __( 'Slide Share', 'my-elementor-addons' ),
			'snapchat'       => __( 'Snapchat', 'my-elementor-addons' ),
			'soundcloud'     => __( 'SoundCloud', 'my-elementor-addons' ),
			'spotify'        => __( 'Spotify', 'my-elementor-addons' ),
			'stack-overflow' => __( 'StackOverflow', 'my-elementor-addons' ),
			'tripadvisor'    => __( 'TripAdvisor', 'my-elementor-addons' ),
			'tumblr'         => __( 'Tumblr', 'my-elementor-addons' ),
			'twitch'         => __( 'Twitch', 'my-elementor-addons' ),
			'twitter'        => __( 'Twitter', 'my-elementor-addons' ),
			'vimeo'          => __( 'Vimeo', 'my-elementor-addons' ),
			'vk'             => __( 'VK', 'my-elementor-addons' ),
			'website'        => __( 'Website', 'my-elementor-addons' ),
			'whatsapp'       => __( 'WhatsApp', 'my-elementor-addons' ),
			'wordpress'      => __( 'WordPress', 'my-elementor-addons' ),
			'xing'           => __( 'Xing', 'my-elementor-addons' ),
			'yelp'           => __( 'Yelp', 'my-elementor-addons' ),
			'youtube'        => __( 'YouTube', 'my-elementor-addons' ),
		];
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
				'label' => __( 'Information', 'my-elementor-addons' ),
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
			'title',
			[
				'label'       => __( 'Name', 'my-elementor-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Jane Doe', 'my-elementor-addons' ),
				'placeholder' => __( 'Type Member Name', 'my-elementor-addons' ),
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
				'default'     => __( 'CTO', 'my-elementor-addons' ),
				'placeholder' => __( 'Type Member Job Title', 'my-elementor-addons' ),
				'dynamic'     => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'bio',
			[
				'label'       => __( 'Short Bio', 'my-elementor-addons' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => __( 'Type your short bio', 'my-elementor-addons' ),
				'rows'        => 5,
				'dynamic'     => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'title_tag',
			[
				'label'     => __( 'Title HTML Tag', 'my-elementor-addons' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => [
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
				'default'   => 'h2',
				'toggle'    => false,
				'separator' => 'before',
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
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_social',
			[
				'label' => __( 'Social Profiles', 'happy-elementor-addons' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'name',
			[
				'label'          => __( 'Profile Name', 'happy-elementor-addons' ),
				'type'           => Controls_Manager::SELECT2,
				'label_block'    => true,
				'select2options' => [
					'allowClear' => false,
				],
				'options'        => self::get_profile_names(),
			]
		);

		$repeater->add_control(
			'link', [
				'label'         => __( 'Profile Link', 'happy-elementor-addons' ),
				'placeholder'   => __( 'Add your profile link', 'happy-elementor-addons' ),
				'type'          => Controls_Manager::URL,
				'label_block'   => true,
				'autocomplete'  => false,
				'show_external' => false,
				'condition'     => [
					'name!' => 'email',
				],
				'dynamic'       => [
					'active' => true,
				],
			]
		);

		$repeater->add_control(
			'email', [
				'label'       => __( 'Email Address', 'happy-elementor-addons' ),
				'placeholder' => __( 'Add your email address', 'happy-elementor-addons' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => false,
				'input_type'  => 'email',
				'condition'   => [
					'name' => 'email',
				],
				'dynamic'     => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'profiles',
			[
				'show_label'  => false,
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'title_field' => '<# print(name.slice(0,1).toUpperCase() + name.slice(1)) #>',
				'default'     => [
					[
						'link' => ['url' => 'https://facebook.com/'],
						'name' => 'facebook',
					],
					[
						'link' => ['url' => 'https://linkedin.com/'],
						'name' => 'linkedin',
					],
					[
						'link' => ['url' => 'https://twitter.com/'],
						'name' => 'twitter',
					],
				],
			]
		);

		$this->add_control(
			'show_profiles',
			[
				'label'          => __( 'Show Profiles', 'happy-elementor-addons' ),
				'type'           => Controls_Manager::SWITCHER,
				'label_on'       => __( 'Show', 'happy-elementor-addons' ),
				'label_off'      => __( 'Hide', 'happy-elementor-addons' ),
				'return_value'   => 'yes',
				'default'        => 'yes',
				'separator'      => 'before',
				'style_transfer' => true,
			]
		);

		$this->end_controls_section();

	}

	protected function register_style_controls() {
		$this->start_controls_section(
			'section_style_image',
			[
				'label' => __( 'Photo', 'my-elementor-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'image_width',
			[
				'label'      => __( 'Width', 'happy-elementor-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range'      => [
					'%'  => [
						'min' => 20,
						'max' => 100,
					],
					'px' => [
						'min' => 100,
						'max' => 700,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .team-member-figure' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'image_height',
			[
				'label'      => __( 'Height', 'happy-elementor-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range'      => [
					'px' => [
						'min' => 100,
						'max' => 700,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .team-member-figure' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'image_spacing',
			[
				'label'      => __( 'Bottom Spacing', 'happy-elementor-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors'  => [
					'{{WRAPPER}} .team-member-figure' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
				],
			]
		);

		$this->add_responsive_control(
			'image_padding',
			[
				'label'      => __( 'Padding', 'happy-elementor-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors'  => [
					'{{WRAPPER}} .team-member-figure img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'image_border',
				'selector' => '{{WRAPPER}} .team-member-figure img',
			]
		);

		$this->add_responsive_control(
			'image_border_radius',
			[
				'label'      => __( 'Border Radius', 'happy-elementor-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} .team-member-figure img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .team-member-figure img',
			]
		);

		$this->add_control(
			'image_bg_color',
			[
				'label'     => __( 'Background Color', 'happy-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .team-member-figure img' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_content',
			[
				'label' => __( 'Name, Job Title & Bio', 'happy-elementor-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'content_padding',
			[
				'label'      => __( 'Content Padding', 'happy-elementor-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors'  => [
					'{{WRAPPER}} .team-member-body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'heading_title',
			[
				'type'      => Controls_Manager::HEADING,
				'label'     => __( 'Name', 'happy-elementor-addons' ),
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'title_spacing',
			[
				'label'      => __( 'Bottom Spacing', 'happy-elementor-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors'  => [
					'{{WRAPPER}} .team-member-name' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'     => __( 'Text Color', 'happy-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .team-member-name' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typography',
				'selector' => '{{WRAPPER}} .team-member-name',
				'scheme'   => Typography::TYPOGRAPHY_2,
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name'     => 'title_text_shadow',
				'selector' => '{{WRAPPER}} .team-member-name',
			]
		);

		$this->add_control(
			'heading_job_title',
			[
				'type'      => Controls_Manager::HEADING,
				'label'     => __( 'Job Title', 'happy-elementor-addons' ),
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'job_title_spacing',
			[
				'label'      => __( 'Bottom Spacing', 'happy-elementor-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors'  => [
					'{{WRAPPER}} .team-member-position' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'job_title_color',
			[
				'label'     => __( 'Text Color', 'happy-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .team-member-position' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'job_title_typography',
				'selector' => '{{WRAPPER}} .team-member-position',
				'scheme'   => Typography::TYPOGRAPHY_3,
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name'     => 'job_title_text_shadow',
				'selector' => '{{WRAPPER}} .team-member-position',
			]
		);

		$this->add_control(
			'heading_bio',
			[
				'type'      => Controls_Manager::HEADING,
				'label'     => __( 'Short Bio', 'happy-elementor-addons' ),
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'bio_spacing',
			[
				'label'      => __( 'Bottom Spacing', 'happy-elementor-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors'  => [
					'{{WRAPPER}} .team-member-bio' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'bio_color',
			[
				'label'     => __( 'Text Color', 'happy-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .team-member-bio' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'bio_typography',
				'selector' => '{{WRAPPER}} .team-member-bio',
				'scheme'   => Typography::TYPOGRAPHY_3,
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name'     => 'bio_text_shadow',
				'selector' => '{{WRAPPER}} .team-member-bio',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_social',
			[
				'label' => __( 'Social Icons', 'happy-elementor-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'links_spacing',
			[
				'label'      => __( 'Right Spacing', 'happy-elementor-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors'  => [
					'{{WRAPPER}} .team-member-links > a:not(:last-child)' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'links_padding',
			[
				'label'      => __( 'Padding', 'happy-elementor-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors'  => [
					'{{WRAPPER}} .team-member-links > a' => 'padding: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'links_icon_size',
			[
				'label'      => __( 'Icon Size', 'happy-elementor-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors'  => [
					'{{WRAPPER}} .team-member-links > a' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'links_border',
				'selector' => '{{WRAPPER}} .team-member-links > a',
			]
		);

		$this->add_responsive_control(
			'links_border_radius',
			[
				'label'      => __( 'Border Radius', 'happy-elementor-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors'  => [
					'{{WRAPPER}} .team-member-links > a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs( 'tab_links_colors' );

		$this->start_controls_tab(
			'tab_links_normal',
			[
				'label' => __( 'Normal', 'happy-elementor-addons' ),
			]
		);

		$this->add_control(
			'links_color',
			[
				'label'     => __( 'Text Color', 'happy-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .team-member-links > a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'links_bg_color',
			[
				'label'     => __( 'Background Color', 'happy-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .team-member-links > a' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_links_hover',
			[
				'label' => __( 'Hover', 'happy-elementor-addons' ),
			]
		);

		$this->add_control(
			'links_hover_color',
			[
				'label'     => __( 'Text Color', 'happy-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .team-member-links > a:hover, {{WRAPPER}} .team-member-links > a:focus' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'links_hover_bg_color',
			[
				'label'     => __( 'Background Color', 'happy-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .team-member-links > a:hover, {{WRAPPER}} .team-member-links > a:focus' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'links_hover_border_color',
			[
				'label'     => __( 'Border Color', 'happy-elementor-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .team-member-links > a:hover, {{WRAPPER}} .team-member-links > a:focus' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'links_border_border!' => '',
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

		$this->add_inline_editing_attributes( 'title', 'basic' );
		$this->add_render_attribute( 'title', 'class', 'team-member-name' );

		$this->add_inline_editing_attributes( 'job_title', 'basic' );
		$this->add_render_attribute( 'job_title', 'class', 'team-member-position' );

		$this->add_inline_editing_attributes( 'bio', 'intermediate' );
		$this->add_render_attribute( 'bio', 'class', 'team-member-bio' );
		?>

		<?php if ( $settings['image']['url'] || $settings['image']['id'] ) :
			$settings['hover_animation'] = 'disable-animation';
			?>
			<figure class="team-member-figure">
				<?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' ); ?>
			</figure>
		<?php endif; ?>

		<div class="team-member-body">
			<?php if ( $settings['title'] ) :
				printf( '<%1$s %2$s>%3$s</%1$s>',
					tag_escape( $settings['title_tag'] ),
					$this->get_render_attribute_string( 'title' ),
					esc_attr( $settings['title'] )
				);
			endif; ?>

			<?php if ( $settings['job_title' ] ) : ?>
				<div <?php $this->print_render_attribute_string( 'job_title' ); ?>><?php echo esc_html( $settings['job_title' ] ); ?></div>
			<?php endif; ?>

			<?php if ( $settings['bio'] ) : ?>
				<div <?php $this->print_render_attribute_string( 'bio' ); ?>>
					<p><?php echo esc_html( $settings['bio'] ); ?></p>
				</div>
			<?php endif; ?>

			<?php if ( $settings['show_profiles' ] && is_array( $settings['profiles' ] ) ) : ?>
				<div class="team-member-links">
					<?php
					foreach ( $settings['profiles'] as $profile ) :
						$icon = $profile['name'];
						$url = isset( $profile['link']['url'] ) ? $profile['link']['url'] : null;

						if ( $profile['name'] === 'website' ) {
							$icon = 'globe far';
						} elseif ( $profile['name'] === 'email' ) {
							$icon = 'envelope far';
							$url = 'mailto:' . antispambot( $profile['email'] );
						} else {
							$icon .= ' fab';
						}

						printf( '<a target="_blank" rel="noopener" href="%s" class="elementor-repeater-item-%s"><i class="fa fa-%s" aria-hidden="true"></i></a>',
							$url,
							esc_attr( $profile['_id'] ),
							esc_attr( $icon )
						);
					endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
		<?php
	}
}
