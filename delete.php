<?php
    include("connection.php");
    error_reporting(0);
    $num = $_GET['nm'];       
    $query = "DELETE FROM catagory WHERE Num = '$num'";
    $data = mysqli_query($conn, $query);
        
    if ($data) 
    {
        echo "<script>alert('Record Deleted!')</script>";
        ?>
        <META http-equiv="Refresh" content = "0; URL= http://localhost/phpproject/admin.php">
        <?php
    } 
    else 
    {
        echo "<script>alert('Not Deleted')</script>";
    }        
?>