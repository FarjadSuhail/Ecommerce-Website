<!DOCTYPE html>
<?php 
session_start();
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
  <span style="float:right; font-size:18px; padding:5px; line-height:40px; ">
  
  <?php

if(isset($_SESSION['customer_email'])){


  echo "<b> Welcome : </b>" . $_SESSION['customer_email'] . "<b style='color:yellow;'> Your</b>";
}

else {

  echo "<b>Welcome Guest! </b>";
}


  ?>
    
  
   <b style="color:yellow">  Shopping Cart: </b>   Total Items: <?php total_items();?>- Total Price: <?php  total_price(); ?> <a href="cart.php" style="color:blue"> Go to Cart </a>
  
  

  <?php
    if(!isset($_SESSION['customer_email'])){

      echo "<a href='checkout.php'> Login </a>";
    }

    else{
      echo "<a href='logout.php'> Logout </a>";
    }
  
    ?>

  </span>
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

<?php cart();  ?>

<!-- <div id="shopping_cart">
  
</div> -->


</div>

<?php echo $ip= getIp();  ?>


<?php getPro(); ?>
<?php getCatPro(); ?>
<?php getBrandPro(); ?>
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