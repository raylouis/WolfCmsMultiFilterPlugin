<?php
if (!defined('IN_CMS')) { exit(); }

Plugin::setInfos(array(
    'id'          => 'multi_filter',
    'title'       => 'Multi Filter Plugin!', 
    'description' => 'Allows the application of multiple filters to a page.', 
    'version'     => '1.0',
    'license'     => 'GPL',
    'author'      => 'Enrico Da Ros',
    'website'     => 'http://www.kendar.org/',
    //'update_url'  => 'http://www.wolfcms.org/plugin-versions.xml',
    //'require_wolf_version' => '0.5.0',
    'type' => 'both'
));

//The filter
Filter::add("multi_filter", 'multi_filter'.'/filters/multi_filter.php');
//Filter::add("php_filter", 'multi_filter'.'/filters/php_filter.php');
Filter::add("pre_filter", 'multi_filter'.'/filters/pre_filter.php');
 
//Load the page class
//AutoLoader::addFile('PageHello', CORE_ROOT.'/plugins/'.'hello_world'.'/behaviours/hello_behaviour.php');
 
?>