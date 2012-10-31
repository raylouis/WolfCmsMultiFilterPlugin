<?php

if (!defined('IN_CMS')) { exit(); }

?>
<h1>Multi filter</h1>
<p>
    How many times you desired to apply multiple filters to the same page? Now this is possible with this Multi Filter plugin.
</p>
<p>It's easy to use just add on top of your page the filter definition:</p>
<pre>
    ((textile|fancyFilter|anotherFilter))
</pre>
<p>And you could apply those filters one by one thus writing for example in textile the texts and rendering them as
     html for the fancyFilter. Another option is to use "weel known" paths with markdown and textile filters</p>
<pre>
    !###&lt;?php echo URL_PUBLIC ; ?&gt;###/public/files/mysqlphpicalendar_1_0.zip.00.png(iCalendar)!
</pre>
<p>With this syntax you simply means that the path for the image in textile will be rendered through the php
    </p>
<p>Another option is to use dynamically changing elements like you do with "no" filters at all:</p>
<pre>
    
* This is a textile list
* This is a textile list
### This is a textile Header
Server time is now: ###&lt;?php echo date("Y-m-d H:i:s"); ?&gt;###
</pre>
<p><b>NOTE THAT IS NOT GUARANTEED TO WORK WITH ALL POSSIBLE FILTERS!!!</b></p>

