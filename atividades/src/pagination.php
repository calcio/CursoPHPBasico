<?php
function getCurrentPage()
{
    return isset($_GET['page']) ? trim($_GET['page']) : 1;
}

function returnLimitToQuery($params)
{
    $recordsPerPage = isset($params['recordsPerPage']) ? trim($params['recordsPerPage']) : 10;
    // calculate for the query LIMIT clause
    $limit = ($recordsPerPage * getCurrentPage()) - $recordsPerPage;
    return $limit;
}

function showPagination($params)
{
    if ($params['totalRows'] >= 1) {
        $currentPage = getCurrentPage();
        $recordsPerPage = isset($params['recordsPerPage']) ? trim($params['recordsPerPage']) : 10;
        $range = isset($params['range']) ? $params['range'] : 5;

        // count all lines in the database to calculate total pages
        $totalPges = ceil($params['totalRows'] / $recordsPerPage);

        // display links to 'range of pages' around 'current page'
        $initialNum = $currentPage - $range;
        $conditionLimitNum = ($currentPage + $range)  + 1;

        echo "<nav><ul class=\"pagination pagination-sm\">";

        // button for first page
        if ($currentPage > 1) {
            echo "<li><a href=\"{$params['url']}\" title=\"Ir para primeira página.\"> << </a></li>";
        }

        for ($x = $initialNum; $x < $conditionLimitNum; $x++) {
            // be sure '$x is greater than 0' AND 'less than or equal to the $totalPges'
            if (($x > 0) && ($x <= $totalPges)) {
                // current page
                if ($x == $currentPage) {
                    echo "<li class=\"active\"><a href=\"#\">$x <span class=\"sr-only\">(current)</span></a></li>";
                } else {
                    // not current page
                    echo "<li><a href=\"{$params['url']}?page=$x\">$x</a></li>";
                }
            }
        }

        // button for last page
        if ($currentPage < $totalPges) {
            echo "<li><a href=\"" .$params['url'] . "?page={$totalPges}\" title=\"Last page is {$totalPges}.\"> >> </a></li>";
        }

        echo "</ul></nav>";
    }
}

function showTotalRegisters($totalRows)
{
    if ($totalRows == 1) {
        echo '<br /><br />Foi encontrado <strong>1</strong> registro';
    } else {
        echo '<br /><br />Foram encontrados <strong>' . $totalRows . '</strong> registros';
    }
}
?>
