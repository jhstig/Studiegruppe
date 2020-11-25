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
</head>
<body>
    <form name="registerUserForm" action="register-user.php" method="post">
        Email: <input type="text" name="email" placeholder="Poul@poulsen.dk">
        <br>
        Kodeord: <input type="password" name="password" placeholder="Vælg et sikkert kodeord">
        <br>
        Navn: <input type="text" name="name" placeholder="Poul Poulsen">
        Vej: <input type="text" name="street" placeholder="Landevejen 1">
        <br>
        By: <input type="text" name="city" placeholder="Odense">
        Postnr.: <input type="text" name="zip" placeholder="5000">
        <br>
        <button type="submit">Registrer bruger</button>
    </form>
    
</body>
</html>
