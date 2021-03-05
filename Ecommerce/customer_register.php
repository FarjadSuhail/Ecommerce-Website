<!DOCTYPE html>
<?php 
session_start();
include("Functions/functions.php");
include("includes/db.php");
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
  <span style="float:right; font-size:18px; padding:5px; line-height:40px; ">Welcome Guest! <b style="color:yellow">  Shopping Cart: </b>   Total Items: <?php total_items();?>- Total Price: <?php  total_price(); ?> <a href="cart.php" style="color:blue"> Go to Cart </a></span>
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


<form action="customer_register.php" method="post" enctype="multipart/form-data">

<table align="center" width="750">


<tr>

    <td><h2>Create an Account</h2><td>

</tr>


<tr>

    <td align="right">Customer Name<td>
    <td><input type="text" name="c_name" required/></td>
</tr>

<tr>

    <td align="right">Customer Email<td>
    <td><input type="text" name="c_email" required/></td>
</tr>


<tr>

    <td align="right">Customer Password<td>
    <td><input type="password" name="c_pass" required/></td>

</tr>


<tr>

    <td align="right">Customer Country:</td>
    <td><select name="c_country">
    <option>Select a Country</option>
    <option>Pakistan</option>
    <option>United Arab Emirates</option>
    <option>China</option>
    <option>Iran</option>
    <option>India</option>
    <option>United States</option>
    <option>Sri Lanka</option>
</select>
    </td>
</tr>



<tr>

    <td align="right">Customer City<td>
    <td><input type="text" name="c_city" required/></td>

</tr>



<tr>

    <td align="right">Customer Contact<td>
    <td><input type="text" name="c_contact" required/></td>

</tr>



<tr>

    <td align="right">Customer Address<td>
    <td><textarea cols="25" rows="10" name="c_address"></textarea></td>

</tr>


<tr>

    <td align="right">Customer Image<td>
    <td><input type="file" name="c_image"></td>

</tr>


<tr>
    <td><input type="submit" name="register" value="Create Account" /></td>
</tr>

</table>

</form>
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




<?php 

    if(isset($_POST['register'])){

        $ip = getIp();
        
        $c_name = $_POST['c_name'];
        $c_email = $_POST['c_email']; 
        $c_pass = $_POST['c_pass'];
        $c_country = $_POST['c_country'];
        $c_city = $_POST['c_city'];
        $c_contact = $_POST['c_contact'];
        $c_address = $_POST['c_address'];
        $c_image=$_FILES['c_image']['name'];
        $c_image_tmp = $_FILES['c_image']['tmp_name'];
    
        move_uploaded_file($c_image_tmp,"Customer/customer_images/$c_image");

    echo $insert_c = "insert into customers (customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image) values ('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image')";



$run_c = mysqli_query($con, $insert_c);

$sel_cart = "select * from cart where ip_add='$ip'";

$run_cart = mysqli_query($con,$sel_cart);

$check_cart = mysqli_num_rows($run_cart);


if($check_cart==0){
    $_SESSION['customer_email']= $c_email;
    echo "<script>alert('Account has been created successfully')</script>";
    echo "<script>window.open('customer/my_account.php','_self')</script>";
}

else{

    $_SESSION['customer_email']= $c_email;
    echo "<script>alert('Account has been created successfully')</script>";
    echo "<script>window.open('checkout.php','_self')</script>";


}
    }