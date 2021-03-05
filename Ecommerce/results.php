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
          <li><a href="#">Laptop</a></li>
          <li><a href="#">Mobile</a></li>
          <li><a href="#">Camera</a></li>
          <li><a href="#">Computer</a></li>
          <li><a href="#">Accessories</a></li>

         </ul>
       
    
    <div id="form">
    <form method="get" action="results.php" enctype="multipart/form-data">
    <input type="text" name="user_query" placeholder="Search a Product"/>
    <input type="submit" name="search" value="search"/>
    <a href="#"><i class="fa fa-search "></i></a>
<!-- search button  <input type="submit" name="search" value="search"/> -->

</form>
</div>

</div>

</nav>

</header>

  
<!-- <div class="main_wrapper">

<div class="header_wrapper"> 
  


<div> </div>

</div>

<div class="content_wrapper">

<div id="sidebar"> this is sidebar </div>

<div id="content_area"> this is content area</div>

</div>

<div> this is footer </div>


 Not working -->


<!-- Not working -->


<!-- 
<section id="home-info">

  
<div id="content-area">
  

  <div id="products_box">

<?php getPro(); ?>

 
</div>

</div>

</section>

 -->



 <div class="main_wrapper">

<div class="header_wrapper"> 

    
<div class="menubar-shopping_cart">
  <span style="float:right; font-size:18px; padding:5px; line-height:40px; ">Welcome Guest! <b style="color:yellow">  Shopping Cart: </b>   Total Items: - Total Price <a href="cart.php" style="color:blue"> Go to Cart </a></span>
</div>

</div>


<div class="content_wrapper">

<div id="sidebar"> 
  
<div id="sidebar_title">Categories</div>

<ul id="cats">
          <!-- <li><a href="#">Laptop</a></li>
          <li><a href="#">Mobile</a></li>
          <li><a href="#">Camera</a></li>
          <li><a href="#">Computer</a></li>
          <li><a href="#">Accessories</a></li> -->

        <?php getCats(); ?>

         </ul>

         <div id="sidebar_title">Brand Wise Search</div>

    <ul id="cats">
          <!-- <li><a href="#">Hp</a></li>
          <li><a href="#">Dell</a></li>
          <li><a href="#">Samsung</a></li>
          <li><a href="#">Apple</a></li>
           -->
<?php getBrands(); ?>


         </ul>

</div>



<div id="content_area"> 

<!-- <div id="shopping_cart">
  
</div> -->

</div>

<?php

if(isset($_GET['search'])){

$search_query = $_GET['user_query'];
$get_pro = "select * from products where Product_Keywords like '%$search_query%'";

$run_pro = mysqli_query($con,$get_pro);

while($row_pro=mysqli_fetch_array($run_pro)){

    
    $pro_id = $row_pro['Product_ID'];
    $pro_cat = $row_pro['Product_Category'];
    $pro_brand = $row_pro['Product_Brand'];
    $pro_title = $row_pro['Product_Title'];
    $pro_price = $row_pro['Product_Price'];
    $pro_image = $row_pro['Product_Image'];
    
    echo "
         
        <div id='single_product'>

        <h3>$pro_title</h3> 
        <img src='Admin_Area/product_images/$pro_image' width='180' height= '180' />   
        <p><b> $ $pro_price </b></p>

        <a href='details.php?pro_id=$pro_id' style='float:left';>Details</a>
        <a href='index.php?pro_id=$pro_id'><button style='float:right'> Add to Cart </button></a>
            </div>
        
    
    ";

}
}

?>

</div>


</div>
</div>



<!-- 
<section id="features">

      <div id="content_area">
  


          <div id="products_box">
  
  
          </div>
  
      </div>
   
</section>   -->




</body>
<!-- 
<br>

</br>

<div class="clr"></div>
<footer id="main-footer">
  <p>idsodossd smsoso</p>
</footer> -->
 

</html>