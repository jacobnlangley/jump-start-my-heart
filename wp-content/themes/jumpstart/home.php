<?php
/**
 * The Home Template.
 * @package WordPress
 * @subpackage Jumpstart
 * Template Name: Home
 */ ?>


<?php include_once("templates/shared/header.php"); ?>

	<div class="content page-home <?= jumpstart_content_class(); ?>">

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- Home Page Hero Begin -->

			<?php if( have_rows('home_hero') ): ?>

				<div class="full-width">

					 	<?php while ( have_rows('home_hero') ) : the_row(); ?>

							<div class="hero"
							style="background-image:url(<?php the_sub_field('home_hero_image'); ?>);
							background-size:cover;background-position:center center;">

								<div class="row">

							        <div class="small-12 medium-12 columns">
								        <!-- <img src="<?php //the_sub_field('home_hero_image'); ?>" /> -->
								        <h1>
											<?php the_sub_field('home_hero_caption'); ?>
										</h1>
										<div class="hode-for-medium-down">
											<?php wp_nav_menu( array('menu' => 'Hero Menu' )); ?>
										</div>
									</div>

								</div>



							</div>

					    <?php endwhile; ?>

				</div>

			<?php endif; ?>

		<?php endwhile; else: endif;?>
		<!--Home Page Hero End-->

		<!-- Content Area Hero Begin -->
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

				<div class="row cta-container">
					<div class="small-12 medium-12 columns text-center">
						<h2><?php the_field('cta_container_caption'); ?></h2>
					</div>
					<?php if( have_rows('home_content_area') ): ?>
					 	<?php while ( have_rows('home_content_area') ) : the_row(); ?>
							<a href="<?php the_sub_field('content_area_link'); ?>">
						        <div class="small-4 medium-4 columns cta-buckets text-center">
							        <img src="<?php the_sub_field('content_area_thumbnail'); ?>" />
							        <h3>
										<?php the_sub_field('content_area_title'); ?>
									</h3>
							    </div>
							</a>
					    <?php endwhile; ?>
					<?php endif; ?>
				</div>

		<?php endwhile; else: endif;?>
		<!-- Content Area Hero End -->

		<!--Loop through home page data objects-->
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	    	<?php if( have_rows('home_page_objects') ): ?>

				<?php $num = 1; ?>

				<?php while ( have_rows('home_page_objects') ) : the_row(); ?>

					<?php $post_object = get_sub_field('home_object'); ?>

					<?php if( $post_object ): ?>

						<?php $post = $post_object; setup_postdata( $post ); ?>

						<?php if(($num % 2) == 1): ?>

							<div class="row home-objects">

								<div class="small-12 medium-6 medium-push-6 columns">
									<?php if ( has_post_thumbnail() ) : ?>
										<?php the_post_thumbnail(); ?>
									<?php endif; ?>
								</div>
								<div class="small-12 medium-6 medium-pull-6 columns">
									<div class="team">
										<h2><?php the_title(); ?></h2>
										<?php the_content();?>
										<a href="<?php the_permalink(); ?>" class="ll-btn ll-btn-fx fx-fx">Learn about us
											<i class="fa fa-long-arrow-right"></i>
										</a>
									</div>
								</div>

							</div>

						<?php elseif(($num % 2) == 0): ?>

							<div class="row home-objects">

								<div class="small-12 medium-6 columns">
									<?php if ( has_post_thumbnail() ) : ?>
							        	<?php the_post_thumbnail(); ?>
							        <?php endif; ?>
								</div>
		                        <div class="small-12 medium-6 columns">
									<div class="team">
										<h2><?php the_title(); ?></h2>
										<?php the_content();?>
										<a href="<?php the_permalink(); ?>" class="ll-btn">Learn about us
											<i class="fa fa-long-arrow-right"></i>
										</a>
									</div>
								</div>
							 </div>

						<?php endif; ?>

						<?php wp_reset_postdata(); ?>

					<?php endif; ?>

					<?php $num++; ?>

				<?php endwhile; ?>

			<?php endif; ?>

		<?php endwhile; else: endif; ?>

		<div class="row above-footer-hero">
			<div class="small-12 medium-12 columns text-center" style="background-image:url(<?php the_field('above_footer_hero'); ?>);
			background-size:cover;background-position:center center;">
				<h3><?php the_field('above_footer_caption'); ?></h3>
				<a href="#" class="ll-btn-reversed">Press <i class="fa fa-long-arrow-right"></i></a>
			</div>
		</div>

	    <!-- Page Objects End -->

	</div>

<?php include_once("templates/shared/footer.php"); ?>
