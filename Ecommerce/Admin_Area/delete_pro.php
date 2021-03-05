<?php
    include("includes/db.php");
    if(isset($_GET['delete_pro'])){
        $delete_id = $_GET['delete_pro'];

        $delete_pro = "delete from products where Product_ID= '$delete_id'";
        $run_delete = mysqli_query($con, $delete_pro);
    
    
    if($run_delete){

        echo "<script>alert('A Product has been Deleted!')</script>";
        echo "<script>window.open('index.php?view_product','_self')</script>";
    }
    
}


?>