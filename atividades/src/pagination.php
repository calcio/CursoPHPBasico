<?php
function showPagination($param = ['recordsPerPage' => 3, 'totalRows' => 6, 'url' => "#", 'range' => 2])
{
    // page given in URL parameter, default page is one
    $page = isset($_GET['page']) ? $_GET['page'] : 1;

    // calculate for the query LIMIT clause
    $fromRecordNum = ($param['recordsPerPage'] * $page) - $param['recordsPerPage'];

    echo "<nav><ul class=\"pagination pagination-sm\">";

    // button for first page
    if ($page > 1) {
        echo "<li><a href=\"{$param['url']}\" title=\"Ir para primeira página.\">";
            echo "<<";
        echo "</a></li>";
    }

    // count all lines in the database to calculate total pages
    $totalPges = ceil($param['totalRows'] / $param['recordsPerPage']);

    // display links to 'range of pages' around 'current page'
    $initialNum = $page - $param['range'];
    $conditionLimitNum = ($page + $param['range'])  + 1;

    for ($x = $initialNum; $x < $conditionLimitNum; $x++) {

        // be sure '$x is greater than 0' AND 'less than or equal to the $totalPges'
        if (($x > 0) && ($x <= $totalPges)) {

            // current page
            if ($x == $page) {
                echo "<li class=\"active\"><a href=\"#\">$x <span class=\"sr-only\">(current)</span></a></li>";
            }

            // not current page
            else {
                echo "<li><a href=\"{$param['url']}?page=$x\">$x</a></li>";
            }
        }
    }

    // button for last page
    if($page<$totalPges){
        echo "<li><a href=\"" .$param['url'] . "?page={$totalPges}\" title=\"Last page is {$totalPges}.\">";
            echo ">>";
        echo "</a></li>";
    }

    echo "</ul></nav>";
}
?>
