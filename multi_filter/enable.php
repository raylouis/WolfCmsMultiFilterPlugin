 <?php
if (!defined('IN_CMS')) {
    exit();
}


// Check if the plugin's settings already exist and create them if not.
if (Plugin::getSetting('hello_string', 'hello_world' . '_settings') === false) {
    //Setup the new settings
    $settings = array(
        'hello_string' => 'Hello World',
        'stamp' => 'Ymd',
        'include_time' => '1'
    );
    
    Plugin::setAllSettings($settings, 'hello_world' . '_settings');
}
?> 