<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="admin.css">
</head>
<body>

    <?php
        include("connection.php");
        error_reporting(0);
    ?>


    <div class="sidepanel">
        <h1>Admin</h1><hr>
        
        <button class="w3-button w3-block w3-teal"><a href="admin.php"><h6>Add and Edit Quiz</h6></a></button><hr>
        <button><a href="question.php"><h6>Add/Edit Quiz Questions</h6></a></button><hr>
        <button><a href=""><h6>View All Results</h6></a></button><hr>
        <button><a href="logout.php"><h6>Logout</h6></a></button><hr>
    </div>
    <div class="logoutbtn">
         <a href="logout.php"><button type="button" class="btn btn-outline-danger" >Logout</button></a>
    </div>
    <div class="modal fade" id="addQuiz" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Quiz Catagory</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form action="" method="GET">
            <label for="">Add Quiz</label><br><br>
            <label for="">Serial Number</label><br>
            <input type="text" name="snum" id="" value=""><br><br>
            <label for="">Quiz Catagory</label><br>
            <input type="text" name="catagory" value = ""><br><br>
            <label for="">Time (in minutes)</label><br>
            <input type="text" name="duration" value = ""><br><br>
            <button type="submit" name ="submit" class="btn btn-outline-success" value = "submit">Add Item</button>
        </form>

      </div>
    </div>
  </div>
</div>
    <div class="addQuiz">
         <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#addQuiz">Add Quiz Catagory</button>
    </div>
    
    <?php //PHP coding for inserting the record.
        if($_GET['submit'])
        {
            $num = $_GET['snum'];
            $catag = $_GET['catagory'];
            $dur = $_GET['duration'];

            if($num!="" && $catag!="" && $dur!=""){
                $query = "INSERT INTO catagory VALUES ('$num','$catag','$dur')";
                $data = mysqli_query($conn, $query);
                if ($data) {
                    ?>
                    <script>alert("Catagory Added")</script>
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
        
    </div>
    <div class="addedcat">

        <?php  //To display the record added in the database.
        $query = "SELECT * FROM catagory";
        $data = mysqli_query($conn, $query);
        $total = mysqli_num_rows($data);
        if($total != 0)
        {
        ?>
        <table>
            <tr>
                <th>#</th>
                <th>Quiz Name</th>
                <th>Quiz Duration</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>

        <?php
        while($result = mysqli_fetch_assoc($data))
            {   
            echo "<tr>
                    <td>".$result['Num']."</td>
                    <td>".$result['Catagory']."</td>
                    <td>".$result['Duration']."</td>
                    <td>
                        <div class='editQuiz'>
                        <button type='button' class='btn btn-outline-success' data-toggle='modal' data-target='#editQuiz'>Edit</button>
                        </div>
                    </td>
                    <td><a href = 'delete.php?nm=$result[Num]' onclick=' return deletealert()' >Delete</a></td>
                </tr>";

            }
            $result--;
        }
        else    {
            echo "No record found";
        }
        ?>

        <?php
            // Edit Functionality
            $num = $_GET['nm'];
            $catag= $_GET['ct'];
            $dur= $_GET['dr'];      
        ?>
        <div class="modal fade" id="editQuiz" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Quiz Catagory</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
      </div>
      <div class="modal-body">

      <form action="" method="GET">
            <label for="">Update Quiz</label><br><br>
            <label for="">Serial Number</label><br>
            <input type="text" name="num" id="" value="<?php echo $num ?>" ><br><br>
            <label for="">Quiz Catagory</label><br>
            <input type="text" name="cat" value ="<?php echo $catag ?>" ><br><br>
            <label for="">Time (in minutes)</label><br>
            <input type="text" name="dur" value = "<?php echo $dur ?>" ><br><br>
            <button type="submit" name="submit" class="btn btn-outline-success" value = "submit">Update Item</button>
        </form>     
        <?php

if($_GET['submit'])
{   
    $num = $_GET['num'];
    $catag = $_GET['cat'];
    $dur = $_GET['dur'];
    
    $query = "UPDATE catagory SET Catagory = '$catag', Duration = '$dur' WHERE Num = '$num' ";
    $data = mysqli_query($conn, $query);
    if ($data) 
    {
        echo "<script>alert('Successfully updated!')</script>";
        ?>
        <META HTTP-EQUIV="Refresh" CONTENT = "0; URL= http://localhost/phpproject/admin.php">
        <?php
    } 
    else
    {
        echo "<script>alert('Not Updated')</script>";
    } 
}
else
{
    echo ("Please click to update");
}     
?>
      </div>
    </div>
  </div>
</div>
    
    

        <script>   // Script for alert before delete.
            function deletealert()
            {
                return confirm("Are you sure you want to delete this record?")
            }
        </script>
        </table>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  
</body>
</html>