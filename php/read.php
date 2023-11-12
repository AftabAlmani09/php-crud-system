<?php
include('main.php');
include('connection.php');
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
  <?php
if($_SESSION['role'] == 0){
?>
 <div class="container">
 <div class="name">
        <h4>Welcome again, <?php echo  $_SESSION['name']?></h4>
    </div>
    <div class="btns text-end">
    <a href="./insert.php" class="btn btn-warning mb-5">Add User</a>
        <a href="./logout.php" class="btn btn-danger mb-5">Logout</a>
    </div>
 <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Emial</th>
      <th scope="col">Password</th>
      <th scope="col">Role</th>
      <th scope="col">Image</th>
      <th scope="col">Add_by</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $query = mysqli_query($con,'SELECT * FROM `register`');
    if($query){
        while($row = mysqli_fetch_assoc($query)){
    ?>
    <tr>
      <th scope="row"><?php echo $row['id']?></th>
      <td><?php echo $row['Name']?></td>
      <td><?php echo $row['Email']?></td>
      <td><?php echo $row['passs']?></td>
      <td><?php $row['Role'];
      if($row['Role'] == 0){
          echo "Admin";
        }else{
        echo "User";
      }
      ?></td>
      <td><img src="<?php echo "image/".$row['image']?>" width="40" alt=""></td>
      <td><?php echo $row['Add_date']?></td>
      <td><a href="update.php?id=<?php echo $row['id']?>" class="btn btn-warning">Edit</a>
      <a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger">Delete</a>
    </td>
    </tr>
    <?php
      }
    }
    ?>
  </tbody>
</table>
 </div>
<?php
}else{
  ?>
  <div class="container">
  <div class="name">
         <h4>Welcome again, <?php echo $_SESSION['name']?></h4>
     </div>
     <div class="btns text-end">
         <a href="./logout.php" class="btn btn-danger mb-5">Logout</a>
     </div>
  <table class="table">
   <thead>
     <tr>
       <th scope="col">Id</th>
       <th scope="col">Name</th>
       <th scope="col">Emial</th>
       <th scope="col">Password</th>
       <th scope="col">Role</th>
       <th scope="col">Image</th>
       <th scope="col">Add_by</th>
     </tr>
   </thead>
   <tbody>
   <?php
     $query = mysqli_query($con,'SELECT * FROM `register`');
     if($query){
         while($row = mysqli_fetch_assoc($query)){
     ?>
     <tr>
       <th scope="row"><?php echo $row['id']?></th>
       <td><?php echo $row['Name']?></td>
       <td><?php echo $row['Email']?></td>
       <td><?php echo $row['passs']?></td>
       <td><?php $row['Role'];
       if($row['Role'] == 0){
           echo "Admin";
         }else{
         echo "User";
       }
       ?></td>
       <td><img src="<?php echo "image/".$row['image']?>" width="40" alt=""></td>
       <td><?php echo $row['Add_date']?></td>
     </td>
     </tr>
     <?php
       }
     }
     ?>
   </tbody>
 </table>
  </div>
  <?php
}
?>
<?php
if (isset($_GET['id'])) {
    $delete=$_GET['id'];
    $check=mysqli_query($con,"DELETE FROM `register ` WHERE  id = '$delete'");
    if ($check == 1) {
      echo '<script>alert("User Delete Successfully");window.location.href="http://localhost/PHP/read.php"</script>';
    }
    else{
      echo '<script>alert("User Delete Failed");window.location.href="http://localhost/PHP/read.php"</script>';
    }
}
?>
  







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>