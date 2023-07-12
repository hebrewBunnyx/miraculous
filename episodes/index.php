<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>פרקים</title>
</head>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/menu.php'; ?>

    <h2>חיפוש פרק</h2>
    <form action="" method="post">  
         עונה: <input type = "number" name = "season" /> <br>  
         פרק: <input type = "number" name = "episode" /> <br>
         <input type="radio" name="lang" value="dubbed">מדובב
         <input type="radio" name="lang" value="translated">מתורגם
         <br>
         <input type = "submit" name="submit" value="חיפוש" />  
    </form>

    <?php

        $servername = "localhost";
        $username = "528256";
        $password = "o0526912409";
        $dbname = "528256";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $epId = -1;
        if( isset($_POST['submit']) ){
            if(isset($_POST['season']) && isset($_POST['episode'])){
                if(isset($_POST['lang'])){
                    $season = $_POST["season"];
                    $episode = $_POST["episode"];

                    $sql = "SELECT * FROM episodes WHERE season = " . $season . " AND episode = " . $episode;
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        

                        while($row = $result->fetch_assoc()) {
                            $_SESSION['epId'] = $row['id'];
                            $query = "SELECT * FROM seenEpisodes WHERE userId = " . $user_data['id'] . " 
                            AND episodeId = " . $row['id'];
                            $r = $conn->query($query);
                            if ($r->num_rows > 0){
                                $seen = true;
                            }else{
                                $seen = false;
                            }
                            $source;
                            if($_POST['lang'] == 'dubbed'){
                                $source = $row['dubbedSrc'];
                            }else{
                                $source = $row['translatedSrc'];
                            }
                            echo "<h2";
                            if($seen == true){
                                echo " style='color:lightgreen;'";
                            }
                            echo ">עונה ". $season . " פרק ". $episode . " - '" . $row["name"] . "'";
                            if($_POST['lang'] == 'dubbed'){
                                echo " (מדובב)";
                            }else{
                                echo " (מתורגם)";
                            }
                            echo "</h2>";

                            if($source != ""){
                                echo "<video controls autoplay src='" . $source . "'></video>";
                            }else{
                                echo "<p>הפרק לא זמין.</p>";
                            }
                            echo "<form method='post' action='seen.php'><input type='submit' name='seen' value='";
                            $query = "SELECT * FROM seenEpisodes WHERE userId = " . $user_data['id'] . " 
                            AND episodeId = " . $row['id'];
                            $r = $conn->query($query);
                            if ($r->num_rows > 0){
                                echo "לסימון כלא נצפה";
                            }else{
                                echo "לסימון כנצפה";
                            }
                            echo "'></form>";
                        }
                    } else {
                        echo "הפרק שאתה מחפש לא קיים.";
                    }
                    
                }else{
                    echo "לא נבחרה שפה.";
                }
            }else{
                echo "עונה או פרק לא הוקלדו.";
            }
        }

        /*if(isset($_POST['seen'])){
            $quer = "SELECT * FROM seenEpisodes WHERE userId = " . $user_data['id'] . " 
                            AND episodeId = " . $_SESSION['epId'];
            $rrr = $conn->query($quer);
            if($rrr->num_rows > 0){
                
            $conn->query("DELETE FROM seenEpisodes WHERE userId = " . $user_data['id'] . " AND episodeId = " . $_SESSION['epId']);
            }else{
                $conn->query("INSERT INTO seenEpisodes (userId, episodeId)
                VALUES (" . $user_data['id'] . ", " . $_SESSION['epId'] . ")");
            }
        }*/
    ?>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/menuEnd.php'; ?>
    
</body>
</html>
