<?php
/**
 * The main template file.
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Jumpstart
 */ ?>


<?php include_once("templates/shared/header.php"); ?>


<div class="content">
	<?php if (have_posts()) :
		while ( have_posts() ) : the_post();
			get_template_part( 'content', get_post_format() );
		endwhile;
	?>
	<?php else : ?>
		<h1>Nothing To See</h1>
	<?php endif; ?>
</div>


<?php include_once("templates/shared/footer.php"); ?>
