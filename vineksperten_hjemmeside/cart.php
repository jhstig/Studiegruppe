<?php
session_start();
$username = $_SESSION['username'];
$userid = $_SESSION['user-id'];

include('functions.php');
$users = getJson('json/accounts.json');
$totalPrice = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
  

    <div id="checkout-wrapper">
        <div id="checkout-left-wrapper">
            <div id="checkout-lorem"></div>
            <div id="checkout-commercial"></div>
            <div id="checkout-purchase"></div>
        </div>
        <div id="checkout-products-wrapper">
            <div id="checkout-products-picture">
                <!-- her skal være et loop -->
                <?php for($i = 1; $i < count($users[$userid]['cart']); $i++) {?>
                <div class="checkout-pictures">
                    <img class="checkout-pictures-raw" src="<?php echo $users[$userid]['cart']["item" . $i]['img']; ?>" alt="">
                </div>
                <?php } ?>
                <!--            -->
                
            </div>
            <div id="checkout-products-description">
                <!-- her skal være et loop -->
                <?php for($i = 1; $i < count($users[$userid]['cart']); $i++) {?>
                <div class="checkout-descriptions">
                    <p id="product-title-p"><?php echo $users[$userid]['cart']["item" . $i]['title']; ?></p>
                    <p id="product-amount"><?php echo $users[$userid]['cart']["item" . $i]['amount']; ?></p>
                    
                </div>
                <?php } ?>
                <!--            -->
            </div>
        </div>
        <div id="checkout-sub-total">
            <?php for($i = 1; $i < count($users[$userid]['cart']); $i++) {?>
                <div class="checkout-sub-calculation">
                    <p>Vare: <?php echo $users[$userid]['cart']["item" . $i]['title']; ?></p>
                    <p>Antal stk.: <?php echo $users[$userid]['cart']["item" . $i]['amount']; ?></p>
                    <p>Pris pr. stk.: <?php echo $users[$userid]['cart']["item" . $i]['price']; ?></p>
                    <p>Samlet: <?php echo $users[$userid]['cart']["item" . $i]['amount'] * str_replace(",",".",$users[$userid]['cart']["item" . $i]['price']); ?></p>
                    <?php 
                    $tempPrice = 0;
                    $tempPrice = $users[$userid]['cart']["item" . $i]['amount'] * str_replace(",",".",$users[$userid]['cart']["item" . $i]['price']);
                    $totalPrice = $totalPrice + $tempPrice; 
                    ?>
                    <br>
                </div>
            <?php } ?>
            <?php echo "TOTAL:" . $totalPrice; ?>
        </div>
    </div>
</body>
</html>