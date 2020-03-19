<?php
function format_summa($s)
{
$t2 = $s;
    $len = strlen($t2);
    $tn = 0;
    $t2 = strrev($t2);
    $t3 = "";
    for($i=0;$i<$len;$i+=3)
    {
        $t3 .= substr($t2,$i,3)." ";
    }
    $t3 = strrev($t3);

return $t3;
}
?>