<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Italianno&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>
<body>
    <h1 class="heading">Welcome to the Quiz App</h1>
<?php
    session_start();
    include("connection.php");
?>
<div class=form>
<form action="" method="post">
    <table class = "table"><tr>
            <td><label for="">Username</label></td>
            <td><input type="text" name="username" id=""><br></td>
        </tr>
        <tr>
            <td><label for="">Password</label></td>
            <td><input type="text" name="password" id=""><br></td>
        </tr>
    </table>
    <button type="submit" name="submit" value= "" class="btn btn-outline-dark">Login</button> 
</form>
</div>
<div class="btn2">
<button class="button2">Register Here</button>
</div>
<?php

if(isset($_POST['submit']))
{
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $query = "SELECT * FROM login WHERE username ='$user' && pass = '$pass'";
    $data = mysqli_query($conn, $query);
    $total = mysqli_num_rows($data);
    if($total == 1)
    {   $_SESSION['user_name'] = $user;
        ?>
        <script>alert("You Are Welcome!")</script>
        <?php
        $result = mysqli_fetch_assoc($data);
        if($result['username'] == 'admin')
        {
        
        header('location: admin.php');
        }
        else{
            header('location: user.php');
        }
    }
    else{
        ?>
        <script>alert("Please enter correct credential!")</script>
        <?php
    }
}
?>
</body>
</html>
