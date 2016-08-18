<?php

$heroImage = get_field('hero');
$introduction = get_field('neighborhood_introduction');
$subtitle = get_field('neighborhood_subtitle');
$description = get_field('neighborhood_description');
$contact = get_field('neighborhood_contact');
$blurb_title = get_field('neighborhood_blurb_title');
$blurb = get_field('neighborhood_blurb');

$caption = get_field('neighborhood_captions');
$first_caption = $caption[0];
$second_caption = $caption[1];

$images = get_field('neighborhood_gallery');

?>

<div class="neighborhood">

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- Title and Introduction -->

		<div class="hero" style="background-image: url('<?php echo $heroImage?>');">

			<div class="hero-content-bg">

				<div class="hero-content">

					<h1><?php the_title(); ?></h1>
					<p><?php echo $introduction; ?></p>
			
				</div>

			</div>

		</div>

		<!--End Title and Introduction -->

		<!-- Subtitle and Description -->

		<div class="container-caption">
			
			<div class="caption">

		        <h2><?php echo $subtitle; ?></h2>
				<p><?php echo $description; ?></p>
				<a href="<?php echo $contact; ?>" class="ll-btn">Contact an Agent</a>

	        </div>
				
		</div>

		<!--End Title and Description -->

	<?php endwhile; else: endif;?>

	<div class="container-content">

		<?php if ( $first_caption['neighborhood_caption_title' ] && $first_caption['neighborhood_caption' ] && $images[0] ) : ?>

			<div class="row container-content-block-1">

				<!-- Neighborhood Featured Image -->

				<?php if (have_posts()): while (have_posts()) : the_post(); ?>

					<div class="medium-9 columns">
						<?php if ( has_post_thumbnail() ) : ?>
							
							<?php $imageMainBlock1 = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID) ); ?>
							<div class="main-image" style="background-image:url('<?php echo $imageMainBlock1[0]; ?>');"></div>
							<!-- <img src="<?php echo $imageMainBlock1[0]; ?>"> -->
		                  	<?php //the_post_thumbnail(array(800, 600)); ?>
		                
		                <?php endif; ?>
		            </div>

				<?php endwhile; else: endif;?>

				<!-- End Neighborhood Featured Image -->

				<div class="medium-3 columns">

					<div class="row">

						<!-- First Neighborhood Caption -->

						<div class="medium-12 columns">

							<div class="caption">

								<h3><?php echo $first_caption['neighborhood_caption_title' ]; ?></h3>
								<?php echo $first_caption['neighborhood_caption' ]; ?>

							</div>
						
						</div>

						<!-- End Neighborhood Caption -->

					</div>

					<div class="row">

						<!-- Neighborhood Gallery -->

						<div class="medium-12 columns">
							
							<?php if( $images ): $image_0 = $images[0]; ?>
							    <img src="<?php echo $images[0]['url']; ?>" alt="<?php echo $image['alt']; ?>" />
							<?php endif; ?>
						</div>

						<!-- End Neighborhood Gallery -->

					</div>

				</div>

			</div>

		<?php endif; ?>

		<?php if ( $blurb_title && $blurb && $images[1] && $images[2] ) : ?>

			<div class="row container-content-block-2">

				<!-- Neighborhood Heading and Description -->

				<?php if (have_posts()): while (have_posts()) : the_post(); ?>

					<div class="medium-6 columns caption">
						<h2><?php echo $blurb_title; ?></h2>
						<p><?php echo $blurb; ?></p>
		            </div>

				<?php endwhile; else: endif;?>

				<!-- End Neighborhood Heading and Description -->

				<!-- Neighborhood Gallery -->

				<div class="medium-3 columns">

					<?php if( $images ): $image_1 = $images[1]; ?>
					    <img src="<?php echo $images[1]['url']; ?>" alt="<?php echo $image['alt']; ?>" />
					<?php endif; ?>

				</div>

				<div class="medium-3 columns">

					<?php if( $images ): $image_2 = $images[2]; ?>
					    <img src="<?php echo $images[2]['url']; ?>" alt="<?php echo $image['alt']; ?>" />
					<?php endif; ?>

				</div>

				<!-- End Neighborhood Gallery -->

			</div>

		<?php endif; ?>

		<?php if ( $images[3] && $images[4] && $images[5] && $images[6] ) : ?>

			<div class="row container-content-block-3">

				<!-- Neighborhood Gallery -->

				<div class="medium-3 columns">

					<?php if( $images ): $image_3 = $images[3]; ?>
					    <img src="<?php echo $images[3]['url']; ?>" alt="<?php echo $image['alt']; ?>" />
					<?php endif; ?>

				</div>

				<div class="medium-3 columns">

					<?php if( $images ): $image_4 = $images[4]; ?>
					    <img src="<?php echo $images[4]['url']; ?>" alt="<?php echo $image['alt']; ?>" />
					<?php endif; ?>

				</div>

				<div class="medium-3 columns">

					<?php if( $images ): $image_5 = $images[5]; ?>
					    <img src="<?php echo $images[3]['url']; ?>" alt="<?php echo $image['alt']; ?>" />
					<?php endif; ?>

				</div>

				<div class="medium-3 columns">

					<?php if( $images ): $image_6 = $images[6]; ?>
					    <img src="<?php echo $images[6]['url']; ?>" alt="<?php echo $image['alt']; ?>" />
					<?php endif; ?>

				</div>

				<!-- End Neighborhood Gallery -->

			</div>

		<?php endif; ?>

		<?php $featured = get_field('neighborhood_featured_article'); ?>

		<?php if ( $featured ) : ?>

			<div class="row container-content-block-4">

				<!-- Featured Article -->

				<?php if( $featured ): ?>

					<?php $post = $featured; setup_postdata( $post ); ?>

					<div class="medium-6 columns">
						<?php if ( has_post_thumbnail() ) : ?>
							<?php $imageMainBlock4 = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID) ); ?>
							<div class="main-image" style="background-image:url('<?php echo $imageMainBlock4[0]; ?>');"></div>
							<!-- <img src="<?php echo $imageMainBlock4[0]; ?>"> -->
		                	<?php // the_post_thumbnail(); ?>
		                <?php endif; ?>
				    </div>

				    <div class="medium-6 columns caption">
						<h2><?php the_title(); ?></h2>
						<p><?php the_excerpt(); ?></p>
						<a href="<?php the_permalink(); ?>" class="ll-btn">Read more</a>
				    </div>

			    	<?php wp_reset_postdata(); ?>

				<?php endif; ?>

				<!-- End Featured Article -->

			</div>

		<?php endif; ?>

		<?php if ( $images[7] && $images[8] ) : ?>

			<div class="row container-content-block-5">

				<!-- Neighborhood Gallery -->

				<div class="medium-6 columns">

					<?php if( $images ): $image_7 = $images[7]; ?>
						<div class="main-image" style="background-image:url('<?php echo $images[7]['url']; ?>');"></div>
					    <!-- <img src="<?php echo $images[7]['url']; ?>" alt="<?php echo $image['alt']; ?>" /> -->
					<?php endif; ?>

				</div>

				<div class="medium-6 columns">

					<?php if( $images ): $image_8 = $images[8]; ?>
						<div class="main-image" style="background-image:url('<?php echo $images[8]['url']; ?>');"></div>
					    <!-- <img src="<?php echo $images[8]['url']; ?>" alt="<?php echo $image['alt']; ?>" /> -->
					<?php endif; ?>

				</div>

				<!-- End Neighborhood Gallery -->

			</div>

		<?php endif; ?>

		<?php if ( $images[9] && $images[10] && $second_caption['neighborhood_caption_title' ] && $second_caption['neighborhood_caption' ] && $images[11] ) : ?>

			<div class="row container-content-block-6">

				<!-- Neighborhood Gallery -->

				<div class="medium-3 columns">

					<?php if( $images ): $image_9 = $images[9]; ?>
					    <img src="<?php echo $images[9]['url']; ?>" alt="<?php echo $image['alt']; ?>" />
					<?php endif; ?>

				</div>

				<div class="medium-3 columns">

					<?php if( $images ): $image_10 = $images[10]; ?>
					    <img src="<?php echo $images[10]['url']; ?>" alt="<?php echo $image['alt']; ?>" />
					<?php endif; ?>

				</div>

				<!-- End Neighborhood Gallery -->

				<!-- Second Neighborhood Caption -->

				<div class="medium-3 columns">

					<div class="caption">

						<h3><?php echo $second_caption['neighborhood_caption_title' ]; ?></h3>
						<?php echo $second_caption['neighborhood_caption' ]; ?>
					
					</div>

				</div>

				<!-- End Neighborhood Caption -->

				<!-- Neighborhood Gallery -->

				<div class="medium-3 columns">

					<?php if( $images ): $image_11 = $images[11]; ?>
					    <img src="<?php echo $images[11]['url']; ?>" alt="<?php echo $image['alt']; ?>" />
					<?php endif; ?>

				</div>

				<!-- End Neighborhood Gallery -->

			</div>

		<?php endif; ?>

		<!-- Blog Posts -->

		<div class="container-neighborhood-blog">

	    <?php if( have_rows('neighborhood_blog') ): ?>

	        <?php while ( have_rows('neighborhood_blog') ) : the_row(); ?>

	            <?php $hood = get_sub_field('neighborhood_blog_post'); ?>

	            <?php if( $hood ): ?>

	                <?php $post = $hood; setup_postdata( $post ); ?>

	                <div class="row content-neighborhood-blog">

	                	<div class="medium-6 columns caption">

	                    	<h2><?php the_title(); ?></h2>
	                    	<?php the_excerpt(); ?>
	                    	<div class="container-button">
	                    		<a href="<?php the_permalink();?>" class="ll-btn">Read more</a>
	                    	</div>

	                    </div>

						<div class="medium-6 columns">
							
	                    	<?php if ( has_post_thumbnail() ) : ?>
	                    		
	                    		<?php $imagePost = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID) ); ?>
	                    		<a href="<?php the_permalink();?>">
									<div class="blog-image" style="background-image:url('<?php echo $imagePost[0]; ?>');"></div>
								</a>
								<?php // the_post_thumbnail(); ?>

			                <?php endif; ?>

			            </div>

			        </div>

	                <?php wp_reset_postdata(); ?>

	            <?php endif; ?>

	        <?php endwhile; ?>

	    <?php endif; ?>

	    </div>

	    <!-- End Blog Posts -->

	</div>

</div>
