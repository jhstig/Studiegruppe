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
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php for($j = 0; $j < count($products); $j++) { ?>
      <div>
        <h2><?php echo $products[$j]['title']; ?></h2>
        <img src="<?php echo $products[$j]['image']; ?>">
        <a href="product-single.php?pid=<?php echo $products[$j]['pid']; ?>&cat=<?php echo $products[$j]['cat']; ?>">Se mere</a>
      </div>
    <?php } ?>
  </body>
</html>
