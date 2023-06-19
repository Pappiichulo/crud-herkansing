<!-- Brandon Lassche -->
<?php
require_once('functions.php');

echo '<h1> Delete Data </h1>';

if(isset($_GET['filmid'])){

echo '<br> Data uit het vorige formulier: <br>';

$filmid = $_GET['filmid'];

$row = GetFilm($filmid);

echo '<table border = 1px>';

echo '<tr>';

foreach ($row as $value) {

echo '<td>' . $value . '</td>';

}

echo '</tr>';

 echo '</table>';

} else {

echo 'Geen film opgegeven';

}

if(isset($_POST) && isset($_POST['delete'])){

DeleteFilm($filmid);

header("location:crud.php");

}

?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Delete Data</title>

</head>

<body>

<form action="#" method="post">

<input type="number" name="filmid" value="<?php echo $_GET['filmid']?>" id="0" hidden required><br>

<input type="submit" name="delete" value="Delete" id="delete">

 <a href="crud.php">Return to CRUD</a>

 </form> 

</body>

</html>
