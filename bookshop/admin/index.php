<?php
require_once 'functions.php';
//start 1 session mới 
session_start();

if (isset($_POST['username'])) {

$username = $_POST['username'];
$password = $_POST['password'];
$token = encryptPassword($password);

$qry = "SELECT * FROM user WHERE username = '$username' AND password = '$token'";

$result = querySQL($qry);

$row = mysqli_fetch_array($result);
if (is_array($row)) {
$_SESSION['username'] = $username; 
} else { ?>
   <script type="text/javascript">
   	  alert("Login failed !");
   	  window.location.href = "index.php"
   </script>
<?php } } 
//check nếu người dùng đã login thì sẽ direct thẳng vào trang home
if (isset($_SESSION['username'])) {
   header("Location: home.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Book Store</title>
	<link rel="stylesheet" type="text/css" href="css\style_admin.css?version=1">
</head>
<body class= "background">
<center>
<br>
<br>
<br>
<br>
<br>
	<form class="frm" action="" method="POST">
		<br> <br> <br> <br> <br> <br>
		<input type="text" class= "admin_index" name="username" placeholder="Username" required=""> <br> <br>
		<input type="password" class= "admin_index "name="password" placeholder="Password" required=""> <br> <br>
		<input type="submit" id="inp_login" value="Login">
	</form>
</center>
</body>
</html>