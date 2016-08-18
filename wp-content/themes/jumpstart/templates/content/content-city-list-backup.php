<div class="content">

	<div class="row">
		<div class="small-12 medium-12 columns">
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</div>
	</div>
	
	<div class="row">
		
		<div class="small-12 medium-12 columns">
			<p>Filter by:</p>
			
			<?php if( have_rows('citylist_neighborhoods') ): ?>
				        
		        <?php while ( have_rows('citylist_neighborhoods') ) : the_row(); ?>   
		           	
		           	<?php $post_object = get_sub_field('citylist_object'); ?>

	                <?php if( $post_object ): ?>

	                    <?php $post = $post_object; setup_postdata( $post ); ?>
						
							<?php

							$taxonomy_name = get_post_taxonomies( );

							$terms = wp_get_post_terms( $post->ID, $taxonomy_name, array(
							    'orderby'    => 'count',
							    'hide_empty' => 0
							) );

							?>

							<?php foreach( $terms as $term ): ?>
		
								<li><?php echo $term->name; ?></li>

							<?php endforeach; ?>

	                    <?php wp_reset_postdata(); ?>

	                <?php endif; ?>

		        <?php endwhile; ?>
		 
		    <?php endif; ?>

		</div>
	</div>
	<div class="row">
		
		<div class="small-12 medium-12 columns">
			
			<ul>
				<?php if( have_rows('citylist_neighborhoods') ): ?>
					        
			        <?php while ( have_rows('citylist_neighborhoods') ) : the_row(); ?>   
			           	
			           	<?php $post_object = get_sub_field('citylist_object'); ?>

		                <?php if( $post_object ): ?>

		                    <?php $post = $post_object; setup_postdata( $post ); ?>
							
								<li><?php the_title(); ?></li>

		                    <?php wp_reset_postdata(); ?>

		                <?php endif; ?>

			        <?php endwhile; ?>
			 
			    <?php endif; ?>
			</ul>

		</div>
	</div>
</div>