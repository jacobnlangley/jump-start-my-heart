	<footer class="footer">

		<div class="row footer">

			<div class="small-12 medium-6 medium-push-6 columns ll-footer-icons">
				
				<div class="row">
					<div class="small-12 medium-12 columns">
						<?php wp_nav_menu( 'footer menu' ); ?>
					</div>
					<div class="small-12 medium-12 columns">
						<ul>
							<li>
								<a href="#">
									<i class="fa fa-facebook"></i>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fa fa-twitter"></i>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fa fa-instagram"></i>
								</a>
							</li>
						</ul>
					</div>
				</div>

			</div>

			<div class="small-12 medium-6 medium-pull-6 columns">

				<div class="row">
					<div class="small-12 medium-12 columns logo">
						<a href="#">
							<img src="<?= get_stylesheet_directory_uri(); ?>/dist/images/bamboo-logo-blk.svg">
						</a>
					</div>
					<div class="small-12 medium-12 columns copyright">
						<p>
							<?php echo ll_copyright(); ?>
						</p>
					</div>
				</div>
			</div>

		</div>

	</footer>

</div> <!-- end #page-->

<?php include('footer-scripts.php') ?>
<?php wp_footer(); ?>

</body>
</html>
