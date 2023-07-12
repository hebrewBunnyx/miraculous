<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>העלאת פוסט</title>
</head>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/menu.php"; ?>

    <form action="" method="post">
        כותרת: <input type="text" name="title" id=""><br>
        טקסט: <textarea type="text" name="text" id=""></textarea><br>
        צבע רקע: <input type="color" name="bgColor" id=""><br>
        <input type="submit" value="העלאה">
    </form>

    <?php
        if(isset($_POST['title']) && isset($_POST['text']) && isset($_POST['bgColor'])){
            if($_POST['title'] != ""){
                if($_POST['text'] != ""){
                    $query = "INSERT INTO posts (title, text, bgColor) VALUES ('" . $_POST['title'] . "', '" . $_POST['text'] . "', '" . $_POST['bgColor'] . "')";
                    $result = $con->query($query);
                }else{
                    echo "<p>אין טקסט.</p>";
                }
            }else{
                echo "<p>אין כותרת.</p>";
            }
        }
    ?>
    
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/menuEnd.php"; ?>

</html>