<?php 

  require '../helpers/db.php';
  require '../helpers/functions.php';
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $key     = Clean($_POST['key']);
    $errors = [];

    # validate name .... 
    if (empty($key)) {
        $errors['SearchKey'] = "Field Required";
    }
    if (count($errors) > 0) {
        // print errors .... 

        foreach ($errors as $key => $value) {
            # code...

            echo '* ' . $key . ' : ' . $value . '<br>';
        }
    } else {
        $sql = "select * from users where name like '%$key%' || email like '%$key%'";
        $data = mysqli_query($con, $sql);
    }
  }
  else
  {

    $sql = "select * from users";
    $data = mysqli_query($con, $sql);

  }

?>



<!DOCTYPE html>
<html>

<head>
    <title>Users CRUD IN PHP</title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <!-- custom css -->
    <style>
        .m-r-1em {
            margin-right: 1em;
        }

        .m-b-1em {
            margin-bottom: 1em;
        }

        .m-l-1em {
            margin-left: 1em;
        }

        .mt0 {
            margin-top: 0;
        }
    </style>

</head>

<body>

    <!-- container -->
    <div class="container">


        <div class="page-header">
            <h1>Read Users </h1>

            <?php
            
            
              if(isset($_SESSION['Message'])){   
               echo $_SESSION['Message'];

               unset($_SESSION['Message']);

              }
            ?>


        </div>

        <a href="create.php" class="btn btn-primary">+ Account</a>
            </br>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" Method="POST">
        <div class="form-group">
                <label for="exampleInputName">Search</label>
                <input type="text" class="form-control" required id="exampleInputName" aria-describedby="" name="key" placeholder="Enter Name">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <table class='table table-hover table-responsive table-bordered'>
            <!-- creating our table heading -->
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                 <th>Image</th>
                <th>action</th>
            </tr>

       <?php 
          
           while($raw = mysqli_fetch_assoc($data)){


       ?>
            <tr>
                   <td><?php echo $raw['id'];?></td>
                   <td><?php echo $raw['name'];?></td>
                   <td><?php echo $raw['email'];?></td>
                   <td> <img src="uploads/<?php echo $raw['image'];?>" alt="userImage"  height="50px" width="50px" > </td>

                <td>
                    <a href='delete.php?id=<?php echo $raw['id'];?>' class='btn btn-danger m-r-1em'>Delete</a>
                    <a href='edit.php?id=<?php echo $raw['id'];?>' class='btn btn-primary m-r-1em'>Edit</a>
                </td>
            </tr>

       <?php } ?>
            <!-- end table -->
        </table>

    </div>
    <!-- end .container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- confirm delete record will be here -->

</body>

</html>