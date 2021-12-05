<?php
require_once 'header.php';

$qry = "SELECT * FROM book";
if (isset($_POST['search'])) {
	$keyword = $_POST['keyword'];
	$qry .= " WHERE book_name LIKE '%$keyword%'";
	$result = querySQL($qry);
   //không tìm thấy kết quả  
   if ($result->num_rows == 0) {  ?>
   <script>
	 alert("The book thate you're finding is not available");
	 window.location.href = "";
   </script> 
   <?php }
}
/*
$qry = "SELECT * FROM book";
if (isset($_POST['search'])) {
	$keyword = $_POST['keyword'];
	$qry .= " WHERE book_name LIKE '%$keyword%'"; 
    $result = querySQL($qry);
   //không tìm thấy kết quả  
   if ($result->num_rows == 0) {  ?>
   <script>
	 alert("Book not found");
	 window.location.href = "";
   </script> 
   <?php } 
}
*/
$result = querySQL($qry);
?>
<center>
<form class="frm123" action="" method="POST">
	<fieldset>
		<legend> Search book </legend>
		<input class = "search" type="text" name= 'keyword' required maxlength="30"
	  	placeholder= "Search for books" > <br> <br>
		<input type="submit" class = "black_button" value="Search" name="search">
	</fieldset>
</form>
<br><br>
<table class="tbl" border="1">
	<tr>
		<th>Name</th>
		<th>Category</th>
		<th>Author</th>
		<th>Image</th>
		<th>Price</th>
		<th>Options</th>
	</tr>
		<?php 
		while($row = mysqli_fetch_array($result)) {
		?>
		<tr>
			<td class = "border-right"><?php echo $row[1]; ?></td>   <!-- Name -->
			<?php 
			$qry1 = "SELECT * FROM category";    
			$result1 = querySQL($qry1);
			while ($row1 = mysqli_fetch_array($result1)) {
				if ($row1["category_id"] == $row["book_category"]) {
					$category = $row1["category_name"];
				}
			}
			?>
			<td class = "border-right"><?= $category ?></td>          <!-- Category-->
			<td class = "border-right"><?= $row['book_author']?></td>
			<td><img src='images\books\<?= $row['book_image']?>' width="75" height="125"></td>  <!-- Image -->
			<td class = "border-left"><?= $row['book_price'] ?></td>          <!-- Price -->
			<td class = "border-left"> 
				<form class="frm_inline" action="update_book.php" method="POST">
					<input type="hidden" name="id" value="<?= $row[0] ?>">
					<input type="submit" class = "black_button_custom"value="Update">
			    </form>
				<form class="frm_inline" action="delete_book.php" method="POST"
				 onsubmit="return confirmDelete();">
					<input type="hidden" name="id" value="<?= $row[0] ?>">
					<br>
					<br>
					<input type="submit" class = "black_button" value="Delete">
			    </form>
			</td>
		</tr>
		<?php } ?>
</table>
</center>
<script>
	function confirmDelete() {
		var del = confirm("Do you want to delete this book ?");
		if (del)
			return true;
		else
			return false;
	}
</script>