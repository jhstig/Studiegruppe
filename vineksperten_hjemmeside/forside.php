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
</head>
<header>
    <div id="top-row">
        <img src="https://picsum.photos/200/100" id="logo">    <!-- billede -->
        <input type="text" id="search" name="search" value="Søg"><!-- Søgefeldt -->
        <button>Indkøbskurv</button><!-- Indkøbskurv -->
    </div>
    <hr>
    <div id="secTop-row">
        <!-- Menu -->
        <div class="dropdown">
            <p id="rodvin">Rødvin</p>

        </div>
        <div class="dropdown">
            <p id="hvidvin-menu">Hvidvin</p>
        </div>
        <div class="dropdown">
            <p id="Rosevin-menu">Rosévin</p>

        </div>
        <div class="dropdown">
            <p id="spiritus-menu">Spiritus</p>

        </div>
        <div class="dropdown">
            <p id="delikatesser-menu">Delikatesser</p>
        </div>
    </div>
</header>
<body>
<?php for($j = 0; $j < count($products); $j++) { ?>
      <div>
        <h2><?php echo $products[$j]['title']; ?></h2>
        <img src="<?php echo $products[$j]['image']; ?>">
        <a href="produkt.php?pid=<?php echo $products[$j]['pid']; ?>&cat=<?php echo $products[$j]['cat']; ?>">Se mere</a>
      </div>
    <?php } ?>
</body>
</html>