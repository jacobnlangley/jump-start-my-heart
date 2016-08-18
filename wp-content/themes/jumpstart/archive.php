<?php include_once("templates/shared/header.php"); ?>

<div class="content archive <?= jumpstart_content_class(); ?>">

	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>

		<?php endwhile; /* end of the loop.*/ ?>
	<?php endif; ?>

</div>


<?php include_once("templates/shared/footer.php"); ?>
