<?php
function print_mas($txt)
{
    global $glob,$auth;
//    if(auth[)
if(!$auth[role][admin])return false;
    if(is_array($txt))
    $txt = print_r($txt,1);
    $txt = str_replace("\n","<br>\n",$txt);
    print "<div class=\"well card card-body bg-light\">";
    print "<pre>";
    print $txt;
    print "</pre>";
    print "</div>";
}
?>