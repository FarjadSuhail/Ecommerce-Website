<?php

$con = mysqli_connect("localhost","root","","ecommerce");


if (mysqli_connect_errno())
{
    echo "Failed to connect to MYSQL: " .mysqli_connect_error(); 
}

function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}

function cart(){

    if(isset($_GET['add_cart'])){

        global $con;

        $ip = getIp();
        $pro_id = $_GET['add_cart'];

        $check_pro="select * from cart where ip_add='$ip' AND p_id = '$pro_id'";


        $run_check = mysqli_query($con,$check_pro);

//        if(mysqli_nums_rows($run_check)>0){

  ///          echo "";
     //   }

       // else {
        {  
        $insert_pro = "insert into cart (p_id,ip_add) values ('$pro_id','$ip')";
            
            $run_pro = mysqli_query($con,$insert_pro);
            echo "<script>window.open('Categories.php','_self')</script>";

        }
        
        
        

    }


}

// getting total added items

function total_items(){


    if(isset($_GET['add_cart'])){

        global $con;
        $ip = getIp();

        $get_items = "select * from cart where ip_add='$ip'";
        $run_items = mysqli_query($con,$get_items);

        $count_items= mysqli_num_rows($run_items);
    }
        else{
            global $con;
        
            $ip = getIp();

        $get_items = "select * from cart where ip_add='$ip'";
        $run_items = mysqli_query($con,$get_items);

        $count_items= mysqli_num_rows($run_items);


        }

    echo $count_items;

    
}

//getting total price of items in cart

function total_price(){

    
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
        
        $values = array_sum($product_price);

        $total +=$values;

        }
    }

    echo "$" . $total;
}



// getting the categories

function getCats(){


    global $con;

    $get_cats = "select * from categories";

    $run_cats = mysqli_query($con,$get_cats);

    while($row_cats = mysqli_fetch_array($run_cats)){
   
        $cat_id = $row_cats['Categories_ID'];
        
        $cat_title = $row_cats['Categories_Title'];
   
        
    echo "<li><a href='Categories.php?cat=$cat_id'> $cat_title</a></li>";

    }
}


// getting brands

function getBrands(){


    global $con;

    $get_brands = "select * from Brands";

    $run_brands = mysqli_query($con,$get_brands);

    while($row_brands = mysqli_fetch_array($run_brands)){
   
        $brand_id = $row_brands['Brand_ID'];
        
        $brand_title = $row_brands['Brand_Title'];
   
        
    echo "<li><a href='Categories.php?brand=$brand_id'> $brand_title</a></li>";
    
    }
}




function getPro(){

    if(!isset($_GET['cat'])){

        if(!isset($_GET['brand'])){

    global $con;

    $get_pro = "select * from products order by RAND() LIMIT 0,6";

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
            <p><b> Price:  $ $pro_price </b></p>

            <a href='details.php?pro_id=$pro_id' style='float:left';>Details</a>
            <a href='Categories.php?add_cart=$pro_id'><button style='float:right'> Add to Cart </button></a>
                </div>
            
        
        ";

    }

        }
    }
}



//

function getBrandPro(){


        if(isset($_GET['brand'])){

            $brand_id = $_GET['brand'];


    global $con;



    $get_brand_pro = "select * from products where Product_Brand=$brand_id";
   
    $run_brand_pro = mysqli_query($con,$get_brand_pro) or die(mysqli_error($con));

    $count_brands = mysqli_num_rows($run_brand_pro); 

    if($count_brands==0){
        echo "<h2>No products of this brand</h2>";
    }
    while($row_brand_pro=mysqli_fetch_array($run_brand_pro)){

        
        $pro_id = $row_brand_pro['Product_ID'];
        $pro_cat = $row_brand_pro['Product_Title'];
        $pro_brand = $row_brand_pro['Product_Brand'];
        $pro_title = $row_brand_pro['Product_Title'];
        $pro_price = $row_brand_pro['Product_Price'];
        $pro_image = $row_brand_pro['Product_Image'];
        
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
}



//

function getCatPro(){

    if(isset($_GET['cat'])){

    $cat_id = $_GET['cat'];

    global $con;

    $get_cat_pro = "select * from products where Product_Category=$cat_id";

    $run_cat_pro = mysqli_query($con,$get_cat_pro) or die(mysqli_error($con));


    $count_cats = mysqli_num_rows($run_cat_pro); 

    if($count_cats==0){
        echo "<h2>No products of this Category</h2>";
    }


    while($row_cat_pro=mysqli_fetch_array($run_cat_pro)){

        
        $pro_id = $row_cat_pro['Product_ID'];
        $pro_cat = $row_cat_pro['Product_Category'];
        $pro_brand = $row_cat_pro['Product_Brand'];
        $pro_title = $row_cat_pro['Product_Title'];
        $pro_price = $row_cat_pro['Product_Price'];
        $pro_image = $row_cat_pro['Product_Image'];
        
        
        

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
}


