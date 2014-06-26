<?php

if(!isset($_SESSION)) {
    session_start();
}
$filename = "survey.txt";
$file = fopen($filename, "r+");
        while ($line = fgets($file)) {
            $array = explode(" | ", $line);
        }
$countIndiana = $array[0];
$countRobin = $array[1];
$countJack = $array[2];
$countBatman = $array[3];
$countNicolas = $array[4];
$countJohnny = $array[5];
$countMatthew = $array[6];
$countShia = $array[7];
$countJafar = $array[8];
$countWicked = $array[9];
$countVold = $array[10];
$countLoki = $array[11];
$countMoney = $array[12];
$countFame = $array[13];
$countGrade = $array[14];
$countChoco = $array[15];
$numberOfVotes = $array[16];

if($_POST['results'] == "Skip to the results" OR $_COOKIE['voted'] == 'yes'){
    include 'results.php';
    exit;
}

if ($_POST['submit'] == 'submit') {
    setcookie("voted", "yes");
 $numberOfVotes++;
    if ($_POST['hero'] == 'indiana') {
        $countIndiana++;
    }
    if ($_POST['hero'] == 'robin') {
        $countRobin++;
    }
    if ($_POST['hero'] == 'jack') {
        $countJack++;
    }
    if ($_POST['hero'] == 'batman') {
        $countBatman++;
    }
    if ($_POST['hair'] == 'nicolas') {
        $countNicolas++;
    }
    if ($_POST['hair'] == 'johnny') {
        $countJohnny++;
    }
    if ($_POST['hair'] == 'matthew') {
        $countMatthew++;
    }
    if ($_POST['hair'] == 'shia') {
        $countShia++;
    }
    if ($_POST['vill'] == 'jafar') {
        $countJafar++;
    }
    if ($_POST['vill'] == 'wicked') {
        $countWicked++;
    }
    if ($_POST['vill'] == 'vold') {
        $countVold++;
    }
    if ($_POST['vill'] == 'loki') {
        $countLoki++;
    }
    if ($_POST['wish'] == 'money') {
        $countMoney++;
    }
    if ($_POST['wish'] == 'fame') {
        $countFame++;
    }
    if ($_POST['wish'] == 'grade') {
        $countGrade++;
    }
    if ($_POST['wish'] == 'choco') {
        $countChoco++;
    } 
   
    $filename = "survey.txt";
    $insertvote = $countIndiana . " | " . $countRobin . " | " . $countJack 
            . " | " . $countBatman . " | " . $countNicolas . " | " 
            . $countJohnny . " | " . $countMatthew . " | " . $countShia 
            . " | " . $countJafar . " | " . $countWicked . " | " . $countVold 
            . " | " . $countLoki . " | " . $countMoney . " | " . $countFame 
            . " | " . $countGrade . " | " . $countChoco . " | " .$numberOfVotes;
    $fp = fopen($filename, "w");
    fputs($fp, $insertvote);
    fclose($fp);
    include 'results.php';
    exit;
}else {
    include 'survey.php';
    exit;
}
?>