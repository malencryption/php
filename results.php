<!DOCTYPE html>
<?php

//        ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Survey</title>
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>
    <body>
        <section id='top'>
            <h1>Leesa Ruzicka's CS313 Survey Results</h1>
        </section>
        <?php include 'nav.php';?>
        <div id='main'>
        <h2>Survey Results</h2>
        <?php
//        $filename = "survey.txt";
//        $file = fopen($filename, "r");
//        $i = 0;
//        while ($line = fgets($file)) {
//            $array = explode(" | ", $line);
//            
//            echo '<p>' .$array[$i] .'</p>';
//            $i++;
//        }
//        fclose($file);
      echo "<h3>Best Hero:</h3>     
<p>Indiana Jones: $countIndiana / $numberOfVotes</p>
<p>Robin Hood: $countRobin / $numberOfVotes </p>
<p>Jack Bauer: $countJack / $numberOfVotes </p>
<p>Batman: $countBatman / $numberOfVotes</p><br/>

<h3>Worst Haircut:</h3> 
<p>Nicolas Cage: $countNicolas / $numberOfVotes</p>
<p>Johnny Depp: $countJohnny / $numberOfVotes</p>
<p>Matthew McConaughey: $countMatthew / $numberOfVotes </p>
<p>Shia LaBeouf: $countShia / $numberOfVotes</p><br/>

<h3>Best Villian: </h3> 
<p>Jafar: $countJafar / $numberOfVotes</p>
<p>Wicked Witch of the West: $countWicked / $numberOfVotes </p>
<p>Voldemort: $countVold / $numberOfVotes</p>
<p>Loki: $countLoki / $numberOfVotes</p><br/>

<h3>Wished For:</h3> 
<p>Money: $countMoney / $numberOfVotes</p>
<p>Fame: $countFame / $numberOfVotes</p>
<p>Good Grades: $countGrade / $numberOfVotes</p>
<p>Chocolate: $countChoco / $numberOfVotes</p>"
        ?>
        </div>
    </body>
</html>