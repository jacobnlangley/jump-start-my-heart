<?php
/*
* Plugin Name: Official Treehouse Badges Plugin
* PLugin URI: wptreehouse.com/treehouse-badges-plugin/
* PLugin Description: Provides shortcodes & widgets to display Treehouse Badges on your WP site
* Version: 1.0
* Author: Zac Gordon
* Author URI: wp.zacgordon.com
* License: GPL2
*/

/*
* Assign Global Variables
*/

$plugin_url = WP_PLUGIN_URL . '/wptreehouse-badges';

// Add plugin link to settings menu, Settings > Treehouse Badges
function wptreehouse_badges_menu() {
  // Use add_options_page( $page_title, $menu_title, $capability, $menu-slug, $function )
  add_options_page(
    'Treehouse Badges Plugin',
    'Treehouse Badges',
    'manage_options',
    'wptreehouse-badges',
    'wptreehouse_badges_options_page'
  );
}

add_action('admin_menu', 'wptreehouse_badges_menu');


function wptreehouse_badges_options_page() {

  if(!current_user_can('manage_options')) {

    wp_die('You do not have sufficient permissions to access this page.');

  }

  global $plugin_url;

  if( isset( $_POST['wptreehouse_form_submitted'] ) ) {

    $hidden_field = esc_html( $_POST['wptreehouse_form_submitted'] );

    if ( $hidden_field == 'Y' ) {

      $wptreehouse_username = esc_html( $_POST['wptreehouse_username'] );

    }

  }

  require('inc/options-page-wrapper.php');

}

function wptreehouse_badges_styles() {
  wp_enqueue_style( 'wptreehouse_badges_styles', plugins_url( 'wptreehouse-badges/wptreehouse-badges.css' ) );
}

add_action( 'admin_head', 'wptreehouse_badges_styles' );

?>
