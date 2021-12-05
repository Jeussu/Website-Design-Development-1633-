<?php
require_once "header.php";   
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $author = $_POST['author'];
    $price = $_POST['price'];
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
    $image = $category . "." . $extension;
    //thiết lập địa chỉ file ảnh cần di chuyển đến
    $img_url = $_SERVER['DOCUMENT_ROOT'] . "/bookshop/admin/images/books/";
    $destination = $img_url . $image;
    //di chuyển file ảnh từ đường dẫn tạm thời đến địa chỉ đã thiết lập
    move_uploaded_file($temp_name, $destination);
}
$sql = "INSERT book (book_name, book_category, book_author, book_price, book_image)
        VALUES ('$name', '$category', '$author', '$price' ,'$image')";
$run = querySQL($sql);
if ($run) { ?>
   <script>
       alert("Add book successfully !");
       window.location.href = "manage_book.php";
   </script>
<?php } }  ?>
<center>
<form style="width: fit-content; margin-top: 30px;" 
      action="" method="POST" enctype="multipart/form-data">
<!-- Lưu ý: bổ sung thuộc tính enctype vào form khi upload file -->
    <fieldset>
    <legend>Add book</legend>
    Name: <input type="text" class = "input_box" name="name" required maxlength="50"> <br> <br>
    Author: <input type="text" class = "input_box" name="author" required maxlength="50"> <br> <br>
    Price: <input type="text" class = "input_box" name="price" required maxlength="6"> <br> <br>
    Category: <br> <br>
    <?php
    $sql = "SELECT * FROM category";
    $run = querySQL($sql); ?>
    <select name="category" class = "black_button">
    <?php
    while ($row = mysqli_fetch_array($run)) { ?>
        <option value='<?= $row['category_id'] ?>'> <?= $row['category_name'] ?> </option>
    <?php } ?>
    </select> 
    <br> <br>
    Image: <input type="file" name="image" required> <br> <br>
    <input type="submit" class = "black_button"value="Add" name="add"> <br> <br>
    
    </fieldset>
</center>
