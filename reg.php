<!DOCTYPE html>
<html lang="en">
<head>
<?php
    session_start();
    include("connection.php");
?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="reg.css">
</head>
<body>
    <form class="form" action="" method="post">
        <table>
            <tr>
                <td><label for="">First name</label></td>
                <td><input type="text" name="firstname" id=""></td>
            </tr>
            <tr>
                <td><label for="">Last Name</label></td>
                <td><input type="text" name="lastname" id=""></td>
            </tr>
            <tr>
                <td><label for="">Email</label></td>
                <td><input type="email" name="email" id=""></td>
            </tr>
            <tr>
                <td><label for="">Mobile Number</label></td>
                <td><input type="text" name="phone" id=""></td>
            </tr>
            <tr>
                <td><label for="">Date of Birth</label></td>
                <td><input type="date" name="dob" id=""></td>
            </tr>
            <tr>
                <td><label for="">Gender</label></td>
                <td>
                <select name="gender" id="">
                    <option value="female">Female</option>
                    <option value="male">Male</option>
                    <option value="other">Other</option>
                </select></td>
            </tr>
            <tr>
                <td><label for="">Choose Username</label></td>
                <td><input type="text" name="username" id=""></td>
            </tr>
            <tr>
                <td><label for="">Create Passsword</label></td>
                <td><input type="text" name="password" id=""></td>
            </tr>
        </table>
        <button type="submit" name="submit" value= "" class="btn btn-outline-dark">Sign Up</button> 
    </form>
    <?php //PHP coding for inserting the record.

        if(isset($_POST['submit']))
        {
            $fName = $_POST['firstname'];
            $lName = $_POST['lastname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $dob = $_POST['dob'];
            $gender = $_POST['gender'];
            $userName = $_POST['username'];
            $password = $_POST['password'];

            if($fName!="" && $lName!="" && $email!="" && $phone!="" && $dob!="" && $gender!="" && $userName!="" && $password!=""){
                $query = "INSERT INTO login VALUES ('$fName','$lName','$email','$phone','$dob','$gender','$userName','$password')";
                $data = mysqli_query($conn, $query);
                if ($data) {
                    ?>
                        <script>alert("You are Welcome")</script>
                    <?php 
                } 
            }
            else
            {
                ?>
                    <script>alert("All fields are Required")</script>
                <?php    
            }
        }
    ?>
</body>
</html>