<?php

$return_result = $_POST['hideAnswer'];

// TODO: Изменить условия для выхода из скрипта или аналогичные им.

$exit_status = false;
if ($return_result == 2) {
    $exit_status = true;
    $answer = "";
    exit;
} else {
    if (isInputValid()) {
        // init some variables
        $result = "";
        $line = "";
        $x = (int)$_POST['x'];
        $y = (float)$_POST['y'];
        $radius = (int)$_POST['radius'];

        $answer = (pointBelongToArea($x, $y, $radius) ? "Точка принадлежит области" : "Точка не принадлежит области") . " " . "Координаты точки: X={$x}; Y={$y}; R={$radius} " . "\n";

        $file = fopen("answers", "a+");
        fwrite($file, $answer);
        fclose($file);
        $file = fopen("answers", "r");
        while (($line = fgets($file)) !== false) {
            $answer .= $line;
        }
    } else {
        $file = fopen("answers", "r");
        $answer = "Значения выходят за диапазон или не установлены \n";
        while (($line = fgets($file)) !== false) {
            $answer .= $line;
        }
    }
}
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

        if (is_numeric($x) && is_numeric($y) && is_numeric($r))
            if ($y >= -5 && $y <= 3)
                return true;
    }
    return false;
}
