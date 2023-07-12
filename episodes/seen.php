<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . "/menu.php";

if(isset($_POST['seen'])){
    $quer = "SELECT * FROM seenEpisodes WHERE userId = " . $user_data['id'] . " 
                            AND episodeId = " . $_SESSION['epId'];
            $rrr = $con->query($quer);
            if($rrr->num_rows > 0){
            
            $con->query("DELETE FROM seenEpisodes WHERE userId = " . $user_data['id'] . " AND episodeId = " . $_SESSION['epId']);
            }else{
                $con->query("INSERT INTO seenEpisodes (userId, episodeId)
                VALUES (" . $user_data['id'] . ", " . $_SESSION['epId'] . ")");
            }
}

require_once $_SERVER['DOCUMENT_ROOT'] . "/menuEnd.php";

header("Location: index.php");
?>