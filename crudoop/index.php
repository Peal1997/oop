<?php
 include_once "./vendor/autoload.php";
use APP\Controller\Student;

 $stu = new Student;
 $delete_id = $_GET['delete_id']?? false;
 /**
  * call a funtion tostudent for passing $delete_id
  */
 $stu->deleteData($delete_id);
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>All Students</title>
</head>
<body>
    <div class="wrap-table shadow">
    <a class ="btn btn-primary" href="./create.php">Sign up</a>
        <div class="card">
           <div class="card-body">
           <form action="" method="POST" class="row gx-5 align-items-center">
		<div class="col-auto">
			<select name="gender" class="form-select" id="">
			<option selected>Gender</option>
			<option value="Male">Male</option>
			<option value="Female">Female</option>
			
			</select>
		</div>
		
		<div class="col-auto">
			<select name="edu" class="form-select" id="">
			<option selected>Education</option>
			<option value="HSC">HSC</option>
			<option value="SSC">SSC</option>
			<option value="JSC">JSC</option>
			<option value="PEC">PEC</option>
			</select>
		</div>
		<div class="col-auto">
			<input name="search" type="submit" class="btn btn-info" value="Search">

		</div>
 </form>
               <table style="margin:20px"class="table table-striped">
               <thead>
                   <th>Serial</th>
                   <th>Name</th>
                   <th>Email</th>
                   <th>Cell</th>
                   <th>Education</th>
                   <th>Gender</th>
                   <th>Action</th>
               </thead>
               <tbody>

               <?php
               /**
                * data fetching for showing in table as well as for showing searching data
                */
                $data = $stu->showAll();
                if(isset($_POST['search'])){
                    $gender = $_POST['gender'];
                    $education = $_POST['edu'];
                    $data = $stu->searchData($gender,$education);
                }
                while($user=$data->fetch_object()):

               ?>

                 <tr>
                   <td>1</td>
                   <td><?php echo $user->name; ?></td>
                   <td><?php echo $user->email; ?></td>
                   <td><?php echo $user->cell; ?></td>
                   <td><?php echo $user->education; ?></td>
                   <td><?php echo $user->gender; ?></td>
                   <td>
                      <a class="btn btn-sn btn-info" href="single.php?user_id=<?php echo $user->id; ?>">View</a> 
                      <a class="btn btn-sn btn-warning" href="./edit.php?edit_id=<?php echo $user->id; ?>">Edit</a> 
                      <a class="btn btn-sn btn-danger delete_btn" href="?delete_id=<?php echo $user->id; ?>">Delete</a> 
                      </td> 
                   </tr>
                   <?php endwhile;?>
               </tbody>
            </table>
           </div>
        </div>
    </div>
</body>
<script src="assets/js/bootstrap.bundle.min.js" ></script>
<script src="assets/js/jquery-3.6.0.min.js" ></script>
<script src="assets/js/scripts.js" ></script>
<script>
    $('.delete_btn').click(function(){
        let conf = confirm('Are you sure ??');
        if(conf){
            return true;
        }else{
            return false;
        }

    });
</script>
</html>