<?php
require_once 'header.php';
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql1 = "SELECT * FROM book WHERE book_category = '$id'";
    $run1 = querySQL($sql1);
    if ($run1->num_rows > 0) { ?>
        <script>
        alert("Delete category failed !");
        window.location.href = "manage_category.php";
    </script>
    <?php 
    } else {
    $sql2 = "DELETE FROM category WHERE category_id = '$id'";
    $run2 = querySQL($sql2); ?>
        <script>
            alert("Delete category successfully !");
            window.location.href = "manage_category.php";
        </script>
    <?php } 
} 
?>