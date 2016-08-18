<?php while ( have_posts() ) : the_post(); ?>

	<?php
	$neighborhoods = get_field('citylist_relationship');
	?>

	<?php //echo '<pre>'; print_r($neighborhoods); exit; ?>

	<section class="full-width">
		<div class="row">
			<div class="small-12 medium-8 columns medium-centered">
				<h1><?php the_title(); ?></h1>
				<p>
					<?php echo the_field('neighborhood_list_description'); ?>
				</p>
			</div>
		</div>
	</section>
	<section class="row">
		<div class="small-12 medium-6 columns hide-for-small">
			<?php
			$categories = get_terms('citylists', 'orderby=count&hide_empty=0');
			?>
			<?php //echo '<pre>'; print_r($categories); exit; ?>
			<ul class="filter-by">
				<li>Filter by:</li>
				<?php foreach( $categories as $cats ): ?>
					<?php if($cats->name == "Price: Low"): ?>
					<!--Empty-->
					<?php elseif($cats->name == "Price: Medium"): ?>
					<!--Empty-->
					<?php elseif($cats->name == "Price: High"): ?>
					<!--Empty-->
					<?php else: ?>
					<li data-category="<?php echo $cats->name; ?>">
						<img src="<?php the_field('neighborhoods_icon', $cats);?>" alt="<?php echo $cats->name; ?>" title="<?php echo $cats->name; ?>" />
					</li>
					<?php endif; ?>
				<?php endforeach; ?>
			</ul>
		</div>
		<div class="small-12 medium-6 columns hide-for-small">
			<!--Filter by Price-->
			<?php //echo '<pre>'; print_r($prices); exit; ?>
			<ul class="filter-by-price">
				<li>Filter by Price:</li>
				<?php foreach( $categories as $cats ): ?>
					<?php if($cats->name == "Walkability"): ?>
					<!--Empty-->
					<?php elseif($cats->name == "Shopping"): ?>
					<!--Empty-->
					<?php elseif($cats->name == "Nightlife/Dining"): ?>
					<!--Empty-->
					<?php elseif($cats->name == "Transportation"): ?>
						<!--Empty-->
					<?php elseif($cats->name == "Cultural/Entertainment"): ?>
					<!--Empty-->
					<?php elseif($cats->name == "Historical"): ?>
					<!--Empty-->
					<?php elseif($cats->name == "Greenspace"): ?>
					<!--Empty-->
					<?php else: ?>
					<li data-category="<?php echo $cats->name; ?>">
						<img src="<?php the_field('neighborhoods_icon', $cats);?>" alt="<?php echo $cats->name; ?>" title="<?php echo $cats->name; ?>" />
					</li>
					<?php endif; ?>
				<?php endforeach; ?>
			</ul>
		</div>
		<div class="small-12 columns show-for-small">
			<!--Mobile Selects-->
			<select name="mobile-filter-by" class="cs-select cs-skin-slide">
				<option value="<?php echo $cats->name; ?>" disabled selected>
					Filter by Category
				</option>
				<?php foreach( $categories as $cats ): ?>
					<?php if($cats->name == "Price: Low"): ?>
					<!--Empty-->
					<?php elseif($cats->name == "Price: Medium"): ?>
					<!--Empty-->
					<?php elseif($cats->name == "Price: High"): ?>
					<!--Empty-->
					<?php else: ?>
		    		<option data-option data-value="<?php echo $cats->name; ?>">
						<?php echo $cats->name; ?>
					</option>
					<?php endif; ?>
		    	<?php endforeach; ?>
			</select>
		</div>
		<div class="small-12 columns show-for-small">
			<select name="mobile-filter-by-price" class="cs-select cs-skin-slide">
				<option value="<?php echo $cats->name; ?>">
					Filter by Price
				</option>
		        <?php foreach( $categories as $cats ): ?>
					<?php if($cats->name == "Walkability"): ?>
					<!--Empty-->
					<?php elseif($cats->name == "Shopping"): ?>
					<!--Empty-->
					<?php elseif($cats->name == "Nightlife/Dining"): ?>
					<!--Empty-->
					<?php elseif($cats->name == "Transportation"): ?>
						<!--Empty-->
					<?php elseif($cats->name == "Cultural/Entertainment"): ?>
					<!--Empty-->
					<?php elseif($cats->name == "Historical"): ?>
					<!--Empty-->
					<?php elseif($cats->name == "Greenspace"): ?>
					<!--Empty-->
					<?php else: ?>
					<option data-option data-value="<?php echo $cats->name; ?>">
						<?php echo $cats->name; ?>
					</option>
					<?php endif; ?>
		    	<?php endforeach; ?>
		    </select>
		</div>
	</section>
	<section class="row">
		<div class="small-12 medium-12 columns">
		<?php if( $neighborhoods ): ?>

				<ul class="neighborhoods-list">
				<?php foreach( $neighborhoods as $neighborhood ): ?>

					<?php

					$featured_image = get_the_post_thumbnail($neighborhood->ID);

					$hero = get_field('neighborhood_hero');

					$taxonomy_name = get_post_taxonomies();

					$terms = wp_get_post_terms( $neighborhood->ID, $taxonomy_name, array(
					    'orderby'    => 'count',
					    'hide_empty' => 0
					) );

					$hoodImg = get_field('hero');

					?>
					<?php //echo '<pre>'; print_r($hoodMeta); exit; ?>

					<!--NEW CODE-->
						<li id="post-<?php the_ID(); ?>"
							data-neighborhoods="<?php foreach( $terms as $term ) { echo $term->name." ";} ; ?>" data-price=""
							style="background-image: url('<?php echo $hero; ?>');">
							<div class="neighborhoods">
								<ul class="icon-list">
									<?php foreach( $terms as $term ): ?>
									<li>
										<img src="<?php the_field('neighborhoods_icon', $term);?>" />
									</li>
									<?php endforeach; ?>
								</ul>
								<h3>
									<a href="<?php echo $neighborhood->guid;?>">
										<?php echo get_the_title( $neighborhood->ID ); ?>
									</a>
								</h3>
							</div>
						</li>
					<!--NEW CODE-->

				<?php endforeach; ?>
				</ul>
			<?php endif; ?>

		</div>

	</section>

<?php endwhile; // end of the loop. ?>
