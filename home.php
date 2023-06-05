<?php 
session_start();
if(!isset($_SESSION['name'])){
  header('Location:Login.php');
  exit();
}

include 'controllers/dbController.php';
$db=new dataBaseController();

$data=$db->getAllData();
  $db->DeleteRow();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <title>Home Page</title>
</head>
<body>
  <div class="container my-5">
   
    <div class="row">
    <div class="col-6">
      <img src="./images/<?php echo $_SESSION['image'] ?>" alt="img" width="150"/>
    </div>

    <div class="col-6">
      <h2>Welcome : <?php echo $_SESSION['name'] ?></h2>
      <h4><?php echo $_SESSION['email'] ?></h4>
    </div>
   
    </div>
    <div class="row my-5">
        <table class="table">
            <thead>
              <th>ID</th>
              <th>Image</th>
              <th>Name</th>
              <th>Email</th>
              <th>Room</th>
              <th>Actions</th>
            </thead>
            <tbody>
              <?php 
              while($row=mysqli_fetch_assoc($data)){
                ?>
                <tr>
                  <td><?php echo $row['id'] ?> </td>
                  <td>  <img src="./images/<?php echo $row['image'] ?>" alt="img" width="50"/></td>
                  <td><?php echo $row['name'] ?> </td>
                  <td><?php echo $row['email'] ?> </td>
                  <td><?php echo $row['room'] ?> </td>
                  <td>
                     <a class="btn btn-danger" href="home.php?delete=<?php echo $row['id'] ?>">Delete</a>
                     <a class="btn btn-warning my-2" href="edit.php?update=<?php echo $row['id'] ?>">Update</a>
                  </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
