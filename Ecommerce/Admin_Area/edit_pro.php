<!DOCTYPE html>

<?php 
include("includes/db.php");

if(isset($_GET['edit_pro'])){

    $get_id= $_GET['edit_pro'];

    $get_pro = "select * from products where Product_ID='$get_id'";

$run_pro = mysqli_query($con,$get_pro);

$i=0;

$row_pro=mysqli_fetch_array($run_pro);

$pro_id = $row_pro['Product_ID'];
$pro_title= $row_pro['Product_Title'];
$pro_image= $row_pro['Product_Image'];
$pro_price= $row_pro['Product_Price'];
$pro_desc = $row_pro['Product_Desc'];
$pro_keywords = $row_pro['Product_Keywords'];
$pro_cat = $row_pro['Product_Category'];
$pro_brand = $row_pro['Product_Brand'];


$get_cat = "select * from categories where Categories_ID ='$pro_cat'";

$run_cat = mysqli_query($con, $get_cat);

$row_cat = mysqli_fetch_array($run_cat);

$category_title = $row_cat['Categories_Title'];



$get_brand = "select * from brands where Brand_ID='$pro_brand'";

$run_brand = mysqli_query($con, $get_brand);

$row_brand = mysqli_fetch_array($run_brand);

$brand_title = $row_brand['Brand_Title'];


}



?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Products</title>

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea'});</script>

</head>
<body bgcolor="skyblue">
    

<form action="" method="post" enctype="multipart/form-data">

<table align="center" width="750" border="2" bgcolor="orange">

<tr align="center">

<td colspan="8"><h2>Edit & Update Product Here</h2></td>

</tr>


<tr>

    <td>Product Title</td>
    <td><input type="text" name="product_title" size="60" value="<?php echo $pro_title;?>">
    </td>
</tr>

<tr>

    <td>Product Category</td>
    <td>
    <select name="product_cat" required>
        <option><?php echo $category_title; ?></option>
        <?php

$get_cats = "select * from categories";

$run_cats = mysqli_query($con,$get_cats);

while($row_cats = mysqli_fetch_array($run_cats)){

    $cat_id = $row_cats['Categories_ID'];
    
    $cat_title = $row_cats['Categories_Title'];

    
echo "<option value='$cat_id'> $cat_title</option>";

}

        ?>
    
    </select>
    </td>
</tr>

<tr>

    <td>Product Brand</td>
    <td>
    
    <select name="product_brand" required>
        <option> <?php echo $brand_title; ?></option>
        <?php

$get_brands = "select * from brands";

$run_brands = mysqli_query($con,$get_brands);

while($row_brands = mysqli_fetch_array($run_brands)){

    $brand_id = $row_brands['Brand_ID'];
    
    $brand_title = $row_brands['Brand_Title'];

    
echo "<option value='$brand_id'> $brand_title</option>";

}

        ?>
    
    </select>
    


    </td>
</tr>

<tr>

    <td>Product Image</td>
    <td><input type="file" name="product_image"  width="60" height = "60"><<img src="product_images/<?php echo $pro_image; ?>">
    </td>
</tr>

<tr>

    <td>Product Price</td>
    <td><input type="text" name="product_price" value="<?php echo $pro_price;?>">
    </td>
</tr>

<tr>

    <td>Product Description</td>
    <td><textarea name="product_desc" cols="40" rows="10"> <?php echo $pro_desc;?></textarea>
    </td>
</tr>

<tr>

    <td>Product Keywords</td>
    <td><input type="text" name="product_keywords" size="60" value="<?php echo $pro_keywords;?>">
    </td>
</tr>


<tr align="center">

    <td colspan="8">
    <input type="submit" name="update_product" value="Update Product">
    </td>
</tr>


</table>

</form>
</body>
</html>




<!-- php for insertion -->

<?php


if(isset($_POST['update_product']))
{
    
    $update_id = $pro_id;
    
    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $product_brand = $_POST['product_brand'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];
    $product_keywords = $_POST['product_keywords'];
    
   
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp = $_FILES['product_image']['tmp_name'];

    move_uploaded_file($product_image_tmp,"product_images/$product_image");


    $update_product = "update products set Product_Category='$product_cat',Product_Brand='$product_brand',Product_Title='$product_title',Product_Price='$product_price',Product_Desc='$product_desc',Product_Image='$product_image',Product_Keywords='$product_keywords' where Product_ID = '$update_id'";

    $run_product = mysqli_query($con,$update_product);

    if($run_product)
    {
        echo "<script>alert('Product Updated Successfully!')</script>";
        echo "<script>window.open('index.php?view_products',_self)</script>";
    }

}

?>


