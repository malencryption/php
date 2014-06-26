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
        
        <form method="post" action="about.php">
            Name: <input type="text" name="name"><br/><br/>
            Email: <input type="email" name="email"><br/><br/>
            Major: <br/>
            <input type="radio" name="major" value="Computer Science">Computer Science<br/>
            <input type="radio" name="major" value="Web Development and Design">Web Development and Design<br/>
            <input type="radio" name="major" value="Computer Information Technology">Computer Information Technology<br/>
            <input type="radio" name="major" value="Computer Engineering">Computer Engineering<br/><br/>
            Places you have visited: <br/>
            <input type="checkbox" name="place[]" value="North America">North America<br/>
            <input type="checkbox" name="place[]" value="South America">South America<br/>
            <input type="checkbox" name="place[]" value="Europe">Europe<br/>
            <input type="checkbox" name="place[]" value="Asia">Asia<br/>
            <input type="checkbox" name="place[]" value="Australia">Australia<br/>
            <input type="checkbox" name="place[]" value="Africa">Africa<br/>
            <input type="checkbox" name="place[]" value="Antarctica">Antarctica<br/><br/>
            Comments: <br/><textarea name="comments" rows="4" columns="50">Enter Comments Here</textarea> <br/>
            <input type="submit" name="submit" value="submit">
       </form>
        
    </body>
</html>
