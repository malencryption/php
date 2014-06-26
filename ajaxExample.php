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
        <div id="newContent">
            <form>
                <input type="button" onclick="addNewContent()" value="Click Me!">
            </form>
        </div>
        
        
        <?php
        sleep(2);
        
        for ($i = 0; $i< 10; $i++){
            echo "$i<br />";
        }
        ?>
        <script src="ajaxExample.js"> </script>
    </body>
</html>
