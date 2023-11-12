<?php
include("main.php");
include("connection.php");
?>
<div class="container mt-4">
    <div class="form-boot" style="border: 3px solid black;padding: 50px;">
    <form class="row g-3" action="#" method="post" enctype="multipart/form-data">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Name</label>
    <input type="text" name="name" class="form-control" id="inputEmail4" required>
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" name="email" class="form-control" id="inputEmail4" required>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Password</label>
    <input type="password" name="pass" class="form-control" id="inputPassword4" required>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Confirm Password</label>
    <input type="password" name="cpass" class="form-control" id="inputPassword4" required>
  </div>
  <div class="col-md-6">
    <label for="inputState" class="form-label">Role</label>
    <select id="inputState" class="form-select" name="role" required>
      <option selected value="0">admin</option>
      <option value="1">user</option>
    </select>
  </div>
  <div class="col-md-6">
    <label for="inputZip" class="form-label">Image</label>
    <input type="file" class="form-control" name="img" accept="image/png, image/gif, image/jpeg" required>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary" name="btn">Add User</button>
    <a href="show.php" class="btn btn-danger" name="btn">Show User</a>
  </div>
</form>
</div>
</div>
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
        $file=$_FILES['img'];
        $imgname = $file['name'];
         $imgpath = $file['tmp_name'];
         $location = 'image/'.$imgname;
         move_uploaded_file($imgpath,$location);
        $query = mysqli_query($con,"INSERT INTO `register`(`Name`, `Email`, `passs`, `Cpassword`, `Role`, `Add_date`, `image`) VALUES ('$name','$email','$password',' $cpassword',' $role',current_timestamp(),'$imgname')");
        if($query == 1){
            echo '<script>alert("Data inserted Successfully");window.location.href="http://localhost/PHP/login.php"</script>';
        }
        else{
            echo '<script>alert("Failed inserted data");window.location.href="http://localhost/PHP/insert.php"</script>';
        }
    }
    else{
        echo '<script>alert("Password dont matched")</script>';
    }
}
?>