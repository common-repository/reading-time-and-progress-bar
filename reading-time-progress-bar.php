<?php
/**
 * Plugin Name: Reading Time and Progress Bar
 * Plugin URI:  https://aimactgrow.com/reading-time-progress-bar
 * Description: Displays the estimated reading time and a progress bar on blog posts.
 * Version:     1.0
 * Author:      Aman Joshi
 * Author URI:  https://aimactgrow.com/
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: reading-time-progress-bar
 */

// Prevent direct file access
defined('ABSPATH') or die('No script kiddies please!');

// Include the functions file
require_once plugin_dir_path(__FILE__) . 'includes/functions.php';

// Register and enqueue styles and scripts
add_action('wp_enqueue_scripts', 'rtpb_register_scripts');
function rtpb_register_scripts() {
    wp_enqueue_style('rt-progress-bar-style', plugin_dir_url(__FILE__) . 'css/style.css');
    wp_enqueue_script('rt-progress-bar-script', plugin_dir_url(__FILE__) . 'js/script.js', array('jquery'), null, true);
}

// Add reading time and progress bar to the content
add_filter('the_content', 'rtpb_add_reading_time');
function rtpb_add_reading_time($content) {
    if (is_single() && in_the_loop() && is_main_query()) {
        $reading_time = rtpb_calculate_reading_time($content);
        $progress_bar = '<div id="reading-progress-bar"></div>';
        $content = $progress_bar . '<p>Estimated Reading Time: ' . $reading_time . ' minutes</p>' . $content;
    }
    return $content;
}

// Load text domain for internationalization
add_action('plugins_loaded', 'rtpb_load_textdomain');
function rtpb_load_textdomain() {
    load_plugin_textdomain('reading-time-progress-bar', false, dirname(plugin_basename(__FILE__)) . '/languages/');
}
?>
