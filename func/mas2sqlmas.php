<?php
if(!function_exists("mas2sqlmas"))
{

function mas2sqlmas()
{

$args = func_get_args();

$mas = $args[0];


//print_mas($mas);
if(is_array($mas))
{
reset($mas);
//while($temp = each($mas))
foreach($mas as $k=>$val)
{
//        $val = $temp[1];
$devider = "'";

//if($val)
if(!(strpos($val,"INET_")===false))
$devider = "";

if($val == "NULL")
$devider = "";
$val = str_replace("'","\'",$val);
        $out[] = "`".$k."` = $devider".$val."$devider";
}
}
return $out;
}
}
?>
