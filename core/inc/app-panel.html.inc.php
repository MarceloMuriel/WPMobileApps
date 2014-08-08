<?php
$appIDs = get_option('wpmob_app_ids');
?>
<div id="bottomtoolbar" style="display: none;">
	<div id="pinasmenubox" class="pinasmenubox">
		<div class="toolbar-carousel">
			<?php foreach($appIDs as $appID): ?>
			<div class="item wpmob-app-icon">
				<a class="wpmob-icon" rel="<?php echo $appID; ?>" href="<?php echo get_option($appID . '_slug'); ?>"> <i class="<?php echo get_option($appID . '_text_icon'); ?>"></i><span class="icontext"><?php echo get_option($appID . '_label'); ?></span> </a>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
<div id="wpmob-apps-content" style="display: none;">
	<?php
	foreach ($appIDs as $appID) {
		$appDir = WPMOB_DIR . '/apps/' . get_option($appID .  '_base_dir');
		$mainClass = $appDir . '/' . get_option($appID . '_main_class');
		if (is_file($mainClass)) {
			echo "<div id='{$appID}' class='wpmob-app-content'>";
			include_once ($mainClass);
			echo "</div>";
		}
	}
	?>
</div>