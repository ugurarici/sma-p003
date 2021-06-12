<?php

function getResultData($file = "result.json")
{
    return json_decode(file_get_contents($file), true);
}

function avg($array)
{
    return array_sum($array) / count($array);
}

function standartDeviation($array)
{
    $num_of_elements = count($array);

    $variance = 0.0;

    // calculating mean using array_sum() method
    $average = avg($array);

    foreach ($array as $item) {
        // sum of squares of differences between
        // all numbers and means.
        $variance += pow(($item - $average), 2);
    }

    return (float)sqrt($variance / $num_of_elements);
}
