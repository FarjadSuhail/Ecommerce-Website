<!DOCTYPE html>

<?php 
include("includes/db.php");

//session_start();

//if(!isset($_SESSION['user_email'])){
  //  echo "<script>window.open('login.php?not_admin=For Admins Only!','_self')</script>";
//}

//else{


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products</title>

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea'});</script>

</head>
<body bgcolor="skyblue">
    

<form action="insert_product.php" method="post" enctype="multipart/form-data">

<table align="center" width="750" border="2" bgcolor="orange">

<tr align="center">

<td colspan="8"><h2>Insert New Post Here</h2></td>

</tr>


<tr>

    <td>Product Title</td>
    <td><input type="text" name="product_title" size="60" required>
    </td>
</tr>

<tr>

    <td>Product Category</td>
    <td>
    <select name="product_cat" required>
        <option> Select a Category</option>
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
        <option> Select a Brand</option>
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
    <td><input type="file" name="product_image" required>
    </td>
</tr>

<tr>

    <td>Product Price</td>
    <td><input type="text" name="product_price" required>
    </td>
</tr>

<tr>

    <td>Product Description</td>
    <td><textarea name="product_desc" cols="40" rows="10"></textarea>
    </td>
</tr>

<tr>

    <td>Product Keywords</td>
    <td><input type="text" name="product_keywords" size="60">
    </td>
</tr>


<tr align="center">

    <td colspan="8">
    <input type="submit" name="insert_post" value="Insert">
    </td>
</tr>


</table>

</form>
</body>
</html>




<!-- php for insertion -->

<?php


if(isset($_POST['insert_post']))
{
    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $product_brand = $_POST['product_brand'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];
    $product_keywords = $_POST['product_keywords'];
    
   
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp = $_FILES['product_image']['tmp_name'];

    move_uploaded_file($product_image_tmp,"product_images/$product_image");


    $insert_product = "insert into products (Product_Category,Product_Brand,Product_Title,Product_Price,Product_Desc,Product_Image,Product_Keywords) values ('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords')";

    $insert_pro = mysqli_query($con,$insert_product);

    if($insert_pro)
    {
        echo "<script>alert('Product Inserted Successfully!')</script>";
        echo "<script>window.open('index.php?insert_product',_self)</script>";
    }

}

?>


