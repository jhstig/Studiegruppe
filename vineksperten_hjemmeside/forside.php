<?php
include('functions.php');
$cats = getJson('json/cat.json');

$catTitle = '';
$products = [];

if(isset($_GET['cat'])) {
  //Jeg er pt tom
} else {
  for($i = 0; $i < count($cats); $i++) {
    $addedProds = getJson($cats[$i]['file']);

    for($k = 0; $k < count($addedProds); $k++) {
      $addedProds[$k]['pid'] = $k;
      $addedProds[$k]['cat'] = $cats[$i]['file'];
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
