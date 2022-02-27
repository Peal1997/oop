<?php
include_once "./vendor/autoload.php";
use APP\Controller\Student;


$student = new Student;




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Registration</title>
</head>
<body>
    <?php
       if(isset($_POST['add'])){
          $name = $_POST['name'];
          $email = $_POST['email'];
          $cell = $_POST['cell'];
          $edu = $_POST['edu'];
          $gender = $_POST['gender']??'';
      
  /**
   * call funtion from student for inserting value in database
   */
       $student->createNewStudent($name,$email,$cell,$edu,$gender);

    }
    
    ?>
    <div class="user-form w-25 mx-auto my-5">
    <a class ="btn btn-primary" href="index.php">All Student</a>
        <div class="card shadow">
           
            <div class="card-header">
                <h1 class="card-title">All Students</h1>

            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input name ="name" class="form-control" type="text" id="name" value="" >
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input name ="email" class="form-control" type="text" id="email" value="" >
                    </div>
                    <div class="form-group">
                        <label for="cell">Cell</label>
                        <input name ="cell" class="form-control" type="text" id="cell" value="" >
                    </div>
                    
                    <div class="form-group">
                        <label for="">Last certificate</label>
                        <select class ="form-control" name="edu" id="">
                            <option>--Select--</option>
                            <option>HSC</option>
                            <option>SSC</option>
                            <option>JSC</option>
                            <option>PEC</option>
                        </select>
                    </div>
                    <div class="form-group">
                    <label for="">Gender</label></label>
                       <input name="gender" type ="radio" id ="Male" value="Male" > <label for="Male">Male </label>
                       <input name="gender" type ="radio" id ="Female" value="Female" > <label  for="Female">Female </label>
                    </div>
                    <div class="form-group">
                    
                        <input class ="btn btn-primary " name="add" type="submit" value="Add"  >
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="assets/js/bootstrap.bundle.min.js" ></script>
<script src="assets/js/jquery-3.6.0.min.js" ></script>
<script src="assets/js/scripts.js" ></script>

</html>
