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

$tbl .= "</tr></thead><tbody>";

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
            case "txhash":
                //$kuda = "https://explorer-test.kvant.io/tx/hash/$val";
		$kuda = $url_e."/tx/hash/$val";
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
            case "nn2":
//              $kuda = "https://explorer-test.kvant.io/tx/id/$val";
                $kuda = $url_e."/tx/id/$val";
                $val = "<a href=\"$kuda\">$val</a>";
            break;

            case "addr_my":
                $icon_in = "";
                $icon_out = "";
                if($wal == $v2[addr_to])
                {
                $val = $v2[from];
                $icon_out = "<i class=\"fa fa-arrow-right text-success\"></i>";
                }
                else
                {
                $val = $v2[addr_to];
                $icon_in = "<i class=\"fa fa-arrow-right text-danger\"></i>";
                }

                $val2 = substr($val,0,5)."...".substr($val,37);

//              $kuda = "https://explorer-test.kvant.io/address/$val";
                $kuda = $url_e."/address/$val";
                $val = $icon_in."&nbsp;<a href=\"$kuda\">$val2</a>&nbsp;$icon_out";
            break;
            case "addr_to":
            case "addr_from":
            case "addr":
                $val2 = substr($val,0,5)."...".substr($val,37);

//              $kuda = "https://explorer-test.kvant.io/address/$val";
                $kuda = $url_e."/address/$val";
                $val = "<a href=\"$kuda\">$val2</a>";
            break;
            case "addr_full":
//                $val2 = substr($val,0,5)."...".substr($val,37);

//              $kuda = "https://explorer-test.kvant.io/address/$val";
                $kuda = $url_e."/address/$val";
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