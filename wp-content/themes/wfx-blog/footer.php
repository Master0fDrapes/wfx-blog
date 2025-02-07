<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package theme_name
 */
$t_options = get_option('tp_opt');
?>
		<div id="footer"></div>
		<?php wp_footer(); ?>
		<script>
			jQuery(document).ready(function($){
				var page = 2; // Track the next page to load
				var maxPages = $('#load-more').data('max-pages'); // Get max pages from button

				$('#load-more').click(function(){
					$.ajax({
						url: '<?php echo admin_url('admin-ajax.php'); ?>',
						type: 'POST',
						data: {
							action: 'load_more',
							page: page,
						},
						success: function(data){
							if (data) {
								$('#post-container').append(data);
								page++;
								console.log(page++);
								console.log(maxPages);
								if (page > maxPages) {
									$('#load-more').remove(); // Remove button if no more pages
								}
							} else {
								$('#load-more').remove(); // Ensure button is removed if empty response
							}
						}
					});
				});
			});

		</script>
	</body>
</html>



