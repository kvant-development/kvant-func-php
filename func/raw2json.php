<?php
function raw2json($a)
{
//    $a = $row2[comments];
    $a = base64_decode($a);
    $a = gzdecode($a);
    $a = json_decode($a,1);
return $a;
}
?>