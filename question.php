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
    <title>Add Question</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="user.css">
</head>
<body>
    <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-4">
        <h1>Admin</h1><hr>
        <a href="admin.php"><h6>Add and Edit Quiz</h6></a>
        <a href="question.php"><h6>Add/Edit Quiz Questions</h6></a>
        <h6>View All Results</h6>
        <a href="login.php"><h6>Logout</h6></a>
    </div>
    <div class="col-lg-8 col-md-8 col-sm-8">
         <a href="logout.php"><button type="button" class="btn btn-outline-dark">Logout</button></a>
        <hr class="line">
    </div>
    
    </div>
    </div>
</body>
</html>