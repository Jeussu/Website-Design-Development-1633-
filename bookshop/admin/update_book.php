<?php 
require_once 'header.php';
$id = $_POST['id'];
$qry = "SELECT * FROM book WHERE book_id = '$id'";
$result = querySQL($qry);
$row = mysqli_fetch_array($result);
$name = $row['book_name'];
$category = $row['book_category'];
$price = $row['book_price'];
$image = $row['book_image'];
$author = $row['book_author'];

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $author = $_POST['author'];
    $image = "";
//đoạn code dùng để upload & xử lý ảnh
//kiểm tra người dùng đã chọn file ảnh có dung lượng khác 0
if (isset($_FILES['image']) && $_FILES['image']['size'] != 0) {	
    //khai báo biến dùng để lưu file ảnh vào đường dẫn tạm thời
    $temp_name = $_FILES['image']['tmp_name'];
    //khai báo biến dùng để lưu tên của ảnh
    $img_name = $_FILES['image']['name'];
    //tách tên file ảnh dựa vào dấu chấm
    $parts = explode(".", $img_name);
    //tìm index cuối cùng
    $lastIndex = count($parts) - 1;
    //lấy ra extension (đuôi) file ảnh
    $extension = $parts[$lastIndex];
    //thiết lập tên mới cho ảnh
    $image = $name . "_" . $category . "." . $extension;
    //thiết lập địa chỉ file ảnh cần di chuyển đến
    $img_url = $_SERVER['DOCUMENT_ROOT'] . "/bookshop/admin/images/books/";
    $destination = $img_url . $image;
    //di chuyển file ảnh từ đường dẫn tạm thời đến địa chỉ đã thiết lập
    move_uploaded_file($temp_name, $destination);
} 
else { //người dùng không update ảnh => lấy lại ảnh cũ
    $image =  $row['book_image'];
}
$query12 = "UPDATE book SET book_name = '$name', book_price = '$price', 
          book_category = '$category', book_image = '$image', book_author = '$author'
          WHERE book_id = '$id'";
$result12 = querySQL($query12);
if ($result12) { ?>
  <script>
      alert("Update successfully !");
      window.location.href = "manage_book.php";
  </script>
<?php } else { ?>
    <script>
      alert("Update failed !");
      window.location.href = "manage_book.php";
  </script>
<?php } } ?>
<center>
<form class="frm123" action="" method="POST" enctype="multipart/form-data">
    <fieldset>
        <legend> Update book </legend>
        Name:  <input type="text" required class = "input_box" maxlength="30" size="35"   
               name="name" value="<?= $name ?>"> <br> <br>    <!-- Name-->
        Category:   
        <?php
        $sql = "SELECT * FROM category";
        $run = querySQL($sql); 
        ?>
        <select name="category" class = "input_box">
        <?php
        while ($row1 = mysqli_fetch_array($run)) { 
            if ($row1['category_id'] == $category) { ?>
                <option value='<?= $category ?>' selected> <?= $row1['category_name'] ?> </option>
            <?php } else { ?>
                <option value='<?= $row1['category_id'] ?>'> <?= $row1['category_name'] ?> </option>
            <?php } } ?>
        </select> 
        <br>
        <br> 
        Price:  <input type="text" required class = "input_box" maxlength="6" size="35" name="price" value="<?= $price ?>">
        <br>
        <br>
        Author:  <input type="text" required class = "input_box" maxlength="50" size="35" name="author" value="<?= $author ?>">
        <br>
        <br>
        Image: <img src='images\books\<?= $image ?>' width= "150" height="250" >
        <br>
        <br>
        <input type="file" name="image"> <br> <br>
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="submit" class = "black_button" value="Update" name="update">
    </fieldset>
</form>
</center>