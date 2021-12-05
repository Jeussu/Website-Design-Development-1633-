<?php
require_once 'functions.php';
//require_once 'restricted.php';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
	<title>Book Store</title>
	<link rel="stylesheet" type="text/css" href="css\style_admin.css?version=5">
  <meta charset="utf-8">
</head>
<body class = "background">
<ul>
  <li><a href="home.php">Home</a></li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Book</a>
    <div class="dropdown-content">
      <a href="manage_book.php">Manage book</a>
      <a href="add_book.php">Add book</a>
    </div>
  </li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Category</a>
    <div class="dropdown-content">
      <a href="manage_category.php">Manage category</a>
      <a href="add_category.php">Add category</a>
    </div>
  </li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">User</a>
    <div class="dropdown-content">
      <a href="manage_user.php">Manage user</a>
      <a href="add_user.php">Add user</a>
    </div>
  </li>
  <li><a onclick="about();">About</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
<script type="text/javascript">
  function about() {
    alert("Copyright by FPT Greenwich !");
  }
</script>
</body>
</html>