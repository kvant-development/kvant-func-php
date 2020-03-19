<?php

function table_create($th,$mas)
{
/*
//$th[epoch] 	= "Эпоха";
$th[id] 	= "Высота";
$th[time] 	= "Время";
$th[tx] 	= "Tx";
$th[txs] 	= "Txs";

$th[size] 	= "Size";
//$th[hz] 	= "&nbsp;";
$th[hash] 	= "Hash";
//$th[] = "";
*/

$tbl .= "<table class=\"table\">
                    <thead>
                      <tr>
";

reset($th);
foreach($th as $k=>$v)
{
    $tbl .= "<td class=\"$k\">".$v."</td>";
}

$nn = 0;
foreach($mas as $k=>$v3)
{
$nn++;

    $td = "";
    reset($th);
    foreach($th as $k2=>$v2)
    {
	$val = $v3[$k2];
	switch($k2)
	{
	    case "nn":
		$val = $nn;
	    break;
            case "hash":

                //$kuda = "https://explorer-test.kvant.io/tx/hash/$val";
		$kuda = $url_e."/blk/hash/$val";
                $val2 = substr($val,0,5)."...".substr($val,strlen($val)-5);
                $val = "<a href=\"$kuda\">$val2</a>";
            break;
	    case "time":
		$val .= " UTC";
	    break;
            case "id":
                //$kuda = "https://explorer-test.kvant.io/blk/id/$val";
                $kuda = $url_e."/blk/id/$val";
                $val = "<a href=\"$kuda\">$val</a>";
            break;

	    default:

	}
	    $td .= "<td class=\"$k2\">$val</td>";
    }
    $tbl .= "<tr>";
    $tbl .= $td;
    $tbl .= "</tr>";

}

$tbl .= "</tbody>";
$tbl .= "</table>";

return $tbl;
}

?>