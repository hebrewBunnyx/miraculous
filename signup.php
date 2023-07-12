


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>הרשמה</title>
</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Heebo:wght@500&family=Open+Sans:wght@400;500;600;700;800&display=swap');
h2 {
  text-align: center;
  -webkit-text-stroke: 1px black;
}

html, body {
  margin: 0;
  height: 100%;
  direction: rtl;
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
  text-align: center;
}

h1 {
    -webkit-text-stroke: 1px black;
}

* {
  font-family: "Open Sans";
  box-sizing: border-box;
}
/* mine */
a {
    color: white;
    text-decoration: none;
}
/* end mine */
	</style>
<body>

	

	<h2>הרשמה</h2>
	<form action="" method="post" style="text-align:center;">
		שם משתמש: <input type="text" name="user_name" id=""><br>
		סיסמה: <input type="password" name="password" id=""><br>
		<input type="submit" value="הרשמה">
	</form>

	<?php 
	session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{

		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{
			$sql = "SELECT * FROM users WHERE user_name = '$user_name'";
			$result = $con->query($sql);
			if ($result->num_rows == 0){
				//save to database
				$user_id = random_num(20);
				$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

				mysqli_query($con, $query);

				header("Location: login.php");
				die;
			}else{
				echo "<p>שם המשתמש תפוס.</p>";
			}
		}else
		{
			echo "<p>שם המשתמש או סיסמה בלתי אפשריים.</p>";
		}
	}
	?>

	<p><a href="/login.php">להתחברות</a></p>

</body>
</html>