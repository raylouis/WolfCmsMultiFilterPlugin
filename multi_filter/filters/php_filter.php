 <?php
/* Security measure */
if (!defined('IN_CMS')) {
    exit();
}

/* The filter class note that it will be applied only when saving the page */
class PhpFilter
{   
    function apply($text)
    {
        $outText = "";
        $matches = null;
        $regExp = '/<[ \\t]*php_filter[^>]*>(.*|(?R))<\\/[ \\t]*php_filter[ \\t]*>/i';
        $returnValue = preg_match_all($regExp,$text, $matches, PREG_OFFSET_CAPTURE, 0);
        
        
        if (is_array($matches) && isset($matches[1])) 
        {
            $match_start = 0;
            $match_prev = 0;
            $match_end = 0;
            $mathc_length = 0;
            for($i=0;$i<sizeof($matches[1]);$i++)
            {
                // Get offset and length
                $match_start = $matches[1][$i];
                $match_length = strlen($matches[0][$i]);
                $match_end = $match_start+$match_length;
                
                // Get the missing part if needed
                if($match_start > $match_prev){
                    $outText .= substr($text,$match_prev,$match_start - $match_prev);
                }
                $outText .= mb_convert_encoding(substr($text,$match_start,$match_length), 'UTF-8', 'HTML-ENTITIES');
                $match_start .= $match_end;
            }
            if($match_end < strlen($text)){
                $outText .= substr($text,$match_end,strlen($text)-$match_end);
            }
            return $outText;
        }
        
        return $text;
    }
}
?> 