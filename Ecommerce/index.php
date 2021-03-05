<!DOCTYPE html>

<?php 


include("Functions/functions.php");

?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet"
  href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" 
  integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
 
  <link rel="stylesheet" href="style/style.css" media="all" />
  <link rel="stylesheet" media="screen and (max-width: 768px)"href="css/mobile.css">
  <link rel="stylesheet" media="screen and (min-width: 1100px)"href="css/widescreen.css">
  <title>Tech Spark | Electronics</title>
</head>
<body id="home">
  <!---->
<nav id="navbar">
<h1 class="logo">
  <span class="text-primary">
    <i class="fas fa-laptop-code"></i> Tech
  </span>Spark 

</h1>

<ul>
  <li><a class="current" href="index.php">Home</a></li>

  <li><a href="Categories.php">Categories </a> <i class="fas fa-caret-square-down"></i>
  <ul id="cats">

    <?php getCats(); ?>

   <!-- <select onchange="la(this.value)">
    
    <option value="Laptop.php">Laptop</option>
    
    
    </select>

    <script>
    
      function la(src)
      {
        window.location=src;
      }

    </script>
-->
    <!-- <li><a href="#">Laptop</a></li>
      <li><a href="#">Mobile</a></li>
      <li><a href="#">Camera</a></li>
      <li><a href="#">Computer</a></li>
-->



    </ul>
  </li>
  
  
  
  <li>Brands <i class="fas fa-caret-square-down"></i>
  <ul id="cats">
      
    <!--  <li><a href="#">Apple</a></li>
      <li><a href="#">Samsung</a></li>
      <li><a href="#">Hp</a></li>
      <li><a href="#">Dell</a></li>
-->
        <?php getBrands(); ?>
    </ul>
  </li>

  <li><a href="all_products.php">All Products</a></li>
  <li><a href="customer/my_account.php">My Account</a></li>
  <li><a href="#Sign Up">Sign Up</a></li>
  <li><a href="Cart.php">Shopping Cart</a></li> 
  <li><a href="#">Contact Us</a></li>

</ul>

<div id="form">
    <form method="get" action="results.php" enctype="multipart/form-data">
    <input type="text" name="user_query" placeholder="Search a Product"/>
    <input type="submit" name="search" value="Search" />
    <a href="#"><i class="fa fa-search "></i></a>
<!-- search button  <input type="submit" name="search" value="search"/> -->
</div>
</form>
</div>
</nav>

<!-- Header Showcase-->
<header id="showcase">
  <div class="showcase-content">
    <h1 class="l-heading">
      The Sky Is The Limit
    </h1>
    <p class="lead">
      Lorem ipsum dolor sit, amet consectetur adipisicing elit. Temporibus voluptas dolorem non iure necessitatibus. Debitis ab fugit veritatis impedit eveniet natus blanditiis, dignissimos, eos explicabo velit quos libero illum distinctio?
    </p>
    <a href="#what" class="btn">Read More</a>


    <script>
            know = {
                " " : "Robo -> Hello, this is Roboman, I am your Vitual Assistant",
                "hello" : "hi",
                "What brand laptops do you guys have" : "Robo -> We have Samsung, Apple and Dell",
                "how are you?" : "good",
                "okie" : ":)",
                "ok thank you" : "Robo -> Glad i could help, in case of any other query you may come back"
            };
            function talk() {
                var user = document.getElementById("userBox").value;
                document.getElementById("userBox").value = "";
                document.getElementById("chatLog").innerHTML += user+"<br>";
                if (user in know) {
                    document.getElementById("chatLog").innerHTML += know[user]+"<br>";
                } else {
                    document.getElementById("chatLog").innerHTML += "I don't understand...<br>";
                }
            } 
        </script>
        <p id="chatLog">- - C H A T - -<br></p>
        <input id="userBox" type="text" onkeydown="if (event.keyCode == 13) {talk()}">


  </div>


</div>


</header>


<div class="clr"></div>
<footer id="main-footer">
  <p>Hotel BT &copy; 2019, All Rights Reserved </p>
  <p> Email techspark@gmail.com </p>
</footer>



</body>
</html>

