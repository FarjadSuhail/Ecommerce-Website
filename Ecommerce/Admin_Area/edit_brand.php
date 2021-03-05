<?php

include("includes/db.php");

if(isset($_GET['edit_brand'])){

    $brand_id = $_GET['edit_brand'];

    $get_brand = "select * from brands where Brand_ID = '$brand_id'";

    $run_brand = mysqli_query($con,$get_brand);

    $row_brand = mysqli_fetch_array($run_brand);

    $brand_id = $row_brand['Brand_ID'];
    $brand_title = $row_brand['Brand_Title'];
}

?>


<form action="" method="post" style="padding:80px;">


<b> Update Brand </b>

<input type="text" name="new_brand" value="<?php echo $brand_title;?>"/>
<input type="submit" name="update_brand" value="Update Brand"/>


</form>

<?php


if(isset($_POST['update_brand'])){

$update_id = $brand_id;

$new_brand = $_POST['new_brand'];

$update_brand = "update brands set Brand_Title='$new_brand' where Brand_ID='$update_id'";

$run_update = mysqli_query($con,$update_brand);

if($run_update){
    echo "<script>alert('Brand Updated!')</script>";
    echo "<script>window.open('index.php?view_brands','_self')</script>";
}}
?>