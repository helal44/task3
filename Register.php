<?php include('./RegisterController.php');
$validate=new RegisterControl();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <title>Registration Form</title>
</head>
<body>
  <div class="container">
   
    <h2>Registration Form</h2>
    <form method="POST" enctype="multipart/form-data" class="form-group">

      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
      </div>

      <div class="form-group">
        <label for="confirm-password">Confirm Password</label>
        <input type="password" class="form-control" id="confirm-password" name="confirmPassword" placeholder="Confirm your password">
      </div>

      <div class="form-group">
        <label for="room">Room No</label>
       <select name="room" id="room" class="form-control">
        <option value="1">Application1</option>
        <option value="2">Application2</option>
        <option value="3">Application3</option>
       </select>
      </div>

      <div class="form-group">
        <label for="image">Choose Image</label>
        <input type="file" class="form-control" id="image" name="image" placeholder="Enter your name">
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      <a href="./Login.php" class="nav-link">Login</a>

      <?php $validate->showValidateError(); ?>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
