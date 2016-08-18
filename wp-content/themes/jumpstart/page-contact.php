<?php
/*
Template Name: Contact Us
*/
?>

<?php include_once("templates/shared/header.php"); ?>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<section class="full-width">
		<div class="row">
			<div class="small-12 medium-8 columns medium-centered">
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
	</section>

	<div class="row">
		<div class="small-12 medium-7 columns">
			<?php the_title(); ?>
			<?php the_content(); ?>
		</div>
		<div class="small-12 medium-5 columns">
			<div class="row">
				<div class="small-12 medium-12 columns">
					<?php if ( has_post_thumbnail() ) : ?>
			        	<?php the_post_thumbnail(); ?>
			        <?php endif; ?>
			    </div>
			    <div class="small-12 medium-4 columns">
			    	<p>Telephone - </p>
			    </div>
			    <div class="small-12 medium-8 columns">

			    	<?php if( have_rows('contact_telephone') ): ?>
						<?php while ( have_rows('contact_telephone') ) : the_row(); ?>

					        <p>
								<?php the_sub_field('telephone_city'); ?>
								<?php the_sub_field('telephone_number'); ?>
							</p>

					    <?php endwhile; ?>

					<?php endif; ?>

			    </div>
			    <div class="small-12 medium-4 columns">
			    	<p>Address - </p>
			    </div>
			    <div class="small-12 medium-8 columns">

			    	<?php the_field('contact_address'); ?>

			    </div>
			</div>
		</div>
	</div>

	<?php endwhile; else: endif;?>

<?php include_once("templates/shared/footer.php"); ?>
