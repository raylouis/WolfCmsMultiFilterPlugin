<?php
if (!defined('IN_CMS')) { exit(); }

?>
<h1><?php echo __('Settings'); ?></h1>
<p>
	<?php echo __('Display settings page here!'); ?>
	<!--The action on the controller-->
	<form action="<?php echo get_url('plugin/'.'hello_world'.'/save'); ?>" method="post">
		<fieldset style="padding: 0.5em;">
        <legend style="padding: 0em 0.5em 0em 0.5em; font-weight: bold;">HelloWorld Settings</legend>
        <table class="fieldset" cellpadding="0" cellspacing="0" border="0">
            <tr>
                <td class="label"><label for="hello_string">String to say hello: </label></td>
                <td class="field"><input 
                	id="setting_hello_string" name="settings[hello_string]" 
                	type="text" 
                	value="<?php echo $settings['hello_string']; ?>" /></td>
                <td class="help"><?php echo __('the string to say hello.'); ?></td>
            </tr>
            <tr>
                <td class="label"><label for="include_time"><?php echo __('Include time'); ?>: </label></td>
                <td class="field">
                    <select class="select" name="settings[include_time]" id="include_time">
                        <option value="1" <?php if ($settings['include_time'] == "1") echo 'selected ="";' ?>><?php echo __('Yes'); ?></option>
                        <option value="0" <?php if ($settings['include_time'] == "0") echo 'selected ="";' ?>><?php echo __('No'); ?></option>
                    </select>
                </td>
                <td class="help"><?php echo __('Do you want to include time when saying hello.'); ?></td>
            </tr>
            <tr>
                <td class="label"><label for="setting_stamp"><?php echo __('Hello timestamp style'); ?>: </label></td>
                <td class="field">
                    <select class="select" name="settings[stamp]" id="setting_stamp">
                        <option value="Ymd" <?php if ($settings['stamp'] == "Ymd") echo 'selected ="";' ?>><?php echo date('Ymd'); ?></option>
                        <option value="YmdHi" <?php if ($settings['stamp'] == "YmdHi") echo 'selected ="";' ?>><?php echo date('YmdHi'); ?></option>
                        <option value="YmdHis" <?php if ($settings['stamp'] == "YmdHis") echo 'selected ="";' ?>><?php echo date('YmdHis'); ?></option>
                    </select>
                </td>
                <td class="help"><?php echo __('What style of timestamp should be encorporated into the hello.'); ?></td>
            </tr>
        </table>
    </fieldset>
    <p class="buttons">
        <input class="button" name="commit" type="submit" accesskey="s" value="<?php echo __('Save'); ?>" />
    </p>
	</form>
</p>

<script type="text/javascript">
// <![CDATA[
    function setConfirmUnload(on, msg) {
        window.onbeforeunload = (on) ? unloadMessage : null;
        return true;
    }

    function unloadMessage() {
        return '<?php echo __('You have modified this page.  If you navigate away from this page without first saving your data, the changes will be lost.'); ?>';
    }

    $(document).ready(function() {
        // Prevent accidentally navigating away
        $(':input').bind('change', function() { setConfirmUnload(true); });
        $('form').submit(function() { setConfirmUnload(false); return true; });
    });
// ]]>
</script>