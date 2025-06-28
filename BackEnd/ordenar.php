<?php 
//agoritmo quicksort
function quicksortPorData($array) {
    if (count($array) < 2) {
        return $array;
    }

    $pivot = $array[0];
    $pivotDate = strtotime($pivot["data"]);

    $left = [];
    $right = [];

    for ($i = 1; $i < count($array); $i++) {
        $currentDate = strtotime($array[$i]["data"]);
        if ($currentDate > $pivotDate) { // ordem decrescente: mais recente primeiro
            $left[] = $array[$i];
        } else {
            $right[] = $array[$i];
        }
    }

    return array_merge(quicksortPorData($left), [$pivot], quicksortPorData($right));
}
?>
