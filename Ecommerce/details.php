<!DOCTYPE html>
<?php 
include("Functions/functions.php");

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
  href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" 
  integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
 
  <link rel="stylesheet" href="style/style.css" media="all" />
  <link rel="stylesheet" media="screen and (max-width: 768px)"href="css/mobile.css">
  <link rel="stylesheet" media="screen and (min-width: 1100px)"href="css/widescreen.css">
 
    <title>Categories</title>
</head>
<body>
    
<header>
  <nav id="navbar">
    <div class="container">

    <h1 class="logo">
  <span class="text-primary">
    <i class="fas fa-laptop-code"></i> Tech
  </span>Spark 

</h1>
   
        <ul id="cats">
          <li><a href="index.php">Home</a></li>
          <li><a class="current" href="Categories.php">Categories</a></li>
          <li><a href="Laptop.php">Laptop</a></li>
          <li><a href="Mobile.php">Mobile</a></li>
          <li><a href="Cameras.php">Camera</a></li>
          <li><a href="Computer.php">Computer</a></li>
          <li><a href="Accessories.php">Accessories</a></li>

         </ul>
       
    </div>
    
 

</nav>

</header>

  



 <div class="main_wrapper">

<div class="header_wrapper"> 

    
<div class="menubar-shopping_cart">
  <span style="float:right; font-size:18px; padding:5px; line-height:40px; ">Welcome Guest! <b style="color:yellow">  Shopping Cart: </b>   Total Items: - Total Price <a href="cart.php" style="color:blue"> Go to Cart </a></span>
</div>

</div>


<div class="content_wrapper">

<div id="sidebar">  </div>

<div id="content_area"> 


</div>

<div id="products_box">

<?php

if(isset($_GET['pro_id'])){

   $product_id = $_GET['pro_id']; 
$get_pro = "select * from products where Product_ID='$product_id'";

$run_pro = mysqli_query($con,$get_pro);

while($row_pro=mysqli_fetch_array($run_pro)){

    
    $pro_id = $row_pro['Product_ID'];
    $pro_brand = $row_pro['Product_Brand'];
    $pro_title = $row_pro['Product_Title'];
    $pro_price = $row_pro['Product_Price'];
    $pro_image = $row_pro['Product_Image'];
    $pro_desc = $row_pro['Product_Desc'];
    
    
    echo "
         
        <div id='single_product'>

        <h3>$pro_title</h3> 
        <img src='Admin_Area/product_images/$pro_image' width='400' height= '300' />   
        <p><b> $ $pro_price </b></p>
        <p>$pro_desc</p>
        <a href='Categories.php'> Go Back</a>
        <a href='Categories.php?pro_id=$pro_id'><button style='float:right'> Add to Cart </button></a>
            </div>
        
    
    ";
}
}
?>


</div>


</div>


</body>

</html>