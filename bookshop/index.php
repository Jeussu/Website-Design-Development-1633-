<!DOCTYPE HTML>
<html>
<head>
  <title>Book Store</title>
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="css/style_home.css?version=3" title="style" />
</head>

<body class = "background">
  <div id="main" class = "background">
    <div id="header" class = "header">
      <div id="logo">
        <div id="logo_text">
          <h1>Book Store</a></h1>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <li><a href="index.php">Home</a></li>
          <li><a href="admin\index.php">Admin</a></li>
        </ul>
      </div>
    </div>
    <div id="site_content" >
      <div class="sidebar">
        <pre><h3>  Category</h3></pre>
        <ul>
           <?php
           include_once ('admin/functions.php');
           $sql = "SELECT * FROM category";
           $result = querySQL($sql);
           while ($cls = mysqli_fetch_array($result)) { ?>
           <li><a href="category_detail.php?CategoryID=<?= $cls['category_id'] ?>"><?= $cls['category_name'] ?></a></li>
           <?php } ?>
        </ul>
      </div>
      <div id="content">
      <?php
      $sql1 = "SELECT * FROM book";
      $rst1 = querySQL($sql1);
      while ($std = mysqli_fetch_array($rst1)) { ?>
        <div class="book_detail">
          <div class="book_image">
            <a href="book_detail.php?BookID=<?= $std['book_id'] ?>">
            <img src='admin\images\books\<?= $std['book_image']?>' width="220px" height="350px"> 
            </a>
          </div> <br>
          <div class="book_info"> 
            <?= $std['book_name'] ?> <br> <br>
          </div>     
        </div>
      <?php } ?>
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      Copyright by FPT Greenwich - 2019
    </div>
  </div>
</body>
</html>
