<?php
include "header.php";
include "menu.php";
$link=mysqli_connect("localhost","varun","varun12");
mysqli_select_db($link,"squareone");
$id=$_GET["id"];
$res=mysqli_query($link,"select * from product where id=$id");
while($row=mysqli_fetch_array($res))
{
	$product_name=$row["product_name"];
	$product_price=$row["product_price"];
	$product_qty=$row["product_qty"];
	$product_image=$row["product_image"];
	$product_category=$row["product_category"];
}
?>
      
        <div class="grid_10">
            <div class="box round first">
                <h2>
                    Edit Product</h2>
                <div class="block">
                   	<form name="form1" action="" method="post" enctype="multipart/form-data">
					<table border="1">
					<tr>
						<td colspan="2" align="center">
						<img src="<?php echo $product_image?>" height="100" width="100"/>
						</td>
					</tr>
					<tr>
					<td>Product Name</td>
					<td><input type="text" name="pnm" value="<?php echo $product_name?>"></td>
					</tr>
					<tr>
					<td>Product Price</td>
					<td><input type="text" name="pprice" value="<?php echo $product_price?>"></td>
					</tr>
					<tr>
					<td>Product Quantity</td>
					<td><input type="text" name="pqty" value="<?php echo $product_qty?>"></td>
					</tr>
					<tr>
					<td>Product Image</td>
					<td><input type="file" name="pimage"></td>
					</tr>
					<tr>
					<td>Product Categoty</td>
					<td>
					<input type="text" name="pcategory" value="<?php echo $product_category?>" />
					</td>
					</tr>
					<tr>
					<td colspan="2" align="center"><input type="submit" name="submit1" value="update"></td>
				</tr>
					
					
					</table>
					
					
					</form>

                </div>
            </div>
			<?php
				if(isset($_POST["submit1"]))
				{
					$fnm=$_FILES["pimage"]["name"];
					if($fnm=="")
					{
mysqli_query($link,"update product set product_name='$_POST[pnm]',product_price='$_POST[pprice]',product_qty='$_POST[pqty]',product_category='$_POST[pcategory]' where id=$id");
					}
					else
					{
					$v1=rand(1111,9999);
   $v2=rand(1111,9999);
   
   $v3=$v1.$v2;
   
   $v3=md5($v3);
   
   
   $fnm=$_FILES["pimage"]["name"];
   $dst="./product_image/".$v3.$fnm;
   $dst1="product_image/".$v3.$fnm;
   move_uploaded_file($_FILES["pimage"]["tmp_name"],$dst);

mysqli_query($link,"update product set product_name='$_POST[pnm]',product_price='$_POST[pprice]',product_qty='$_POST[pqty]',product_image='$dst1',product_category='$_POST[pcategory]' where id=$id");					

					}
					?>
					<script type="text/javascript">window.location="display_item.php"</script>
					<?php
				}
			?>
<?php
include "footer.php";  
  
?>         
     