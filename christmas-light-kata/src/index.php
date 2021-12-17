<?php

require_once "./../vendor/autoload.php";

$lightGrid = new \App\LightGrid(1000, 1000);

//Instructions
//1. turn on 887,9 through 959,629
$lightGrid->turnOn([887,9], [959, 629]);

//2. turn on 454,398 through 844,448
$lightGrid->turnOn([454,398], [884, 448]);

//3. turn off 539,243 through 559,965
$lightGrid->turnsOff([539,243], [559,965]);

//4. turn off 370,819 through 676,868
$lightGrid->turnsOff([370,819], [676,868]);

//5. turn off 145,40 through 370,997
$lightGrid->turnsOff([145,40], [370, 997]);

// 6. turn off 301,3 through 808,453
$lightGrid->turnsOff([301,3], [808, 453]);

// 7. turn on 351,678 through 951,908
$lightGrid->turnOn([351,678], [951,908]);

//8. toggle 720,196 through 897,994
$lightGrid->toggleLight([720,196], [897,994]);

//9. toggle 831,394 through 904,860
$lightGrid->toggleLight([831,394], [904,860]);


$numberOfLightsLit  = $lightGrid->numberOfLightsLit();

print("Number of lights lit = " . $numberOfLightsLit . "\n");