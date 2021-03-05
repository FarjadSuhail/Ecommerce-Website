<?php

session_start();

if(!isset($_SESSION['user_email'])){
    echo "<script>window.open('login.php?not_admin=For Admins Only!','_self')</script>";
}

else{



?>

<!DOCTYPE>

<html>

    <head>
        <title> This is Admin Panel </title>

        <link rel="stylesheet" href="styles/style.css" media="all"/>
    </head>


</body>

    <div class="main_wrapper">

        <div id="header"></div>
        <div id="right">
        <h2 style="text-align:center;">Manage Content</h2>
        
            <a href="index.php?insert_product">Insert New Product</a>
            
            <a href="index.php?view_product">View All Product</a>
            
            <a href="index.php?insert_cats">Insert New Categories</a>
            
            <a href="index.php?view_cats">View All Categories</a>
            
            <a href="index.php?insert_brand">Insert New Brand</a>
            
            <a href="index.php?view_brands">View All Brands</a>
            
            <a href="index.php?view_customers">View Customers</a>
            
            <a href="logout.php">Admin Logout</a>
        
        </div>
        <div id="left">
        <br><br>
        <h2 style="color:orange; text-align:center;"><?php echo @$_GET['logged_in']; ?></h2>
        <?php

        if(isset($_GET['insert_product'])){
            include("insert_product.php");
        }


        if(isset($_GET['view_product'])){
            include("view_products.php");
        }

        
        if(isset($_GET['edit_pro'])){
            include("edit_pro.php");
        }

        
        if(isset($_GET['insert_cats'])){
            include("insert_cat.php");
        }

        if(isset($_GET['view_cats'])){
            include("view_cats.php");
        }

        if(isset($_GET['edit_cat'])){
            include("edit_cats.php");
        }

        if(isset($_GET['insert_brand'])){
            include("insert_brand.php");
        }

        if(isset($_GET['view_brands'])){
            include("view_brands.php");
        }


        if(isset($_GET['edit_brand'])){
            include("edit_brand.php");
        }


        
        if(isset($_GET['view_customers'])){
            include("view_customer.php");
        }

        ?>
        
        
        </div>
        


    </div>
    </body>
    </html>

    <?php } ?>