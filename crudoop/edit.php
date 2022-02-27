<?php
include_once "./vendor/autoload.php";
use APP\Controller\Student;
$stu =  new Student;

 $edit_id = $_GET['edit_id'] ?? false;
if($edit_id){
   /**
    * call editData funtion from student
    */
    $edit_user_data = $stu->editData($edit_id)->fetch_object() ;

    if($edit_user_data -> name == ''){
        header('location:index.php');
    }



}else{
    header('location:index.php');
}


if(isset($_POST['submit'])){
      $name = $_POST['name'];
      $email= $_POST['email'];
      $cell = $_POST['cell'];
      $edu = $_POST['edu'];
      $gender = $_POST['gender'] ?? '';
      
     // $file_name = photoupload($_FILES['photo'],'photos/');

      $updated_at_time = date('Y-m-d H:i:s');

    /**
    * call updateData funtion from student
    */
    $stu->updateData($name ,$email,$cell,$edu,$gender,$edit_id);
    /**
    * call editData funtion from student
    */
    $edit_user_data = $stu->editData($edit_id)->fetch_object() ;

     
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $edit_user_data -> name; ?></title>
   <link rel="stylesheet" href="assets/css/style.css">
   <link rel="stylesheet" href="assets/css/bootstrap.min.css">
   

</head>
<body>
    
    <div class="user-form w-25 mx-auto my-5">
    <a class="btn btn-primary" href="./index.php" >All teachers</a>
        <div class="card shadow ">
       
            <div class="card-header">
                <h2 calss ="card-title">update <?php echo $edit_user_data -> name; ?>'s data</h2>
            </div>
            <div class="card-body">
            <?php  echo $msg ?? ''  ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class = "form-label" for="name">Name </label>
                        <input name="name" type ="text" id ="name" value="<?php echo $edit_user_data -> name; ?>" class="form-control">
                    </div>
                   
                    <div class="form-group">
                        <label class = "form-label" for="email">Email </label>
                        <input name="email" type ="text" id ="email" value="<?php echo $edit_user_data -> email; ?>" class="form-control">
                        <?php echo $email_chk ?? '' ?>
                    </div>
                    <div class="form-group">
                        <label class = "form-label" for="cell">Cell </label>
                        <input name="cell" type ="text" id ="cell" value="<?php echo $edit_user_data -> cell; ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Last certificate</label>
                        <select class ="form-control" name="edu" id="">
                            <option <?php echo $edit_user_data -> education == '' ? 'selected' : ''; ?> >--Select--</option>
                            <option <?php echo $edit_user_data -> education == 'HSC' ? 'selected' : ''; ?> >HSC</option>
                            <option <?php echo $edit_user_data -> education == 'SSC' ? 'selected' : ''; ?> >SSC</option>
                            <option <?php echo $edit_user_data -> education == 'JSC' ? 'selected' : ''; ?> >JSC</option>
                            <option <?php echo $edit_user_data -> education == 'PEC' ? 'selected' : ''; ?> >PEC</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for ="">Gender</label>
                       <input <?php echo $edit_user_data -> gender == 'Male' ? 'checked' : ''; ?>  name="gender" type ="radio" id ="Male" value="Male" > <label for="Male">Male </label>
                       <input <?php echo $edit_user_data -> gender == 'Female' ? 'checked' : ''; ?> name="gender" type ="radio" id ="Female" value="Female"> <label  for="Female">Female </label>
                    </div>
                  
                    <br>
                   
                    <div class="form-group">
                       <input class ="btn btn-primary" name="submit" type ="submit" value="Update now" > 
                       
                    </div>
                </form>
            </div>
        </div>

    </div>
    
</body>
<!-- bootstrape 5 Bundle with Popper -->
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src ="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/js/scripts.js"></script>
</body>
</html>
