<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        session_start();
        error_reporting(0);
        include("connection.php");   
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ($_SESSION['user_name']);?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="user.css">
</head>
<body>
    <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-4">
        <h3><?php echo ("You are welcome ".$_SESSION['user_name']." !");?></h3><hr>
    
    </div>
    <div class="col-lg-8 col-md-8 col-sm-8">
         <a href="logout.php"><button type="button" class="btn btn-outline-dark">Logout</button></a>
        <hr class="line">
    </div>
    
    </div>
    </div>
</body>
</html>