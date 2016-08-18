
<div class="content city">

		<?php if ( has_post_thumbnail() ) : ?>

			<?php $imageHero = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID) ); ?>
			
			<div class="hero" style="background-image:url('<?php echo $imageHero[0]; ?>');">
		
		<?php endif; ?>
		
		<h1><?php the_title(); ?></h1>

	</div>

	<div class="container-caption">
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	
			<div class="caption">
		        <p><?php the_field('city_caption'); ?></p>
	        </div>
	        
	        <?php the_content(); ?>

		<?php endwhile; else: endif;?>
	</div>

	<div class="row container-city-content">

		<div class="medium-7 columns">

		<!-- Blog Posts -->

	    <?php if( have_rows('city_feed') ): ?>
	 
	        <?php while ( have_rows('city_feed') ) : the_row(); ?>   

	            <?php $hood = get_sub_field('city_feed_post'); ?>

	            <?php if( $hood ): ?>

	                <?php $post = $hood; setup_postdata( $post ); ?>

            		<div class="row container-city-blog">

	                	<div class="medium-5 columns">
	                    	<?php if ( has_post_thumbnail() ) : ?>

								<?php $imagePost = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID) ); ?>
								
								<div class="blog-image" style="background-image:url('<?php echo $imagePost[0]; ?>');"></div>

			                <?php endif; ?>
			            </div>

			            <div class="medium-7 columns">
	                    	<h4><?php the_title(); ?></h4>
	                    	<?php the_excerpt(); ?>
	                    	<div class="container-button">
	                    		<a class="ll-btn" href="<?php the_permalink(); ?>">Read More -></a>
	                    	</div>
	                    </div>

	                    <div class="dashed-border"></div>

					</div>

	                <?php wp_reset_postdata(); ?>

	            <?php endif; ?>

	        <?php endwhile; ?>
	 
	    <?php endif; ?>

	    <!-- End Blog Posts -->

		</div>

		<div class="medium-5 columns container-city-hoods">

			<div class="row hood-title">
				
				<div class="small-9 columns">
					<h4>Neighborhoods</h4>
				</div>

				<div class="small-3 columns">
					<a href="">see all</a>
				</div>

			</div>
				
			<!-- Neighborhoods -->

		    <?php if( have_rows('city_neighborhood_feed') ): ?>
		 
		        <?php while ( have_rows('city_neighborhood_feed') ) : the_row(); ?>   

		            <?php $hood = get_sub_field('city_neighborhood_feed_post'); ?>

		            <?php if( $hood ): ?>

		                <?php $post = $hood; setup_postdata( $post ); ?>

	                	<div class="row">

		                	<div class="medium-12 columns">
		                    	<?php if ( has_post_thumbnail() ) : ?>

		                    		<?php $imageHood = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID) ); ?>
								
		                    		<a href="<?php the_permalink(); ?>" class="hood-image" style="background-image:url('<?php echo $imageHood[0]; ?>');">
				                  		<h5><?php the_title(); ?></h5>	
				                  	</a>

				                <?php endif; ?>
				            </div>

						</div>

		                <?php wp_reset_postdata(); ?>

		            <?php endif; ?>

		        <?php endwhile; ?>
		 
		    <?php endif; ?>

		    <!-- End Neighborhoods -->

		    <!-- Featured Neighborhood -->

		    <?php

			$post_object = get_field('city_featured_neighborhood');

			if( $post_object ): 

				// override $post
				$post = $post_object;
				setup_postdata( $post ); 

				// $images = get_field('neighborhood_gallery');

				?>

				<div class="row hood-featured-title">

				    <div class="medium-12 columns">
				    	<h4>Featured Neighborhood</h4>
				    	<h5><?php the_title(); ?></h5>
				    </div>

			    </div>

				<div class="row hood-image-gallery">

				    <div class="small-6 columns">
				    	<img src="http://placehold.it/200x200?text=img" alt="">
				    </div>

				    <div class="small-6 columns">
				    	<img src="http://placehold.it/200x200?text=img" alt="">
				    </div>

				    <div class="small-6 columns">
				    	<img src="http://placehold.it/200x200?text=img" alt="">
				    </div>

				    <div class="small-6 columns">
				    	<img src="http://placehold.it/200x200?text=img" alt="">
				    </div>

				    <div class="small-6 columns">
				    	<img src="http://placehold.it/200x200?text=img" alt="">
				    </div>

				    <div class="small-6 columns">
				    	<img src="http://placehold.it/200x200?text=img" alt="">
				    </div>

				    <div class="small-6 columns">
				    	<img src="http://placehold.it/200x200?text=img" alt="">
				    </div>

				    <div class="small-6 columns">
				    	<img src="http://placehold.it/200x200?text=img" alt="">
				    </div>

			    </div>

			    <?php // if( $images ): ?>
				    
				    <?php // foreach( $images as $image ): ?>
			           <!--  <div class="medium-6 columns">
			                <a href="<?php echo $image['url']; ?>">
			                     <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
			                </a>
			            </div> -->
			        <?php // endforeach; ?>

				<?php // endif; ?>

			    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
			
			<?php endif; ?>

		    <!-- End Featured Neighborhood -->

		</div>

    </div>

</div>