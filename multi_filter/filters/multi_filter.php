 <?php
/* Security measure */
if (!defined('IN_CMS')) {
    exit();
}

/* The filter class note that it will be applied only when saving the page */
class MultiFilter
{   
    function apply($text)
    {
        $outText = "";
        $matches = null;
        $regExp = '/\(\((.*)\)\)/i';
        $returnValue = preg_match_all($regExp,$text, $matches, PREG_OFFSET_CAPTURE, 0);
        if (is_array($matches) && isset($matches[0])&& isset($matches[0][0])) {
            $i=0;
            // Get offset and length
            $match_start = $matches[0][$i][1];
            $match_length = strlen($matches[0][$i][0]);
            $match_end = $match_start+$match_length;
            
            $filtersBlock = $matches[1][$i][0];
            
            $filters = explode("|", $filtersBlock);
            
            // Remove the filter indication
            $textResult = substr($text,0,$match_start).substr($text,$match_end,strlen($text)-$match_end);
            //$textBlocks = split_in_phps($textResult);
            $textBlocks = $this->split_in_phps($textResult);
            for($i=0;$i < sizeof($filters);$i++){
                if($filters[$i]!="multi_filter"){
                    $filter = Filter::get($filters[$i]);
                    
                    if(isset($filter)){
                        for($a=0;$a< sizeof($textBlocks);$a++){
                            $pos = strpos($textBlocks[$a], '###<?php');
                            if($pos===false){
                                $textBlocks[$a] = $filter->apply($textBlocks[$a]).$filters[$i];
                            }
                        }
                    }
                }
            }
            for($a=0;$a< sizeof($textBlocks);$a++){
              $outText .= $textBlocks[$a];
            }
            $outText = str_replace("###<?php","<?php",$outText);
            $outText = str_replace("?>###","?>",$outText);
            return $outText;
        }
        return $text;
    }
    
    function split_in_phps($text)
    {
        $outText = "";
        $outArray = array();
        $matches = null;
        $regExp = '/###<\\?php(.*)\\?>###/i';
        $returnValue = preg_match_all($regExp,$text, $matches, PREG_OFFSET_CAPTURE, 0);
        if (is_array($matches) && isset($matches[1])) 
        {
            $match_start = 0;
            $match_prev = 0;
            $match_end = 0;
            $mathc_length = 0;
            for($i=0;$i < sizeof($matches[1]);$i++)
            {
                // Get offset and length
                $match_start = $matches[0][$i][1];
                $match_length = strlen($matches[0][$i][0]);
                $match_end = $match_start+$match_length;
                
                // Get the missing part if needed
                if($match_start > $match_prev){
                    $outText .= substr($text,$match_prev,$match_start - $match_prev);
                }
                $outArray[]=substr($text,$match_start,$match_length);
                $match_start = $match_end;
            }
            if($match_end < strlen($text)){
                $outArray[] = substr($text,$match_end,strlen($text)-$match_end);
            }
            /*for($a=0;$a<sizeof($outArray);$a++){
             $outText .= $outArray[$a]."<br><br><br>";
            }*/
        }
        return $outArray;
    }
}
?> 