<?php

if (isInputValid()) {

    // start measuring script time
    $begin = microtime();

    // init some variables
    $result = "";
    $line = "";
    $x = (int)$_POST['x'];
    $y = (string)$_POST['y'];
    $radius = (int)$_POST['radius'];

    // complete answer
    $answer = (pointBelongToArea($x, floatval($y), $radius) ? "<tr>  " . "\n" . "<td>" . "Точка принадлежит области" . "</td>" : "<tr>" . "\n" . "<td>" . "Точка не принадлежит области" . "</td>") . "\n" .
        "<td> X={$x} </td>" . "\n" . "<td>" . "Y={$y} </td>" . "\n" . "<td> R={$radius} </td>" . "\n" . "</tr>" . "\n";

    // open file and write answers
    $file = fopen("answers", "a+");
    fwrite($file, $answer);
    fclose($file);
    $file = fopen("answers", "r");
    $answer = "";

    $answer = "<tr>" . "\n" . "<th>" . "Попал?" . "</th>" . "<th>" . "X" . "</th>" . " <th>" . "Y" . "</th>" . "<th>" . "R" . "</th>" . "</tr>";

    while (($line = fgets($file)) !== false) {

        $answer .= $line;
    }
    // end time measuring
    $end = microtime();

} else {
    $begin = microtime();
    $file = fopen("answers", "r");
    $answer = "Значения выходят за диапазон или не установлены" . "<br></br>" . "<tr>" . "\n" . "<th>" . "Попал?" . "</th>" . "<th>" . "X" . "</th>" . " <th>" . "Y" . "</th>" . "<th>" . "R" . "</th>" . "</tr>";

    while (($line = fgets($file)) !== false) {
        $answer .= $line;
    }
    $end = microtime();
}

$time = ($end - $begin) * 100000;

if (isset($time)) {
    echo "<p> Время работы скрипта: " . round($time, 2) . " микросекунд</p>";
}

echo "<p>Текущее время: " . date("G:i:s") . "</p>";

// return answer on page
include 'index.php';

function pointBelongToArea($x, $y, $radius)
{
    return ((($x <= $radius) && ($x >= 0)) && (($y <= $radius) && ($y >= 0)) &&
        ((pow($x, 2) + pow($y, 2) <= (pow($radius, 2)))) ||
        (($x >= -$radius / 2.0) && ($x <= 0) && ($y >= -$radius) && ($y <= 0)) ||
        (($x >= -$radius) && ($x <= 0) && ($y <= $radius / 2.0) && ($y >= 0) && ($y <= $x + $radius / 2.0)));
}

function isInputValid()
{
    if (isset($_POST['x']) && isset($_POST['y']) && isset($_POST['radius'])) {
        $x = $_POST['x'];
        $y = $_POST['y'];
        $r = $_POST['radius'];

        if (is_numeric($x) && is_numeric($y) && is_numeric($r)) {
            if ($y >= -5 && $y <= 3) {
                return true;
            }
        }
    }
    return false;
}
