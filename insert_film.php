<!-- Brandon Lassche -->

<?php


    require_once('functions.php');
    echo "<h1>Insert 'Film'</h1>";
    
    if(isset($_POST) && isset($_POST['insert'])){
        CreateFilm($_POST);
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Insert Film</title>
    </head>
    <body>
        <form action="#" method="post">
            <input type="number" name="filmid" id="0" hidden><br>
            <label for="1">filmnaam:  </label><input type="text" name="filmnaam" value="" id="1" required><br>
            <label for="2">genreid:     </label><input type="text" name="genreid" value="" id="2" required><br>
            <label for="3">releasejaar:     </label><input type="text" name="releasejaar" value="" id="3" required><br>
            <label for="4">regisseur:   </label><input type="text" name="regisseur" value="" id="4" required><br>
            <label for="5">landherkomst: </label><input type="text" name="landherkomst" value="" id="5" required><br>
            <label for="6">duur:     </label><input type="text" name="duur" value="" id="3" required><br>
            <?php
            
            ?>
            </select><br>
            <br><input type="submit" name="insert" value="Insert" id="insert">
        </form>
    <a href="crud.php">Return to CRUD</a>
    </body>
</html>