<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>שליטה</title>
</head>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/menu.php'; ?>

<?php
    $query = "SELECT * FROM managers WHERE userId =" . $user_data['id'];
    $res = $con->query($query);
    if($res->num_rows > 0){

    }else{
        header("Location: /");
    }
?>
<h2><a style="-webkit-text-stroke: 1px black;" href="/episodes/add.php">הוספת פרק</a></h2>
<h2><a style="-webkit-text-stroke: 1px black;" href="/episodes/upload.php">העלאת פרק</a></h2>
<h2><a style="-webkit-text-stroke: 1px black;" href="/posts/add.php">העלאת פוסט</a></h2>


<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/menuEnd.php'; ?>

</html>
