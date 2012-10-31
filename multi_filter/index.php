<?php
if (!defined('IN_CMS')) { exit(); }

Plugin::setInfos(array(
    'id'          => 'hello_world',
    'title'       => 'Hello world!', 
    'description' => 'Allows you to display "Hello World! where you want.', 
    'version'     => '1.0',
    'license'     => 'GPL',
    'author'      => 'Enrico Da Ros',
    'website'     => 'http://www.kendar.org/',
    'update_url'  => 'http://www.wolfcms.org/plugin-versions.xml',
    //'require_wolf_version' => '0.5.0',
    'type' => 'both'
));

//The controller that will handle admin actions
Plugin::addController('hello_world','HelloWorld', 'administrator');
Plugin::addJavascript('hello_world', 'js/helloWorld.js');

//The filter
Filter::add("hello_world", 'hello_world'.'/filters/filter_hello_world.php');
 
//Load the page class
AutoLoader::addFile('PageHello', CORE_ROOT.'/plugins/'.'hello_world'.'/behaviours/hello_behaviour.php');
//Load the behavior, the name must be the class name of the behavior
Behavior::add('hello', 'hello_world'.'/behaviours/hello_behaviour.php');
 
?>