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
  
  
   <b style="color:yellow">  Shopping Cart: </b>   Total Items: <?php total_items();?>- Total Price: <?php  total_price(); ?> <a href="Categories.php" style="color:orange"> Back to Shop </a>
  
  
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

<br>
<form action="" method="post" enctype="multipart/form-data">
<table align="center" width="700" bgcolor="grey">

<tr align="center">
    <th>Remove</th>
    <th>Product(S)</th>
    <th>Total Price</th>

</tr>

<?php


global $con;
$total = 0;

$ip = getIp();
$select_price = "select * from cart where ip_add = '$ip'";

$run_price = mysqli_query($con, $select_price);

while($p_price = mysqli_fetch_array($run_price)){

    $pro_id = $p_price['p_id'];
    $pro_price = "select * from products where Product_ID='$pro_id'";

    $run_pro_price = mysqli_query($con,$pro_price);

    while($pp_price = mysqli_fetch_array($run_pro_price)){

    $product_price = array($pp_price['Product_Price']);            
    
    $product_title = $pp_price['Product_Title'];

    $product_image = $pp_price['Product_Image'];

    $single_price = $pp_price['Product_Price'];


    $values = array_sum($product_price);

    $total +=$values;
    //$total = $total + ($p_price['Product_Price']* $value['quantity']);





?>

<tr align="center">
    <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"/></td>
    <td><?php echo $product_title; ?><br>
    <img src="Admin_Area/product_images/<?php echo $product_image; ?>" width="60" height="60"/>
    </td>


    <?php

        

        if(isset($_POST['update_cart'])){

        //    $qty = $_POST['qty'];

          //  $update_qty = "update cart set qty = '$qty'";

            //$run_qty = mysqli_query($con,$update_qty);

            //$_SESSION['qty'] = $qty;

            //$total = $total  + ($single_price  * $qty);
           
        }

    
    ?>


    <td><?php echo "$" . $single_price; ?></td>
</tr>


    <?php }} ?>

    <tr align="right">

        <td colspan="4"><b>Sub Total:</b></td>
        <td><?php echo "$" . $total; ?></td>
</tr>


<tr align="center">

<td colspan="2"><input type="submit" name="update_cart" value="Update Cart"  /></td>


</tr>



<tr align="center">

<td colspan="2"><input type="submit" name="remove_cart" value="Remove from Cart"  /></td>


</tr>


<tr align="center">


<td colspan="2"><input type="submit" name="continue" value="Continue Shopping"  /></td>
<td><button><a href="checkout.php" style="text-decoration:none; color:black;">Checkout</a></button></td>


</tr>




</table>
</form>


<?php 

//function updatecart(){

 //global $con;
$ip = getIp();

    if(isset($_POST['remove_cart'])){

        foreach($_POST['remove'] as $remove_id){

            $delete_product = "delete from cart where p_id='$remove_id' AND ip_add='$ip'";

            $run_delete = mysqli_query($con, $delete_product);

            if($run_delete){
                echo "<script>window.open('cart.php','_self')</script>";
            }

        }


        
    }


if(isset($_POST['continue']))
{
    echo "<script>window.open('Categories.php','_self')</script>";
}





//echo @$up_cart = updatecart();


//}
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