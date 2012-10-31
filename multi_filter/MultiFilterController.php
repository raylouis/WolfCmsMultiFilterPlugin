<?php

class MultiFilterController extends PluginController
{
    public function __construct()
    {
        $this->setLayout('backend');
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