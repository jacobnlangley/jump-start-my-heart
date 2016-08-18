<?php
/**
 * The template used to display Tag Archive pages
 **/
?>


<?php include_once("inc/header.php"); ?> 


<div class="content">
	
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
	
		<?php endwhile; /* end of the loop.*/ ?>
	<?php endif; ?>

</div>

<?php include_once("inc/footer.php"); ?> 

