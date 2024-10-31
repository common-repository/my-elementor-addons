<?php
/**
 * Helper functions
 *
 * @package My_Elementor_Addons
 */
defined( 'ABSPATH' ) || die();

/**
 * Check elementor version
 *
 * @param string $version
 * @param string $operator
 * @return bool
 */
function myea_elementor_version( $operator = '<', $version = '2.6.0' ) {
	return defined( 'ELEMENTOR_VERSION' ) && version_compare( ELEMENTOR_VERSION, $version, $operator );
}

/**
 * Render icon html with backward compatibility
 *
 * @param  array $settings
 * @param  string $old_icon_id
 * @param  string $new_icon_id
 * @param  array $attributes
 */
function myea_render_icon( $settings = [], $old_icon_id = 'icon', $new_icon_id = 'selected_icon', $attributes = [] ) {
	// Check if its already migrated
	$is_new_icon = isset($settings['__fa4_migrated'][$new_icon_id]);
	// Old icon control
	$is_old_icon = empty($settings[$old_icon_id]);

	$attributes['aria-hidden'] = 'true';

	if (myea_elementor_version('>=', '2.6.0') && ($is_old_icon || $is_new_icon)) {
		\Elementor\Icons_Manager::render_icon($settings[$new_icon_id], $attributes);
	} else {
		if (empty($attributes['class'])) {
			$attributes['class'] = $settings[$old_icon_id];
		} else {
			if (is_array($attributes['class'])) {
				$attributes['class'][] = $settings[$old_icon_id];
			} else {
				$attributes['class'] .= ' ' . $settings[$old_icon_id];
			}
		}
		printf('<i %s></i>', \Elementor\Utils::render_html_attributes($attributes));
	}
}