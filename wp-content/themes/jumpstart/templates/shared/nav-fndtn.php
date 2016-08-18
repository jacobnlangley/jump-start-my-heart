<nav role="navigation" class="full-width hide-for-medium-down">
	<div class="row">
		<?php if(is_page_template('home.php')): ?>
		<div class="small-12 medium-2 medium-offset-3 columns">
			<a class="cities-trigger" href="#">Explore Cities</a>
		</div>
		<?php else: ?>
		<div class="small-12 medium-3 medium-offset-2 columns">
			<a class="cities-trigger" href="#">Explore Neighborhoods</a>
		</div>
		<?php endif; ?>
		<div class="small-12 medium-2 columns">
			<a href="#"><img class="logo" src="<?= get_stylesheet_directory_uri(); ?>/dist/images/bamboo-logo.svg"></a>
		</div>
		<div class="small-12 medium-2 medium-pull-3 columns">
			<a class="agents-trigger" href="#">Meet Agents</a>
		</div>
	</div>
</nav>
<nav role="navigation" class="mega-menu hidden hide-for-medium-down">
	<div class="full-width">
		<div class="cities">
		<?php $args = array('post_type' => 'city');
			$cities = get_posts($args);
			$post_object = get_sub_field('agents_object');
		?>
		<?php //print_r($post_object); ?>
		<?php foreach($cities as $city): ?>
			<div class="small-12 medium-3 columns">
				<div class="city">
						<img src="">
					<h3><?php echo $city->post_title; ?></h3>
				</div>
			</div>
		<?php endforeach; ?>
		</div>
		<div class="agents">
		<?php $args = array('post_type' => 'agent');
			$agents = get_posts($args);
		?>
		<?php foreach($agents as $agent): ?>
			<div class="small-12 medium-3 columns">
				<div class="agent">
					<h3><?php echo $agent->post_title; ?></h3>
				</div>
			</div>
		<?php endforeach; ?>
		</div>
	</div>
</nav>
<nav class="mobile-menu show-for-medium-down">
<!--Mobile Menu-->
		<div class="small-4 medium-2 columns small-centered medium-centered">
			<a href="#">
				<img class="logo" src="<?= get_stylesheet_directory_uri(); ?>/dist/images/bamboo-logo.svg">
			</a>
		</div>
		<div class="menu-icon">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
		<div class="mobile-city-menu">
			<?php $args = array('post_type' => 'city');
				$cities = get_posts($args);
			?>
			<?php foreach($cities as $city): ?>
			<h3><?php echo $city->post_title; ?></h3>
				<div class="mobile-inline-list">
					<a class="mobile-cities-trigger" href="#">Learn More</a>
					<span>|</span>
					<a href="#">Meet Agents</a>
				</div>
			<?php endforeach; ?>
				<hr>

			<?php wp_nav_menu( 'main menu' ); ?>

		</div>
		<div class="mobile-neighborhood-menu">
			<ul>
				<li>
					<a class="mobile-cities-trigger" href"#">
						&laquo; Back to Cities
					</a>
				</li>
			</ul>
			<?php $args = array('post_type' => 'agent'); $agents = get_posts($args);?>
			<ul>
				<li>
					<a class="mobile-agents-trigger" href"#">Agents
						<i class="fa fa-angle-right"></i>
						<i class="fa fa-angle-down"></i>
					</a>
					<ul class="agents">
					<?php foreach($agents as $agent): ?>
						<li>
							<a href="<?php echo $neighborhood->guid; ?>">
								<?php echo $agent->post_title; ?>
							</a>
						</li>
					<?php endforeach; ?>
					</ul>
				</li>
			</ul>

			<?php $args = array('post_type' => 'neighborhoods');
				$neighborhoods = get_posts($args);
			?>
			<ul>
				<li>
					<a class="mobile-neighborhoods-trigger" href"">Neighborhoods
						<i class="fa fa-angle-right"></i>
						<i class="fa fa-angle-down hidden"></i>
					</a>
					<ul class="neighborhoods">
					<?php foreach($neighborhoods as $neighborhood): ?>
						<li>
							<a href="<?php echo $neighborhood->guid; ?>">
								<?php echo $neighborhood->post_title; ?>
							</a>
						</li>
					<?php endforeach; ?>
					</ul>
				</li>
			</ul>
		</div>
</nav>
