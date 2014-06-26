<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $filename = "links.txt";
        $file = fopen($filename, "r");
        while ($line = fgets($file)) {
            $array = explode("|", $line);
            echo "<a href='http://$array[1]'>$array[0] </a><br/>";
        }
        ?>
    </body>
</html>
