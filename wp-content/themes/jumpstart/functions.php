<?php

// Registration of navs, post types, etc.

add_action( 'after_setup_theme', 'jumpstart_setup', 2 );

if (!function_exists('jumpstart_setup')):

	function jumpstart_setup() {

		// Register nav menus here
		register_nav_menu( 'primary', 'Primary Menu' ); // templates/shared/header.php by default
		register_nav_menu( 'footer', 'Footer Menu' );  // templates/shared/footer.php by default

		// Add post thumbnails
		add_theme_support( 'post-thumbnails' );

		// Custom post types
		include('post-types/post-types.php');

	}

endif;


// Remove extra menu items

add_action('admin_menu', 'jumpstart_remove_menus');

	function jumpstart_remove_menus() {
		remove_menu_page('edit-comments.php');
		remove_menu_page('link-manager.php');
	}


// Add classes / page name to body element

add_filter( 'body_class', 'jumpstart_add_body_class' );

if ( ! function_exists( 'jumpstart_add_body_class' ) ):

	function jumpstart_add_body_class($wp_classes) {
		global $post;

		// List of the only WP generated classes allowed
		$whitelist = array('logged-in', 'admin-bar', 'single');

		// Filter the body classes
		$wp_classes = array_intersect($wp_classes, $whitelist);

		$wp_classes[] = 'wordpress-site';

		if (!empty($post)) {
			$classes[] = $post->post_name;
			$classes[] = get_post_type($post);

			foreach((get_the_category($post->ID)) as $category)
				$classes[] = $category->category_nicename;

			// Add the new classes
			return array_merge($wp_classes, (array) $classes);
		}
		return $wp_classes;
	}

endif;


// Add template name to content element

function jumpstart_content_class() {
	global $post;
	$classes = '';

	if (!empty($post)) {

		$template = get_page_template_slug($post->ID);

		if ($template !== false && $template != 'page.php') { // False means not a page template
			$classes = str_replace('.php', '', $template); // Remove .php from template slug
		}

		return $classes;
	}
}


// Returns theme's url for use in templates

add_shortcode( 'theme_uri', 'jumpstart_get_theme_uri' );

if ( ! function_exists( 'jumpstart_get_theme_uri' ) ):

	function jumpstart_get_theme_uri() {
		$theme_url = get_stylesheet_uri();
		$theme_url = str_replace("/style.css", "", $theme_url);

		return $theme_url;
	}

endif;

// Remove wordpress thumbnail sizes

add_filter('intermediate_image_sizes_advanced', 'jumpstart_remove_image_sizes');
add_filter('image_size_names_choose', 'looklisten_remove_image_sizes');

function jumpstart_remove_image_sizes($sizes) {
	unset( $sizes['thumbnail']);
	unset( $sizes['medium']);
	unset( $sizes['large']);

	return $sizes;
}

function jumpstart_custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'jumpstart_custom_excerpt_length', 999 );

//Add Copyright
function jumpstart_copyright() {
	global $wpdb;
	$copyright_dates = $wpdb->get_results("
		SELECT
		YEAR(min(post_date_gmt)) AS firstdate,
		YEAR(max(post_date_gmt)) AS lastdate
		FROM
		$wpdb->posts
		WHERE
		post_status = 'publish'
	");
	$output = '';
	if($copyright_dates) {
		$copyright = "&copy; " . $copyright_dates[0]->firstdate;
		if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
			$copyright .= '-' . $copyright_dates[0]->lastdate;
		}
		$output = $copyright;
	}
	return $output;
}

function wp_new_excerpt($text)
{
	if ($text == '')
	{
		$text = get_the_content('');
		$text = strip_shortcodes( $text );
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]>', $text);
		$text = strip_tags($text);
		$text = nl2br($text);
		$excerpt_length = apply_filters('excerpt_length', 400);
		$words = explode(' ', $text, $excerpt_length + 1);
		if (count($words) > $excerpt_length) {
			array_pop($words);
			array_push($words, '');
			$text = implode(' ', $words);
		}
	}
	return $text;
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'wp_new_excerpt');

?>
