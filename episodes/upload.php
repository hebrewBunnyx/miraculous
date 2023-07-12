<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>העלאת פרק</title>
</head>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/menu.php"; ?>

<h2>העלאת פרק</h2>
<form action="" method="post">
    עונה: <input type="number" name="season" id=""><br>
    פרק: <input type="number" name="episode" id=""><br>
    מתורגם: <input type="radio" value="translated" name="lang" id=""><br>
    מדובב: <input type="radio" value="dubbed" name="lang" id=""><br>
    קישור: <input type="text" name="source" id=""><br>
    <input type="submit" value="העלאה">
</form>
<h2><a href="./notUploaded.php">פרקים שלא הועלו</a></h2>

<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['season']) && isset($_POST['episode']) && isset($_POST['lang']) && isset($_POST['source'])){
            if($_POST['lang'] == "dubbed"){
                $src = 'dubbedSrc';
            }else{
                $src = 'translatedSrc';
            }
            $sql = "UPDATE episodes SET " . $src . " = '" . $_POST['source'] .
            "' WHERE season = " . $_POST['season'] . " AND episode = " . $_POST['episode'] . ";";
            $con->query($sql);
            echo "<p>הפרק הועלה בהצלחה.</p>";
        }
    }

?>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/menuEnd.php"; ?>

</html>