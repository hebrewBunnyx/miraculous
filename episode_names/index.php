<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>שמות הפרקים</title>
</head>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/menu.php'; ?>

    <h2>חיפוש לפי טקסט</h2>
    <form action="" method="post">  
         שם: <input type = "search" name = "name" /> <br>  
         <input type = "submit" value="חיפוש" />  
    </form>

    <?php
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(isset($_POST['name'])){
                if($_POST['name'] != ""){
                    
                }
            }
        }
        $sqlMaxSeason = "SELECT * FROM episodes ORDER BY season DESC LIMIT 1";
        $resMaxSeason = $con->query($sqlMaxSeason);
        if($resMaxSeason->num_rows > 0){
            while($row = $resMaxSeason->fetch_assoc()){
                $_SESSION['maxSeason'] = $row['season'];
            }
        }

        for($i = 0; $i <= $_SESSION['maxSeason']; $i++){
            if($i == 0){
                echo "<h2>ספיישלים</h2>";
            }else{
                echo "<h2>עונה " . $i . "</h2>";
            }

            $sqlSelectSeason = "SELECT * FROM episodes WHERE season = " . $i . " ORDER BY episode";
            $resSelectSeason = $con->query($sqlSelectSeason);
            if($resSelectSeason->num_rows > 0){
                while($row = $resSelectSeason->fetch_assoc()){
                    $sqlIsSeen = "SELECT * FROM seenEpisodes WHERE userId = " . $user_data['id'] . " AND episodeId = " . $row['id'];
                    $resIsSeen = $con->query($sqlIsSeen);
                    echo "<h3";
                    if($resIsSeen->num_rows > 0){
                        echo " style='color:lightgreen;'";
                    }
                    echo ">עונה " . $row['season'] . " פרק " . $row['episode'] . " - '" . $row['name'] . "'</h3>";
                }
            }else{
                echo "<p>אין פרקים בעונה זו.</p>";
            }
        }
        /*function seen($userId, $episodeId) {
            $sqlIsSeen = "SELECT * FROM seenEpisodes WHERE userId = " . $userId . " AND episodeId = " . $episodeId . "";
            $resIsSeen = $con->query($sqlIsSeen);
            if($resIsSeen->num_rows > 0){
                return true;
            }else{
                return false;
            }
        }*/
    ?>


<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/menu.php'; ?>

</html>
