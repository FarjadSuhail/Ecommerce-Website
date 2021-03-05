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
          <li><a href="../index.php">Home</a></li>
          <li><a href="../all_products.php">All Products</a></li>
          <li><a href="my_account.php">My Account</a></li>
          
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


  echo "<b> Welcome : </b>" . $_SESSION['customer_email'];
}




  ?>
    
  
  
  

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
  
<div id="sidebar_title">My Account</div>

<ul id="cats">

<?php 

$user = $_SESSION['customer_email'];

$get_img = "select * from customers where customer_email='$user'";

$run_img = mysqli_query($con,$get_img);
$row_img = mysqli_fetch_array($run_img);
$c_image = $row_img['customer_image'];


echo "<img src='customer_images/$c_image' width='150' height='150'/>";

$c_name = $row_img['customer_name']; 

?>

           <li><a href="my_account.php?my_orders">My Orders</a></li>
           <li><a href="my_account.php?edit_account">Edit Account</a></li>
           <li><a href="my_account.php?change_pass">Change Password</a></li>
           <li><a href="my_account.php?delete_account">Delete Account</a></li>
           <li><a href="logout.php">Logout</a></li>
  

         </ul>

</div> 


<div id="content_area"> 

<?php cart();  ?>

<!-- <div id="shopping_cart">
  
</div> -->


</div>

<?php echo $ip= getIp();  ?>


<?php

if(!isset($_GET['my_orders'])){

  if(!isset($_GET['edit_account'])){

    if(!isset($_GET['change_pass'])){

      if(!isset($_GET['delete_account'])){



echo "<h2 align='center'> Welcome: $c_name </h2>";
echo "<b>You can see your orders progress by clicking on the <a href='my_account.php?my_orders'>Link</a></b>";
 }
}
}
}
?>

<?php


if(isset($_GET['edit_account'])){

  include("edit_account.php");

}



if(isset($_GET['change_pass'])){

  include("change_pass.php");

}


if(isset($_GET['delete_account'])){

  include("delete_account.php");

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