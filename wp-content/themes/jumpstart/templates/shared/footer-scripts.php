<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
<!-- <script>window.jQuery || document.write('<script src="<?= get_stylesheet_directory_uri(); ?>/dist/js/jquery-1.11.3.js"><\/script>')</script> -->

<script src="<?= get_stylesheet_directory_uri(); ?>/dist/js/fastclick.js"></script>

<script src="<?= get_stylesheet_directory_uri(); ?>/dist/js/main.js"></script>

<script>
	(function() {
		[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {
			new SelectFx(el);
		} );
	})();
</script>
<script>
(function() {
			// trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
			if (!String.prototype.trim) {
				(function() {
					// Make sure we trim BOM and NBSP
					var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
					String.prototype.trim = function() {
						return this.replace(rtrim, '');
					};
				})();
			}

			[].slice.call( document.querySelectorAll( 'input.input__field' ) ).forEach( function( inputEl ) {
				// in case the input is already filled..
				if( inputEl.value.trim() !== '' ) {
					classie.add( inputEl.parentNode, 'input--filled' );
				}

				// events:
				inputEl.addEventListener( 'focus', onInputFocus );
				inputEl.addEventListener( 'blur', onInputBlur );
			} );

			function onInputFocus( ev ) {
				classie.add( ev.target.parentNode, 'input--filled' );
			}

			function onInputBlur( ev ) {
				if( ev.target.value.trim() === '' ) {
					classie.remove( ev.target.parentNode, 'input--filled' );
				}
			}
		})();
</script>
