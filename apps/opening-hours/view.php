<div>
	<div class="wpmob-opening-hours">
	<?php 
	echo wpautop(get_option($appID . '_desc'));
	?>
	</div>
	<script type="text/javascript">
		/**
		 * Register the content refresh function to be called every 
		 * time the content is displayed.
		 */ 
		window['<?php echo $appID ?>_refresh'] = function(){
			wpmobOpeningHoursRefresh();
		}
	</script>
</div>