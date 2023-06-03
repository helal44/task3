<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <title>Login Form</title>
</head>
<body>
  <div class="container">
    <h2>Home Page</h2>

    <h2>welcome <strong>
    <?php
    session_start();
    echo $_SESSION['name']; 
    ?>
    </strong>
    </h2>
    <img src="./images/<?php echo $_SESSION['image'] ?>" alt="img" width="150"/>
   
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
