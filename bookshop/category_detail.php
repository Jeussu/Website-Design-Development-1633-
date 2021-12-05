<!DOCTYPE HTML>
<html>

<head>
  <title>Book Store</title>
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="css/style_home.css?version=2" title="style" />
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <h1>Book store</a></h1>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <li><a href="index.php">Home</a></li>
          <li><a href="admin/index.php">Admin</a></li>
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div class="sidebar">
        <h3>Category</h3>
        <ul>
           <?php
           include_once ('admin/functions.php');
           $sql = "SELECT * FROM category";
           $rst = querySQL($sql);
           while ($cls = mysqli_fetch_array($rst)) { ?>
           <li><a href="category_detail.php?CategoryID=<?= $cls['category_id'] ?>"><?= $cls['category_name'] ?></a></li>
           <?php } ?>
        </ul>
      </div>
      <div class="content">
      <?php
      if (isset($_GET['CategoryID'])) {
      $CategoryID = $_GET['CategoryID'];
      $sql1 = "SELECT * FROM book WHERE book_category = '$CategoryID'";
      $rst1 = querySQL($sql1);
      $sql2 = "SELECT category_name FROM category WHERE category_id = '$CategoryID'";
      $rst2 = querySQL($sql2);
      $ctn = mysqli_fetch_array($rst2);
      $category_name = $ctn[0];
      while ($book = mysqli_fetch_array($rst1)) { ?>
        <div class="book_detail">
          <div class="book_image">
            <a href="book_detail.php?BookID=<?= $book['book_id'] ?>">
            <img src='admin\images\books\<?= $book['book_image']?>' width="220px" height="350px"> 
            </a>
          </div> <br>
          <div class="book_info"> 
            <?= $book['book_name'] ?> <br> <br>
          </div>     
        </div>
      <?php } } 

      ?>
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      Copyright by FPT Greenwich - 2019
    </div>
  </div>
</body>
</html>
