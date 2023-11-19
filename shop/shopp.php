<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Clothing Store</title>
  <link rel="stylesheet" href="src/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>

<body>
  <div class="navbar">
    <a href="shopp.php">
      <h2>Clothing Store</h2>
    </a>
    <a href="..//profile.php">
      <div><i class="bi bi-person-bounding-box" style="font-size: 30px;"></i></div>
    </a>

    <a href="cart.php">
      <div class="cart">
        <i class="bi bi-cart2"></i>
        <div id="cartAmount" class="cartAmount">0</div>
      </div>
    </a>

  </div>

  <div class="shop" id="shop">


  </div>

</body>
<script src="src/Data.js"></script>
<script src="src/main.js"></script>

</html>