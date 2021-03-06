<?php
/*
Template Name: Agents (Page)
*/


?>

<?php include_once("templates/shared/header.php"); ?>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- Title and Introduction -->
		<div class="ll-agents-title full-width">
			<div class="row">
				<div class="small-12 medium-6 columns medium-centered">
					<h1><?php the_title(); ?></h1>
					<p><?php the_content(); ?></p>
		        </div>
			</div>
		</div>
		<!--End Title and Introduction -->

	<?php endwhile; else: endif;?>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- Agents -->

		<?php if( have_rows('agents_list') ): ?>

			<?php $count_agents_list = count(get_field('agents_list')); ?>

			<?php if($count_agents_list == 6):?>

				<div class="row ll-agents">

			        <?php while ( have_rows('agents_list') ) : the_row(); ?>

			            <?php $post_object = get_sub_field('agents_object'); ?>

			            <?php if( $post_object ): ?>

			                <?php $post = $post_object; setup_postdata( $post ); ?>

			                	<div class="small-12 medium-4 columns ll-agents-single" style="background-size:cover; background-position:center center; background-image: url('<?php the_field('agents_headshot'); ?>');">

									<div class="ll-agents-inside">

					                	<div class="small-12 columns" >

							                <a href="<?php the_permalink(); ?>">
							                	<h2><?php echo the_title(); ?></h2>
							                </a>

							            </div>

							            <div class="small-12 medium-6 columns" >

							                <?php $posts = get_field('agents_neighborhood'); if( $posts ): ?>
												<?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
												    <a href="<?php echo get_permalink( $p->ID ); ?>"><?php echo get_the_title( $p->ID ); ?></a>
												<?php endforeach; ?>
											<?php endif; ?>

										</div>
										<div class="small-12 medium-6 columns ll-agents-reviews" >
											<a href="#">7 Reviews</a>
										</div>

										<div class="hidden-content">
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
											</p>
										</div>

									</div>

								</div>

			                <?php wp_reset_postdata(); ?>

			            <?php endif; ?>

			        <?php endwhile; ?>

	            </div>


			<?php elseif ($count_agents_list == 5): ?>

				<div class="row ll-agents">

			        <?php while ( have_rows('agents_list') ) : the_row(); ?>

			            <?php $post_object = get_sub_field('agents_object'); ?>

			            <?php if( $post_object ): ?>

			                <?php $post = $post_object; setup_postdata( $post ); ?>

			                	<div class="small-12 medium-4 columns ll-agents-single" style="background-size:cover; background-position:center center; background-image: url('<?php the_field('agents_headshot'); ?>');">

									<div class="ll-agents-inside" >

					                	<div class="small-12 columns" >

							                <a href="<?php the_permalink(); ?>">
							                	<h2><?php echo the_title(); ?></h2>
							                </a>

							            </div>

							            <div class="small-12 medium-6 columns" >

							                <?php $posts = get_field('agents_neighborhood'); if( $posts ): ?>
												<?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
												    <a href="<?php echo get_permalink( $p->ID ); ?>"><?php echo get_the_title( $p->ID ); ?></a>
												<?php endforeach; ?>
											<?php endif; ?>

										</div>
										<div class="small-12 medium-6 columns ll-agents-reviews" >
											<a href="#">7 Reviews</a>
										</div>
									</div>

								</div>

			                <?php wp_reset_postdata(); ?>

			            <?php endif; ?>

			        <?php endwhile; ?>

			        <div class="small-12 medium-4 columns ll-agents-lease">
			        	<div class="ll-lease-inside">
							<img src="http://s3.amazonaws.com/bamboorealty/wp-content/uploads/2015/12/cta-img1.png" /><br>
			        		<a href="#">
								<h3>Lease vs Buy</h3>
							</a>
							<i class="fa fa-long-arrow-right"></i>
			        	</div>
			        </div>

	            </div>

			<?php elseif ($count_agents_list == 4): ?>

				<div class="row ll-agents">

			        <?php while ( have_rows('agents_list') ) : the_row(); ?>

			            <?php $post_object = get_sub_field('agents_object'); ?>

			            <?php if( $post_object ): ?>

			                <?php $post = $post_object; setup_postdata( $post ); ?>

			                <?php $review_count = count( get_field('agents_reviews') ); ?>

			                	<div class="small-12 medium-4 columns ll-agents-single" style="background-size:cover; background-position:center center; background-image: url('<?php the_field('agents_headshot'); ?>');">

									<div class="ll-agents-inside" >

					                	<div class="small-12 columns" >

							                <a href="<?php the_permalink(); ?>">
							                	<h2><?php echo the_title(); ?></h2>
							                </a>

							            </div>

							            <div class="small-12 medium-6 columns" >

							                <?php $posts = get_field('agents_neighborhood'); if( $posts ): ?>
												<?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
												    <a href="<?php echo get_permalink( $p->ID ); ?>"><?php echo get_the_title( $p->ID ); ?></a>
												<?php endforeach; ?>
											<?php endif; ?>

										</div>
										<div class="small-12 medium-6 columns ll-agents-reviews" >
											<a href="#"><?php echo $review_count; ?> Reviews</a>
										</div>
									</div>

								</div>

			                <?php wp_reset_postdata(); ?>

			            <?php endif; ?>

			        <?php endwhile; ?>

			        <div class="small-12 medium-4 columns ll-agents-buy">
			        	<div class="ll-buy-inside">
							<img src="http://s3.amazonaws.com/bamboorealty/wp-content/uploads/2015/12/cta-img2.png" />
			        		<a href="#">
								<h3>1st Time Home Buyers Guide</h3>
							</a>
							<i class="fa fa-long-arrow-right"></i>
			        	</div>
			        </div>
			        <div class="small-12 medium-4 columns ll-agents-lease">
			        	<div class="ll-lease-inside">
							<img src="http://s3.amazonaws.com/bamboorealty/wp-content/uploads/2015/12/cta-img1.png" />
			        		<a href="#">
								<h3>Lease vs Buy</h3>
							</a>
							<i class="fa fa-long-arrow-right"></i>
			        	</div>
			        </div>

	            </div>
			<?php else: ?>

				<!-- Case for else? -->

			<?php endif; ?>

	    <?php endif; ?>

		<!-- End Agents -->

	<?php endwhile; else: endif;?>

<?php include_once("templates/shared/footer.php"); ?>
