<br>
<h2 style="text-align:center;"> Do you really want to delete your account?</h2>

<form action="" method="post">


<br>

<input type="submit" name="yes" value="Yes, I want" />


<input type="submit" name="no" value="No, I Don't" />



</form>

<?php

include("includes/db.php");

$user = $_SESSION['customer_email'];


if(isset($_POST['yes'])){

    $delete_customer ="delete from customers where customer_email='$user'";


   $run_customer = mysqli_query($con,$delete_customer);
   echo "<script>alert('Account Deleted')</script>";
   echo "<script>window.open('../index.php','_self')</script>";
}

if(isset($_POST['no'])){
    echo "<script>alert('Glad,you are not leaving')</script>";
    echo "<script>window.open('my_account.php','_self')</script>";
   
}

?>