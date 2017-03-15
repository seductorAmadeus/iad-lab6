<?php
// begin the session
session_start();
// TODO: добавить проверку значений в диапазоне в поле y
// TODO: возвращать таблицу значений; (хранить значения в?)
// TODO: если значение не валидно, то не добавлять его в таблицу
$answer = "";
$result = "";

$return_result = $_POST['hideAnswer'];
// TODO: Изменить условия для выхода из скрипта или аналогичные им.
$exit_status = false;
/*if ($return_result == 2) {
    $exit_status = true;
    exit(0);
}*/
$server_answers = array();

// init some variables
$return_result = $_POST['hideAnswer'];
$x = (int)$_POST['x'];
$y = (float)$_POST['y'];
$radius = (int)$_POST['radius'];

// TODO: использовать не массив, а строку (concat), найти способ выводить строку в табличной форме? Использовать разделители?
// TODO: изменить формат представления данных

 //=  (pointBelongToArea($x, $y, $radius) ? "Точка принадлежит области" : "Точка не принадлежит области") . "<br></br>" . "Координаты точки: X={$x}; Y={$y}; R={$radius} ";

array_push($server_answers, (pointBelongToArea($x, $y, $radius) ? "Точка принадлежит области" : "Точка не принадлежит области") . "<br></br>" . "Координаты точки: X={$x}; Y={$y}; R={$radius} ");

$_SESSION['$answer'] = $server_answers;

/*
 * $char_buff = str_split($word);

foreach ($char_buff as $char){
    $result .= $answer;
}
*/

/*
if (is_array($answers) || is_object($answers)) {
    foreach ($answers as $answer) {
        echo '<tr>';
        foreach ($answer as $key) {
            echo '<td>' . $key . '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
}
*/

// return answer on page
include 'index.php';

function pointBelongToArea($x, $y, $radius)
{
    return ((($x <= $radius) && ($x >= 0)) && (($y <= $radius) && ($y >= 0)) &&
        ((pow($x, 2) + pow($y, 2) <= (pow($radius, 2)))) ||
        (($x >= -$radius / 2.0) && ($x <= 0) && ($y >= -$radius) && ($y <= 0)) ||
        (($x >= -$radius) && ($x <= 0) && ($y <= $radius / 2.0) && ($y >= 0) && ($y <= $x + $radius / 2.0)));
}

