<?php 

session_start();

	include("connection.php");
	include("functions.php");


	

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>התחברות</title>
</head>
<body>

	<style type="text/css">
		@import url('https://fonts.googleapis.com/css2?family=Heebo:wght@500&family=Open+Sans:wght@400;500;600;700;800&display=swap');

		h2 {
		vertical-align: center;
		text-align: center;
		-webkit-text-stroke: 1px black;
		}

		html, body {
		margin: 0;
		height: 100%;
		color: white;
		}
		body {
		background-image: radial-gradient(#212121cc 20%, transparent 20%),
			radial-gradient(#212121cc 20%, transparent 20%);
		background-color: #e53935cc;
		background-position: 0 0, 50px 50px;
		background-size: 100px 100px;
		height: 200px;
		width: 100%;
		text-align:center;
		direction: rtl;
		}

		h1 {
			-webkit-text-stroke: 1px black;
		}

		* {
		font-family: "Open Sans";
		box-sizing: border-box;
		}
		a {
			color: white;
			text-decoration: none;
		}
	</style>
	<form action="" method="post" style="text-align:center;">
		<h2>התחברות</h2>
		שם משתמש: <input type="text" name="user_name" id=""><br>
		סיסמה: <input type="password" name="password" id=""><br>
		<input type="submit" value="התחברות">
	</form>
	<?php
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			//something was posted
			$user_name = $_POST['user_name'];
			$password = $_POST['password'];
	
			if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
			{
	
				//read from database
				$query = "select * from users where user_name = '$user_name' limit 1";
				$result = mysqli_query($con, $query);
	
				if($result)
				{
					if($result && mysqli_num_rows($result) > 0)
					{
	
						$user_data = mysqli_fetch_assoc($result);
						
						if($user_data['password'] === $password)
						{
	
							$_SESSION['user_id'] = $user_data['user_id'];
							header("Location: index.php");
							die;
						}
					}
				}
				
				echo "<p>שם משתמש או סיסמה לא נכונים!</p>";
			}else
			{
				echo "<p>שם משתמש או סיסמה לא נכונים!</p>";
			}
		}
	?>
	<p><a href="/signup.php">להרשמה</a></p>
</body>
</html>