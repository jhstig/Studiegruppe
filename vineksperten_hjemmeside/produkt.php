<?php
include('functions.php');
$product = getJson($_GET['cat'])[$_GET['pid']];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vineksperten</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header>
      <div id="top-row">
          <a href="forside.php"><img id="logo" src="billeder/vineksperten.png"></a>    <!-- billede -->
          <input class="top-row-btn" id="search-box" type="text" id="search" name="search" value="Søg"><!-- Søgefeldt -->
          <button class="top-row-btn">Søg</button>
          <button class="top-row-btn">Indkøbskurv</button><!-- Indkøbskurv -->
      </div>
      <div id="sec-top-row">
          <!-- Menu -->
          <div class="menu-items">
              <p>Rødvin</p>
          </div>
          <div class="menu-items">
              <p>Hvidvin</p>
          </div>
          <div class="menu-items">
              <p>Rosévin</p>

          </div>
          <div class="menu-items">
              <p>Spiritus</p>
          </div>
          <div class="menu-items">
              <p>Delikatesser</p>
          </div>
      </div>
  </header>
    <div id="product-wrapper">
        <div id="product-name">
          <?php echo $product['name']; ?>
        </div>
        <div id="product-image">
            <img src="<?php echo $product['image']; ?>">
        </div>
        <div id="product-price">
          <?php echo $product['price']; ?>
          <br>
          <p>Stykpris</p>
        </div>
        <div id="amout">

        </div>
        <div id="add-to-cart">

        </div>
        <div id="product-description">

        </div>
        <div id="facts-wrapper">

        </div>
    </div>
</body>
</html>
<!-- <div> <?php// echo $product['specs']['other']; ?></div> -->
