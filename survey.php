<!DOCTYPE html>
<!--
Survey main page
-->
<?php if(!isset($_SESSION['survey'])) {
session_start();
$_SESSION['survey'] = 'voting';
} ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Survey</title>
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>
    <body>
        <section id='top'>
            <h1>Leesa Ruzicka's CS313 Survey</h1>
        </section>
        <?php include 'nav.php';?>
        <div id='main'>
            <h2>Survey</h2>
        
        <form action="surveyresults.php" method="POST">
            <input type="submit" name="results" value="Skip to the results" >
        </form>
        
        <form action="surveyresults.php" method="POST">
            
            Question 1: Choose the best hero?<br/>
            <input type="radio" name="hero" value='indiana'>Indiana Jones<br/>
            <input type="radio" name="hero" value='robin'>Robin Hood<br/>
            <input type="radio" name="hero" value='jack'>Jack Bauer<br/>
            <input type="radio" name="hero" value='batman'>Batman<br/>
            <br/>
            Question 2: Who has the worst haircut?<br/>
            <input type="radio" name="hair" value='nicolas'>Nicolas Cage<br/>
            <input type="radio" name="hair" value='johnny'>Johnny Depp<br/>
            <input type="radio" name="hair" value='matthew'>Matthew McConaughey<br/>
            <input type="radio" name="hair" value='shia'>Shia LaBeouf<br/>
            <br/>
            Question 3: Choose the best villan?<br/>
            <input type="radio" name="vill" value='jafar'>Jafar<br/>
            <input type="radio" name="vill" value='wicked'>Wicked witch of the west<br/>
            <input type="radio" name="vill" value='vold'>Voldemort<br/>
            <input type="radio" name="vill" value='loki'>Loki<br/>
            <br/>
            Question 4: What do you wish for?<br/>
            <input type="radio" name="wish" value='money'>Money<br/>
            <input type="radio" name="wish" value='fame'>Fame<br/>
           <input type="radio" name="wish" value='grade'>Good grades<br/>
           <input type="radio" name="wish" value='choco'>Chocolate<br/><br/>
            <input type="submit" name="submit" value="submit" >

        </form>
        </div>
    </body>
</html>
