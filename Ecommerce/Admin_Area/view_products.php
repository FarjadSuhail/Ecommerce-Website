<table width="795" align="center" bgcolor="grey"

<tr align= "center">
    <td colspan="6"><h2>View All Products Here</h2></td>
</tr>

<tr align="center" bgcolor="lightgrey" border="2">

    <th>S.N</th>
    <th>Title</th>
    <th>Image</th>
    <th>Price</th>
    <th>Edit</th>
    <th>Delete</th>

</tr>

<?php
include("includes/db.php");
$get_pro = "select * from products";

$run_pro = mysqli_query($con,$get_pro);

$i=0;

while($row_pro=mysqli_fetch_array($run_pro)){

$pro_id = $row_pro['Product_ID'];
$pro_title= $row_pro['Product_Title'];
$pro_image= $row_pro['Product_Image'];
$pro_price= $row_pro['Product_Price'];
$i++;



?>

<tr align="center">

<td><?php echo $i;?></td>
<td><?php echo $pro_title;?></td>
<td><img src="product_images/<?php echo $pro_image;?> "width="60" height="60"/></td>
<td><?php echo $pro_price;?></td>
<td><a href="index.php?edit_pro=<?php echo $pro_id; ?>">Edit</a></td>
<td><a href="delete_pro.php?delete_pro=<?php echo $pro_id; ?>">Delete</a></td>


</tr>
<?php 

    }

?>


</table>