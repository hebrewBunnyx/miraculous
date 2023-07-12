<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>הוספת פרק</title>
</head>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/menu.php" ?>
<h2>הוספת פרק</h2>
<form action="" method="post">
    שם פרק: <input type="text" name="name" id=""><br>
    עונה: <input type="number" name="season" id=""><br>
    פרק: <input type="number" name="episode" id=""><br>
    <input type="submit" value="הוספה">
</form>

<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['season']) && isset($_POST['season']) && isset($_POST['name'])){
            if($_POST['name'] != ""){
                $query = "SELECT * FROM episodes WHERE season = " . $_POST['season'] . " AND episode = " . $_POST['episode'];
                $res = $con->query($query);
                if($res->num_rows == 0){
                    $sql = "INSERT INTO episodes (name, season, episode)
                    VALUES ('" . $_POST['name'] . "', " . $_POST['season'] . ", " . $_POST['episode'] . ");";
                    $con->query($sql);
                    echo "<p>הפרק נוסף בהצלחה.</p>";
                }else{
                    echo "<p>פרק כזה כבר קיים.</p>";
                }
            }else{
                echo "<p>בחר שם לפרק.</p>";
            }
        }else{
            echo "<p>שדות לא יכולים להישאר ריקים.</p>";
        }
    }

?>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/menu.php" ?>

</html>