<!-- Brandon Lassche -->

<?php

 function ConnectDb(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "3dplus";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $conn;
    } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

function GetData($table){
    $conn = ConnectDb();
    $query = $conn->prepare("SELECT * FROM $table");
    $query->execute();
    $result = $query->fetchAll();   
    return $result;
}

function GetFilm($filmid){
    $conn = ConnectDb();
    $query = $conn->prepare("SELECT * FROM film WHERE filmid = $filmid");
    $query->execute();
    $result = $query->fetch();
    return $result;
}

function PrintTableTest($result){
   $table = "<table border = 1px>";
   foreach ($result as $row) {
       echo "<br> rij:";

       foreach ($row as  $value) {
           echo "kolom" . "$value";
       }          
   }
}

function PrintTable($result){
    $table = "<table border = 1px>";
    $headers = array_keys($result[0]);
    $table .= "<tr>";
    foreach($headers as $header){
        $table .= "<th bgcolor=gray>" . $header . "</th>";   
    }

    foreach ($result as $row) {  
        $table .= "<tr>";
        
        foreach ($row as $cell) {
            $table .= "<td>" . $cell . "</td>";
        }
        $table .= "</tr>";
    }
    $table.= "</table>";
    echo $table;
}

function CrudFilm(){
    $result = GetData("film");
    PrintCrudFilm($result);
}

function PrintCrudFilm($result){
    $table = "<table border = 1px>";
    $headers = array_keys($result[0]);
    $table .= "<tr>";
    foreach($headers as $header){
        $table .= "<th bgcolor=gray>" . $header . "</th>";   
    }

    foreach ($result as $row) {
        
        $table .= "<tr>";
        foreach ($row as $cell) {
            $table .= "<td>" . $cell . "</td>";
        }
        
        $table .= "<td>". 
            "<form method='post' action='update_film.php?filmid=$row[filmid]' >       
                    <button name='btn_edit'>Edit</button>	 
            </form>" . "</td>";

        $table .= "<td>". 
        "<form method='post' action='delete_film.php?filmid=$row[filmid]' >       
                <button name='btn_del'>Delete</button>	 
        </form>" . "</td>";
    }
    $table.= "</table>";

    echo $table;
}

function CreateFilm(){
    echo '<h3> Insert row. </h3>';
    echo '<br>';
    try {
        $conn = ConnectDb();

        $filmnaam = $_POST['filmnaam'];
        $genreid = $_POST['genreid'];
        $releasejaar = $_POST['releasejaar'];
        $regisseur = $_POST['regisseur'];
        $landherkomst = $_POST['landherkomst'];
        $duur = $_POST['duur'];
    
        $sql = "INSERT INTO `film` 
        (`filmnaam`, `genreid`, `releasejaar`, `regisseur`, `landherkomst`, `duur`) 
        VALUES ('$filmnaam', '$genreid', '$releasejaar', '$regisseur', '$landherkomst', '$duur')";

        $query = $conn->prepare($sql);
        $query->execute();
    } 
    catch(PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
}

function UpdateFilm($row){
    echo '<h3> Update row. </h3>';
    echo '<br>';
    try {
        $conn = ConnectDb();
        $sql = "UPDATE `film` 
        SET 
            `filmnaam` = '$row[filmnaam]', 
            `genreid` = '$row[genreid]', 
            `releasejaar` = '$row[releasejaar]', 
            `regisseur` = '$row[regisseur]',
            `landherkomst` = '$row[landherkomst]',
            `duur` = '$row[duur]'
        WHERE `film`.`filmid` = $row[filmid]";

        $query = $conn->prepare($sql);
        $query->execute();
    } 
    catch(PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
}

function DeleteFilm($filmid){
    echo 'Deleted row. <br>';
    try {
        $conn = ConnectDb();
        $sql = "DELETE FROM film WHERE `film`.`filmid` = :filmid";
        $query = $conn->prepare($sql);
        $query->bindParam(':filmid', $filmid);
        $query->execute();
    } 
    catch(PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
}
?>