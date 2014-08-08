<div class="wpmob-call-us">
	<div class="wpmob-call-us-phone">
	<?php 
	echo get_option($appID . '_phone');
	?>
	<div>
		<a class="wpmob-call-now" href="tel:<?php echo get_option($appID . '_phone');?>" target="_self">Call Now</a>
	</div>
	</div>
	<script type="text/javascript">
		/**
		 * Register the content refresh function to be called every 
		 * time the content is displayed.
		 */ 
		window['<?php echo $appID ?>_refresh'] = function(){
			wpmobCallUsRefresh();
		}
	</script>
</div>