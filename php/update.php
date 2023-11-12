<?php
include("connection.php");
include("main.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>
    <link rel="stylesheet" href="b">
    <style>
        .form {
  position: relative;
  display: flex;
  flex-direction: column;
  gap: 10px;
  padding: 50px 30px;
  background: #0b2447;
  border-radius: 10px;
  overflow: hidden;
}
.input {
  padding: 15px 10px;
  border-radius: 5px;
  margin-bottom: 10px;
  background-color: transparent;
  color: rgb(255, 255, 255);
  border: 2px solid #3b8df2;
}
.input::placeholder {
  color: #fff;
}
button {
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  background-color: white;
  color: black;
  font-size: 16px;
  cursor: pointer;

}
    </style>
</head>
<body>
<?php
if (isset($_GET['id'])) {
 $ed=$_GET['id'];
 $update=mysqli_query($con,"SELECT * FROM `register` WHERE id='$ed'");
 $row=mysqli_fetch_array($update);
}
?>
<div class="container mt-4">
    <div class="form-boot" style="border: 3px solid black;padding: 50px;">
    <form class="row g-3" action="#" method="post" enctype="multipart/form-data">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Name</label>
    <input type="text" name="name" value="<?php echo $row['Name']?>" class="form-control" id="inputEmail4" required>
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" name="email" value="<?php echo $row['Email']?>" class="form-control" id="inputEmail4" required>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Password</label>
    <input type="password" name="pass" value="<?php echo $row['passs']?>" class="form-control" id="inputPassword4" required>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Confirm Password</label>
    <input type="password" name="cpass" value="<?php echo $row['Cpassword']?>" class="form-control" id="inputPassword4" required>
  </div>
  <div class="col-md-6">
    <label for="inputState" class="form-label">Role</label>
    <select id="inputState" class="form-select" name="role" required>
    <?php
        if($row['Role'] == 0){
            echo '<option selected value="0">admin</option>';
            echo '<option value="1">user</option>';
        }else{
            echo '<option value="1" selected>user</option>';
            echo '<option value="0">admin</option>';
        }
        ?>
    </select>
  </div>
  <div class="col-md-6">
    <label for="inputZip" class="form-label">Image</label>
    <input type="file" class="form-control" value="<?php echo $row['image']?>" name="image" accept="image/png, image/gif, image/jpeg" required>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary" name="btn">Add User</button>
    <a href="show.php" class="btn btn-danger" name="btn">Show User</a>
  </div>
</form>
</div>
</div>
</body>
</html>
<?php
if(isset($_POST['btn'])){
    $password=$_POST['pass'];
    $cpassword=$_POST['cpass'];
    if($password == $cpassword){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['pass'];
        $cpassword=$_POST['cpass'];
        $role=$_POST['role'];
        $file=$_FILES['image'];
        $imgname = $file['name'];
         $imgpath = $file['tmp_name'];
         $location = 'image/'.$imgname;
         move_uploaded_file($imgpath,$location);
        $query = mysqli_query($con,"UPDATE `register` SET `Name`='$name',`Email`='$email',`passs`=' $password',`Cpassword`='$cpassword',`Role`='$role',`Add_date`='current_timestamp()',`image`='$imgname' WHERE id='$ed'");
        if($query == 1){
            echo '<script>alert("Data updated Successfully");window.location.href="http://localhost/PHP/read.php"</script>';
        }
        else{
            echo '<script>alert("Failed updated data");window.location.href="http://localhost/PHP/read.php"</script>';
        }
    }
    else{
        echo '<script>alert("Password dont matched")</script>';
    }
}
?>