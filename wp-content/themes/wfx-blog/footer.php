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
		<script>
			jQuery(document).ready(function($) {
				$('.filter-btn, .blog_tab_btns button').click(function() {
					var categoryId = $(this).data('category') || 'all';

					// Remove 'active' class from all buttons and add it to the clicked one
					$('.filter-btn, .blog_tab_btns button').removeClass('active');
					$(this).addClass('active');

					$.ajax({
						url: '<?php echo admin_url("admin-ajax.php"); ?>',
						type: 'POST',
						data: {
							action: 'filter_posts',
							category: categoryId
						},
						beforeSend: function() {
							$('#post-container').html('<p>Loading...</p>');
						},
						success: function(response) {
							$('#post-container').html(response);
						}
					});
				});
			});
		</script>
		<script>
	document.addEventListener("DOMContentLoaded", function () {
		document.querySelectorAll(".sharing_links").forEach(link => {
			link.addEventListener("click", function (event) {
				event.preventDefault();

				const linkToCopy = this.getAttribute("data-link") || window.location.href;
				navigator.clipboard.writeText(linkToCopy).then(() => {
					const tooltip = this.querySelector(".tooltip");
					tooltip.textContent = "Copied!";
					tooltip.classList.add("active");

					setTimeout(() => {
						tooltip.textContent = "Copy";
						tooltip.classList.remove("active");
					}, 2000);
				}).catch(err => console.error("Failed to copy: ", err));
			});
		});
	});
</script>
	</body>
</html>



