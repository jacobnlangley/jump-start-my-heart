<?php
/**
 * The template used to display Tag Archive pages
 **/
?>

<?php include_once("inc/header.php"); ?>


<div class="content page-search">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>

		<?php endwhile; /* end of the loop.*/ ?>
	<?php else : ?>
		<p class="no-posts-message">There are no matches for this search term.</p>
	<?php endif; ?>

</div>


<?php include_once("templates/shared/footer.php"); ?> 
