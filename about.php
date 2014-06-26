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
//        if (isset($_POST['submit'] = 'submit')) {
//  $name = $_POST['name'];
//  $email = $_POST['email'];
//  $major = $_POST['major'];
//  $place = $_POST['place'];
//  $comments = $_POST['comments'];
//  
//}
        
        ?>
        <h2>Welcome <?php echo $_POST['name'];?>. </h2>
        <a href="mailto: <?php echo $_POST['email']; ?>">Email</a>
        <p>Major: <?php echo $_POST['major'];?></p>
        <p>Places visited: <br /><?php foreach($_POST['place'] as $item) { echo $item .'<br/>';} ?></p>
        
        <p>Comments: <br /> <?php echo $_POST['comments']; ?></p>
    </body>
</html>
