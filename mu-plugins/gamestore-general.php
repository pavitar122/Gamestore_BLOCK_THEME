<?php
/**
 * Plugin Name: Gamestore General
 * Plugin URI:  https://example.com/my-sample-plugin
 * Description: Example plugin showing activation, CPT registration, settings page, shortcode and enqueueing.
 * Version:     1.0.0
 * Author:      Pavitar Singh
 * Author URI:  https://example.com
 * Text Domain: my-sample-plugin
 * Domain Path: /languages
 */


function gamestore_remve_dashboard_widgets()
{
    global $wp_meta_boxes;

    foreach ($wp_meta_boxes['dashboard'] as $context => $priorities) {
        foreach ($priorities as $priority => $widgets) {
            foreach ($widgets as $widget_id => $widget) {
                unset($wp_meta_boxes['dashboard'][$context][$priority][$widget_id]);
            }
        }
    }
}

add_action("wp_dashboard_setup", "gamestore_remve_dashboard_widgets");

