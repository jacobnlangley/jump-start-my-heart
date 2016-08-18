<?php
/**
 * The Default Page Template.
 * @package WordPress
 * @subpackage Jumpstart
 */ ?>

 <?php

 $images = get_field('default_gallery');

 ?>


 <?php include_once("templates/shared/header.php"); ?>


<div class="content <?= jumpstart_content_class(); ?>">

	<?php while ( have_posts() ) : the_post(); ?>

		<div class="row">
			<div class="small-12 medium-8 columns">
				<?php if( $images ): $image_0 = $images[0]; ?>
				    <img src="<?php echo $images[0]['url']; ?>" alt="<?php echo $image['alt']; ?>" />
				<?php endif; ?>
			</div>
			<div class="small-12 medium-4 columns">
				<div class="small-12 medium-12 columns">
					<h1><?php the_field('default_caption_title'); ?></h1>
					<p><?php the_field('default_caption'); ?></p>
				</div>
				<div class="small-12 medium-12 columns">
					<?php if( $images ): $image_1 = $images[1]; ?>
					    <img src="<?php echo $images[1]['url']; ?>" alt="<?php echo $image['alt']; ?>" />
					<?php endif; ?>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="medium-12 column">
				<div class="page-content">
					<h1><?php the_title(); ?></h1>

					<?php the_content(); ?>
				</div>
			</div>
		</div>

 	<?php endwhile; /* end of the loop.*/ ?>

</div>


<?php include_once("templates/shared/footer.php"); ?>
