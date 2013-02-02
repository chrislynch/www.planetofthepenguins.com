<?php

if (isset($_POST['bubbletext'])){
    print Bubble($_POST['bubbletext']);
}

function Bubble($text){
    $return = '';
    $text = explode("\n",$text);
    $currentline = '';
    $currentpage = 1;
    $currentpanel = 1;
    
    foreach($text as $textline){
        $textlinechars = str_split($textline);
        // Check for a new page or panel
        if ($textlinechars[0] == '#'){
            if ($textlinechars[1] !== '#'){
                // New page
                $currentline = 'page';
                array_shift($textlinechars);
                $textline = trim(implode($textlinechars));
                $return .= "<p><font size='+1'><strong>PAGE $currentpage</strong></font></p>";
                // Number the panels in the previous page
                $prevpage = $currentpage -1;
                if ($prevpage > 0){
                    $panelcount = $currentpanel -1 ;
                    $return = str_ireplace("<p><font size='+1'><strong>PAGE $prevpage</strong></font></p>", 
                                            "<p><font size='+1'><strong>PAGE $prevpage ($panelcount PANELS)</strong></font></p>", $return);
                }
                $currentpage++;
                $currentpanel = 1;
            } else {
                // New panel
                $currentline = 'panel';
                array_shift($textlinechars);
                array_shift($textlinechars);
                $textline = trim(implode($textlinechars));
                $return .= "<p style='margin-top:8px;'><u>PANEL $currentpanel</u></p>";
                $currentpanel++;
            }
        } else {
            // Check for character or dialogue
            if ($textlinechars[0] == ' ' OR $textlinechars[0] == "\t"){
                if ($textlinechars[1] == ' ' OR $textlinechars[1] == "\t"){
                    // Speech bubble
                    $currentline = 'bubble';
                    array_shift($textlinechars);
                    array_shift($textlinechars);
                    $textline = trim(implode($textlinechars));
                    $textline = strtoupper($textline);
                } else {
                    // Character
                    $currentline = 'character';
                    array_shift($textlinechars);
                    $textline = trim(implode($textlinechars));
                    $textline = strtoupper($textline);
                }
            }
        }
        
        if (trim($textline) == "\n" or trim($textline) == '') {
            $textline = '<br>';
        } else {
            $textline = BubbleMarkdown($textline);
            
            switch ($currentline){
                case 'character':
                    $return .= "<p align='center' style='margin-bottom:0'><strong>$textline</strong></p>";
                    break;
                case 'bubble':
                    $return .= "<p align='center' style='margin-bottom:0'>$textline</p>";
                    break;
                case 'page':
                case 'panel':
                default:
                    $return .= "<p>$textline</p>";
                    break;
            }
        }
    }

    // Count panels in the final page
    $prevpage = $currentpage -1;
    $panelcount = $currentpanel -1 ;
    $return = str_ireplace("<p><font size='+1'><strong>PAGE $prevpage</strong></font></p>", 
                            "<br><p><font size='+1'><strong>PAGE $prevpage ($panelcount PANELS)</strong></font></p>", $return);
    
    return $return;
}

function BubbleMarkdown($textline){
    // Formats
    $formats = array('strong' => '**' , 'em' => '*', 'u' => '_');
    // Apply bold
    foreach($formats as $tag=>$marker){
        $on = FALSE;
        $markerlen = strlen($marker);
        
        $markerpos = strpos($textline,$marker);
        while (!($markerpos === FALSE)){
            if(!$on){ $tagonoff = "<$tag>"; $on = TRUE;} else { $tagonoff = "</$tag>"; $on = FALSE; }
            $textline = substr($textline, 0, $markerpos) . $tagonoff . 
                        substr($textline, $markerpos + $markerlen);
            $markerpos = strpos($textline,$marker);
        }
        if ($on) { $textline .= "</$tag>"; }
    }
    
    return $textline;
}

?>
