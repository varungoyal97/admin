<?php
$link=mysqli_connect("localhost","varun","varun12");
mysqli_select_db($link,"squareone");
$id=$_GET["id"];
$res=mysqli_query($link,"select * from product where id=$id");
while($row=mysqli_fetch_array($res))
{
	$img=$row["product_image"];
}
unlink($img);
mysqli_query($link,"delete from product where id=$id");
?>
<script type="text/javascript">
window.location="display_item.php";
</script>