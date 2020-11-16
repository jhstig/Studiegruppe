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
          <a href="forside.php"><img id="img" src="billeder/vineksperten.png" id="logo"></a>    <!-- billede -->
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
        <div id="produkt-billede">
            <img src="<?php echo $product['image']; ?>">
        </div>
        <div id="produktinfo-wrapper">
            <div>
                <div id="produktnavn"><?php echo $product['title']; ?></div>
                <div id="produkt-type-cat"><?php echo $product['country']; ?></div>
            </div>
            <div id="produkt-pris"><?php echo $product['price']; ?></div>
        </div>
        <br>
        <div id="product-details">
            <div><?php echo $product['specs']['other']; ?></div>
            <div><?php echo $product['specs']['brand']; ?></div>
            <div><?php echo $product['specs']['size']; ?></div>
            <div><?php echo $product['specs']['abv']; ?></div>
        </div>
    </div>
</body>
</html>
