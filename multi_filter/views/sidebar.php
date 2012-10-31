<?php

if (!defined('IN_CMS')) { exit(); }

?>
<p class="button">
	<a href="<?php echo get_url('plugin/'.'hello_world'.'/settings'); ?>">
		<img src="<?php echo PLUGINS_URI.'hello_world';?>/images/settings.png" align="middle" alt="page icon" /> 
		<?php echo __('Settings'); ?></a></p>
