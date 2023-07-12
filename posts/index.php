<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>פוסטים</title>
</head>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/menu.php"; ?>
<style>
    .container {
        background-color: rgba(255, 255, 255, 0.5);
        display: inline-block;
        border-radius: 3em;
        margin: 1em;
        padding: 1em;
    }
    .container p {
        -webkit-text-stroke: white 0.5px;
    }
    .container a{
        color: black;
        text-decoration: underline;
    }
    h1, h2, h3, h4, h5, h6 {
        color: black;
        -webkit-text-stroke-width: 0px;
    }
</style>
<?php

    if(isset($_GET['id'])){
        $query = "SELECT * FROM posts WHERE id = " . $_GET['id'];
        $result = $con->query($query);
        while($row = $result->fetch_assoc()){
            echo "<div class='container' style='background-color: " . $row['bgColor'] . "d1'>" . 
            $row['text'] .
            "<p>מס' פוסט: " . $row['id'] . "</p>". "</div>";
        }
    }else{
        $query = "SELECT * FROM posts ORDER BY id DESC";
        $result = $con->query($query);
        if($result->num_rows > 0){
            //echo "";
            while($row = $result->fetch_assoc()){
                echo "<div class='container' style='background-color: " . $row['bgColor'] . "d1'>" . 
                "<h2><a style='text-decoration: underline; color: black;' href='./?id=" . $row['id'] . "'>" . $row['title'] . "</h2></a>" . 
                "<p>מס' פוסט: " . $row['id'] . "</p>". "</div><br>";
            }
            //echo "</form>";
        }else{
            echo "<p>אין פוסטים.</p>";
        }
    }
?>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/menuEnd.php"; ?>

</html>
