<?php
session_start();
$username = $_SESSION['username'];
$userid = $_SESSION['user-id'];

include('functions.php');
$cats = getJson('json/cat.json');

$users = getJson('json/accounts.json');

$catTitle = '';
$products = [];

if(isset($_GET['cat'])) {
  //Jeg er pt tom
} else {
  for($i = 0; $i < count($cats); $i++) {
    $addedProds = getJson($cats[3]['file']);

    for($k = 0; $k < count($addedProds); $k++) {
      $addedProds[$k]['pid'] = $k;
      $addedProds[$k]['cat'] = $cats[3]['file'];
      $products[] = $addedProds[$k];
    }
  }

  /*
  for($i = 0; $i < count($cats); $i++) {
    $addedProds = getJson($cats[$i]['file']);
    $products = array_merge($products, $addedProds);
  }
  */
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vineksperten - Spiritus</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header>
      <div id="top-row">
          <a href="forside.php"><img id="logo" src="billeder/vineksperten.png"></a>    <!-- billede -->
          <input class="top-row-btn" id="search-box" type="text" id="search" name="search" value="Søg"><!-- Søgefeldt -->
          <button class="top-row-btn">Søg</button>
          <div id="cart-welcome-wrapper">
            <a href="cart.php"><button class="top-row-btn">Indkøbskurv</button></a><!-- Indkøbskurv -->
            <p id="login-name">Velkommen <?php echo $users[$userid][$username]['name'] ?></p>
          </div>
      </div>
      <div id="sec-top-row">
          <!-- Menu -->
          <div class="menu-items">
              <a href="kategori_rødvin.php"><p>Rødvin</p></a>
          </div>
          <div class="menu-items">
              <a href="kategori_hvidvin.php"><p>Hvidvin</p></a>
          </div>
          <div class="menu-items">
              <a href="kategori_rosevin.php"><p>Rosévin</p></a>
          </div>
          <div class="menu-items">
              <a href="kategori_spiritus.php"><p>Spiritus</p></a>
          </div>
          <div class="menu-items">
              <a href="kategori_delikatesser.php"><p>Delikatesser</p></a>
          </div>
      </div>
  </header>

  <div id="product-grid">
    <?php for($j = 0; $j < count($products); $j++) { ?>
        <div class="individual-products">
          <a href="produkt.php?pid=<?php echo $products[$j]['pid']; ?>&cat=<?php echo $products[$j]['cat']; ?>">
            <div>
              <h2><?php echo $products[$j]['title']; ?></h2>
            </div>
            <div>
              <img class="frontpage-images" src="<?php echo $products[$j]['image']; ?>">
            </div>
            <div>
              <h3><?php echo $products[$j]['price']; ?></h3>
            </div>
            <div>
              <p><?php echo $products[$j]['specs']['brand']; ?> ｜ <?php echo $products[$j]['specs']['size']; ?></p>
            </div>
          </a>
        </div>
      <?php } ?>
  </div>

</body>
</html>
