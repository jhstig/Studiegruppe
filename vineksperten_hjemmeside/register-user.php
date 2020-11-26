<?php
    //include('functions.php');
    $jsonUsers = file_get_contents('json/accounts.json');
    $users = json_decode($jsonUsers, true);

    if(isset($_POST["email"]))   {
        $email = $_POST["email"];
        $userPassword = $_POST["password"];
        $name = $_POST["name"];
        $street = $_POST["street"];
        $city = $_POST["city"];
        $zip = $_POST["zip"];
        if(trim($email) == "" || trim($userPassword) == "" || trim($name) == "" || trim($street)=="" || trim($city)=="" || trim($zip)=="")  {
            echo "<p>Du har ikke udfyldt alle felter</p>";
        }
        elseif(strpos($email, "@")!==false && strpos($email, ".")!==false)
        {
            $users[] = array("email" => $_POST["email"]);
            $users[count($users)-1][$_POST["email"]] = array("password"=>$_POST["password"], "name"=>$_POST['name'], "street"=>$_POST["street"], "city"=>$_POST["city"], "zip"=>$_POST["zip"]);
            $users[count($users)-1]['cart']=array("");
            $jsonUsers = json_encode($users);
            file_put_contents("json/accounts.json", $jsonUsers);
            header("Location: index.php");
            exit;
        }else
        {
            echo "Indtast en gyldig email adresse";
        }
    }
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
  <div id="register-box">
    <a href="index.php"><img id="register-logo" src="billeder/vineksperten.png"></a>
    <form name="registerUserForm" action="register-user.php" method="post">
        <p id="email-text">Email: </p>
        <div id="email-input"><input type="text" name="email" placeholder="Poul@poulsen.dk"></div>
        <p id="password-text">Kodeord: </p>
        <div id="password-input"><input type="password" name="password" placeholder="Vælg et sikkert kodeord"></div>
        <p id="name-text">Navn: </p>
        <div id="name-input"><input type="text" name="name" placeholder="Poul Poulsen"></div>
        <p id="street-text">Vej: </p>
        <div id="street-input"><input type="text" name="street" placeholder="Landevejen 1"></div>
        <p id="city-text">By: </p>
        <div id="city-input"><input type="text" name="city" placeholder="Odense"></div>
        <p id="zip-text">Postnr.: </p>
        <div id="zip-input"><input type="text" name="zip" placeholder="5000"></div>
        <p></p>
        <div id="register-user-btn"><button type="submit">Registrer bruger</button></div>
    </form>
  </div>
</body>
</html>
