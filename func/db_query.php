<?php
function db_query($query)
{
    global $con,$glob;

    //print_mas($query);
    $t = script_time("end");
    $res = mysqli_query($con,$query);
    $t2 = script_time("end");
    $t3 = $t2-$t;
    $m[query] = $query;
    $m[time] = $t3;
    $glob[db][query][] = $m;
    $glob[db][query_time] += $t3;

    return $res;
}
?>