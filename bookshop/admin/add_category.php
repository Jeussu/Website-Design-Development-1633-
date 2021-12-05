<?php
require_once 'header.php';
//kiểm tra người dùng đã bấm nút Add chưa
//nếu đã bấm rồi thực thi câu lệnh SQL
//ngược lại skip code PHP và hiển thị form
if (isset($_POST['add'])) {
$name = $_POST['name'];
$sql = "INSERT INTO category (category_name) VALUES ('$name')";
$run = querySQL($sql);
if ($run) { ?>
  <script>
      alert("Add category successfully !");
      window.location.href = "manage_category.php";
  </script>
<?php } else { ?>
   <script>
       alert("Add category failed !");
       window.location.href = "manage_category.php";
   </script>
<?php } } ?>
<center>
    <form style="width: fit-content; margin-top: 30px;" 
          action="add_category.php" method="POST">
        <fieldset>
            <legend>Add Category</legend>
        Category Name: <input  type="text" class = "input_box"name="name" required maxlength="30"> 
        <br><br>
        <input type="submit" class = "black_button" value="Add" name="add">
        </fieldset>
    </form>
</center>