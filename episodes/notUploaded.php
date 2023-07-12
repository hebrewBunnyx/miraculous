<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>פרקים שלא הועלו</title>
</head>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/menu.php"; ?>

<?php
    $sqlNotUploaded = "SELECT * FROM episodes";
    $resNotUploaded = $con->query($sqlNotUploaded);
    if($resNotUploaded->num_rows > 0){
        echo "<h2>פרקים שלא הועלו</h2>";
        echo "<h3 style='color:aqua;'>לא הועלה כלל</h3>
                <h3 style='color:lightgreen;'>לא הועלה מדובב</h3>";
        $uploadedAll = true;
        while($row = $resNotUploaded->fetch_assoc()){
            if($row['translatedSrc'] == "" && $row['dubbedSrc'] == ""){
                $uploadedAll = false;
                echo "<h3 style='color:aqua;'>";
                echo "עונה " . $row['season'] . " פרק " . $row['episode'] . " - '" . $row['name'] . "'</h3>";
            }else if($row['dubbedSrc'] == ""){
                $uploadedAll = false;
                echo "<h3 style='color:lightgreen;'>";
                echo "עונה " . $row['season'] . " פרק " . $row['episode'] . " - '" . $row['name'] . "'</h3>";
            }
        }
        if($uploadedAll == true){
            echo "<p>כל הפרקים כבר הועלו.</p>";
        }
    }
?>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/menuEnd.php"; ?>

</html>