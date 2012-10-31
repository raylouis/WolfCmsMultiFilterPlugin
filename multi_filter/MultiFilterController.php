<?php

class HelloWorldController extends PluginController
{
    /* To chek permissions */
    private static function _checkPermission()
    {
        AuthUser::load();
        if (!AuthUser::isLoggedIn()) {
            redirect(get_url('login'));
        } else if (!AuthUser::getId() == 1) {
            Flash::set('error', __('You do not have permission to access the requested page!'));
            redirect(get_url());
        }
    }
    
    public function __construct()
    {
        //Uncomment to check permission 
        //self::_checkPermission();
        $this->setLayout('backend');
        $this->assignToLayout('sidebar', new View('../../plugins/' . 'hello_world' . '/views/sidebar'));
    }
    
    /* The page that will be shown as main page*/
    public function index()
    {
        $this->documentation();
    }
    
    /* documentation page */
    public function documentation()
    {
        $this->display('hello_world' . '/views/documentation');
    }
    
    /* Settings page */
    function settings()
    {
        self::_checkPermission();
        
        $settings = Plugin::getAllSettings('hello_world' . '_settings');
        
        if (!$settings) {
            Flash::set('error', 'HelloWorld - ' . __('unable to retrieve plugin settings.'));
            return;
        }
        
        $this->display('hello_world' . '/views/settings', array(
            'settings' => $settings
        ));
    }
    
    /* saving settings */
    function save()
    {
        self::_checkPermission();
        if (isset($_POST['settings'])) {
            $settings = $_POST['settings'];
            foreach ($settings as $key => $value) {
                $settings[$key] = mysql_escape_string($value);
            }
            
            $ret = Plugin::setAllSettings($settings, 'hello_world' . '_settings');
            
            if ($ret) {
                Flash::set('success', __('The settings have been saved.'));
            } else {
                Flash::set('error', 'An error occured trying to save the settings.');
            }
        } else {
            Flash::set('error', 'Could not save settings, no settings found.');
        }
        
        redirect(get_url('plugin/' . 'hello_world' . '/settings'));
    }
}
?>