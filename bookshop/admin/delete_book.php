<?php
require_once 'header.php';
$id = $_POST['id'];
$qry = "DELETE FROM book WHERE book_id = '$id'";
$result = querySQL($qry);
if ($result) { ?>
 <script>
     alert ("Delete book successfully !");
     window.location.href = "manage_book.php";
 </script>
<?php } else { ?> 
  <script>
    alert ("Delete book failed !");
    window.location.href = "manage_book.php";
</script>
<?php } ?>