<!-- Brandon Lassche -->

<?php






require_once('functions.php');

echo "<h1>Edit 'Film'</h1>";


if(isset($_POST) && isset($_POST['edit'])){

 UpdateFilm($_POST);

 }




if(isset($_GET['filmid'])){

 echo "Selected data cell: <br>";

 $filmid = $_GET['filmid'];

$row = GetFilm($filmid);

 }

?>




<!DOCTYPE html>

<html lang="en">

<head>

 <meta charset="UTF-8">

 <meta http-equiv="X-UA-Compatible" content="IE=edge">

 <meta name="viewport" content="width=device-width, initial-scale=1.0">

 <title>Edit Data</title>

</head>



<body>

 <form action="#" method="post">

<input type="number" name="filmid" value="<?php echo $_GET['filmid']?>" id="0" hidden required><br>

 <label for="1">filmnaam: </label><input type="text" name="filmnaam" value="<?=$row['filmnaam']?>" id="1" required><br>

 <label for="2">genreid: </label><input type="text" name="genreid" value="<?=$row['genreid']?>" id="2" required><br>

 <label for="3">releasejaar: </label><input type="text" name="releasejaar" value="<?=$row['releasejaar']?>" id="3" required><br>

 <label for="4">regisseur: </label><input type="text" name="regisseur" value="<?=$row['regisseur']?>" id="4" required><br>

 <label for="5">landherkomst: </label><input type="text" name="landherkomst" value="<?=$row['landherkomst']?>" id="5" required><br>
 
 <label for="6">duur: </label><input type="text" name="duur" value="<?=$row['duur']?>" id="6" required><br>

 <?php



?>

</select><br>

<input type="submit" name="edit" value="Edit" id="edit">

 </form> 




<a href="crud.php">Return to CRUD</a>

</body>

</html>