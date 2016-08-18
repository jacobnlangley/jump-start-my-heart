<?php
/**
 * Single Post Template.
 * @package WordPress
 */ ?>


<?php include_once("templates/shared/header.php"); ?>

<?php

// get post type

$post_type = get_post_type($post->ID);

// replace _ with - to format post name like a file name

$post_type = str_replace("_", "-", $post_type);

// now go get the content partial named after the post type
// so for example, if the post type is news_group,
// then the partial it will get is content-news-group.php

if ($post_type == 'posttype') {

	get_template_part('templates/content/content-posttype');

} elseif ($post_type == 'posttype2') {

	get_template_part('templates/content/content-posttype2');

} else {

	get_template_part( 'templates/content/content', $post_type );

}

?>


<?php include_once("templates/shared/footer.php"); ?>
