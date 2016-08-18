<?php

$images = get_field('agents_gallery');
$title = get_field('agents_title');
$subhead = get_field('agents_subhead');
$emailAddress = get_field('agents_email_address');

?>

<div class="content">

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<div class="hero-title">

			<div class="row">
				<div class="medium-12 columns">
					<h1><?php the_title(); ?></h1>
					<p><?php echo $title; ?></p>
					<?php if ($emailAddress): ?>
						<a href="mailto:<?php echo $emailAddress; ?>" class="ll-btn">Contact <i class="fa fa-long-arrow-right"></i></a>
					<?php endif ?>
		        </div>
			</div>

		</div>

		<!-- Agent Featured Image -->

		<?php $imageHero = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID) ); ?>
			
		<div class="hero-image" style="background-image:url('<?php echo $imageHero[0]; ?>');"></div>

		<!-- End Agent Featured Image -->

		<div class="container-team-content">

			<div class="row">

			    <div class="medium-12 columns">

			    	<h2><?php echo $subhead; ?></h2>

			    	<div class="team-content-indent">
						<?php the_content(); ?>
					</div>

			    </div>

			</div>

		</div>

	<?php endwhile; else: endif;?>

	<!-- Neighborhood Feed -->

	<div class="row feed-top">

	    <div class="medium-3 columns">
			
			<div class="caption">

		        <h3>Anjelica's Feed</h3>
				<p>
					Lorem ipsum dolor sit amet, sit ipsum leo sed, gravida condimentum ipsum, sit sem fermentum vitae, consequat mauris sodales nisl blanditiis et. Sed semper, a neque dolores justo.
				</p>

	        </div>

	    </div>

	    <?php $images = get_field('agents_gallery'); ?>
	    
	    <div class="medium-3 columns">

			<?php if( $images ): $image_1 = $images[0]; ?>
			    <img src="<?php echo $images[0]['url']; ?>" alt="<?php echo $images[0]['alt']; ?>" />
			<?php endif; ?>

		</div>

	    <div class="medium-3 columns">
			
			<?php if( $images ): $image_2 = $images[1]; ?>
			    <img src="<?php echo $images[1]['url']; ?>" alt="<?php echo $images[1]['alt']; ?>" />
			<?php endif; ?>

	    </div>

	    <div class="medium-3 columns">

			<?php if( $images ): $image_3 = $images[2]; ?>
			    <img src="<?php echo $images[2]['url']; ?>" alt="<?php echo $images[2]['alt']; ?>" />
			<?php endif; ?>

	    </div>

	</div>

	<div class="row feed-bottom">

		<?php if( $images ): ?>

			<?php for ($i = 3; $i < count($images); $i++) : ?>

				<div class="medium-3 columns">
					<img src="<?php echo $images[$i]['url']; ?>" alt="<?php echo $images[$i]['alt']; ?>" />
			    </div>

		    <?php endfor; ?>

		<?php endif; ?>

	</div>

	<!-- End Neighborhood Feed -->

	<div class="row team-featured-article">

		<!-- Featured Article -->

		<?php $featured = get_field('agents_featured_article'); ?>

		<?php if( $featured ): ?>

			<?php $post = $featured; setup_postdata( $post ); ?>

			<div class="medium-9 columns">

				<?php if( $images ): $image_0 = $images[0]; ?>  
					<div class="main-image" style="background-image:url('<?php echo $images[0]['url']; ?>');"></div>              
				<?php endif; ?>

		    </div>

		    <div class="medium-3 columns">

		    	<div class="row">

			    	<div class="medium-12 columns">

			    		<div class="caption">

							<h3><?php the_title(); ?></h3>
							<p><?php the_excerpt(); ?></p>

						</div>

					</div>

					<div class="medium-12 columns">

						<?php if( $images ): $image_1 = $images[1]; ?>                
					    	<img src="<?php echo $images[1]['url']; ?>" alt="<?php echo $image['alt']; ?>" />
						<?php endif; ?>

					</div>
				
				</div>

		    </div>

	    	<?php wp_reset_postdata(); ?>

		<?php endif; ?>

		<!-- End Featured Article -->
	</div>

	<?php if( have_rows('agents_reviews') ): ?>

		<div class="container-review">

			<div class="row">
		    	<div class="medium-12 columns">
		    		<h5>What my new neighbors are saying about me...</h5>
		    	</div>
			</div>

		    <?php while ( have_rows('agents_reviews') ) : the_row(); ?>

		    	<div class="row content-review">

				    <div class="medium-2 columns">

				    	<p><?php the_sub_field('reviews_name'); ?></p>
				    	<p><?php the_sub_field('reviews_date'); ?></p>
				    
				    </div>

				    <div class="medium-10 columns">

				    	<?php the_sub_field('review'); ?>
				    
				    </div>
				   
				</div>

		    <?php endwhile; ?>
		
			<div class="row leave-review">
			    <div class="medium-12 columns">
			    	<a href="#">Leave a review</a>
				</div>
			</div>

		</div>

	<?php endif;?>

</div>