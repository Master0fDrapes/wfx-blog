<?php
add_action( 'admin_footer', 'rv_custom_dashboard_widget' );
function rv_custom_dashboard_widget() {
	if ( get_current_screen()->base !== 'dashboard' ) {
		return;
	}
	?>

	<div id="custom-id" class="welcome-panel" style="display: none;">
		<div class="welcome-panel-content">
			<h2 style="color:#fff; padding-top:20px; padding-left:20px;" >Welcome! to Admin Pannel</h2>
			<p class="about-description"></p>
			<div class="welcome-panel-column-container">
				<div class="welcome-panel-column"></div>
				<div class="welcome-panel-column"></div>
				<div class="welcome-panel-column welcome-panel-last"></div>
			</div>
		</div>
	</div>

	<script>
		jQuery(document).ready(function($) {
			$('#welcome-panel').after($('#custom-id').show());
		});
	</script>
<?php }