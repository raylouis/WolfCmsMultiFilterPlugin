<?php

class MultiFilterController extends PluginController
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
        $this->assignToLayout('sidebar', new View('../../plugins/' . 'multi_filter' . '/views/sidebar'));
    }
    
    /* The page that will be shown as main page*/
    public function index()
    {
        $this->documentation();
    }
    
    /* documentation page */
    public function documentation()
    {
        $this->display('multi_filter' . '/views/documentation');
    }
}
?>