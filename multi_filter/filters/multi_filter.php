 <?php
/* Security measure */
if (!defined('IN_CMS')) {
    exit();
}

/* The filter class note that it will be applied only when saving the page */
class HelloWorld
{
    var $settings;
    
    function _retrieveSettings()
    {
        $settingsLoc    = Plugin::getAllSettings('hello_world' . '_settings');
        $this->settings = $settingsLoc;
    }
    
    function apply($text)
    {
        $this->_retrieveSettings();
        $toret = "<p>";
        $toret .= $this->settings['hello_string'];
        if ($this->settings['include_time'] == '1') {
            $toret .= (" " . date($this->settings['stamp']));
        }
        $toret .= "</p>";
        
        return $toret . $text;
    }
}
?> 