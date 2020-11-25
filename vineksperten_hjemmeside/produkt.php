<?php
  session_start();
  $username = $_SESSION['username'];
  $userid = $_SESSION['user-id'];


  include('functions.php');
  $product = getJson($_GET['cat'])[$_GET['pid']];
  $jsonUsers = file_get_contents('json/accounts.json');
  $users = json_decode($jsonUsers, true);
  $temp_array = $users[$userid]['cart'];
  $productTitle = $product['title'];
  $arrTitle = "item" . count($users[$userid]['cart']);
  $cart = $users[$userid]['cart'];

  if(isset($_POST["cartbutton"])) {
    $selectOption = $_POST['amount'];
    echo "Du har tilføjet " . htmlspecialchars($_POST['amount']) . " " . $product['title'] . " til din indkøbskurv!";
    $users[$userid]['cart'] += [$arrTitle => ["pid" => $_GET['pid'], "cat" => $_GET['cat'], "price" => $product['price'], "title"=>$product['title'], "img" => $product['image']]];
    $users[$userid]['cart'][$arrTitle] += ["amount" => $selectOption];
    //$users[$userid]['cart'][$arrTitle] += ["pid" => $_GET['pid'], "cat" => $_GET['cat'], "price" => $product['price']];
    //$users[$userid]['cart'] += [$arrTitle => $product['title']];
    $jsonUsers = json_encode($users);
    file_put_contents("json/accounts.json", $jsonUsers);
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
          <a href="cart.php"><button class="top-row-btn">Indkøbskurv</button></a><!-- Indkøbskurv -->
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
  <form method="post">
    <div id="product-wrapper">
        <div id="product-name">
          <p><?php echo $product['title']; ?></p>
        </div>
        <div id="product-image">
            <img src="<?php echo $product['image']; ?>">
        </div>
        <div id="product-price">
          <h2><?php echo $product['price']; ?><span class="DKK"> DKK</span></h2>
          <p>Stykpris</p>
        </div>

          <div id="amount">
            <div id="unit-amount">
              <select name="amount" data-controller="amount" id="input-amount" title="Indtast antal">
                <option value="1" selected>1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
              </select>
            </div>
            <div id="unit-title">
              <p>Stk.</p>
            </div>
          </div>
          <div id="add-to-cart">
            <button id="cart-button" type="submit" name="cartbutton">TILFØJ TIL KURV <i class="fa fa-shopping-cart"></i></button>
          </div>

        <div id="product-description">
          <p><?php echo $product['specs']['other']; ?></p>
        </div>
        <div id="facts-wrapper">
          <div class="fact-cells">
          Land
          </div>
          <div class="fact-cells">
          <p><?php echo $product['country']; ?></p>
          </div>
          <div class="fact-cells">
          Område
          </div>
          <div class="fact-cells">
          <p><?php echo $product['region'];?></p>
          </div>
          <div class="fact-cells">
          Mængde
          </div>
          <div class="fact-cells">
          <p><?php echo $product['specs']['size']; ?></p>
          </div>
          <div class="fact-cells">
          Producent
          </div>
          <div class="fact-cells">
          <p><?php echo $product['specs']['brand']; ?></p>
          </div>
          <div class="fact-cells">
          Vol
          </div>
          <div class="fact-cells">
          <p><?php echo $product['specs']['abv']; ?></p>
          </div>
          <div class="fact-cells">
          Årgang
          </div>
          <div class="fact-cells">
          <p><?php echo $product['specs']['year']; ?></p>
          </div>
        </div>
    </div>
    </form>
</body>
</html>
<!-- <div> <?php// echo $product['specs']['other']; ?></div> -->
