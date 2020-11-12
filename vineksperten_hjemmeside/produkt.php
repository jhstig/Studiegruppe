<?php
include('functions.php');
$product = getJson($_GET['cat'])[$_GET['pid']];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><!-- produktnavn variables --></title>
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
    <div id="product-wrapper">
        <div id="produkt-billede">
            <img src="<?php echo $product['image']; ?>">
        </div>
        <div id="produktinfo-wrapper">
            <div id="produktnavn"><?php echo $product['title']; ?></div>
            <div id="produkt-type-cat"><?php echo $product['cat']; ?></div>
            <div id="produkt-pris"><?php echo $product['price']; ?> DKK</div> 
        </div>
        <div id="yderligere-information">
            <p> Nydes ved 18 grader celsius. Bedst med kød</p>
        </div>
        <div id="produkt-egenskaber">
            <p><?php echo $product['specs']['size']; ?></p>
        </div>
        <div id="brand">
            <p><?php echo $product['specs']['brand']; ?></p>
        </div>
        
        
        
    </div>
</body>
</html>