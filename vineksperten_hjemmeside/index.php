<?php
    session_start();
    include('functions.php');
    $users = getJson('json/accounts.json');


    if(isset($_POST['email'])){
        //echo [$_POST['email']];
        for($i = 0; $i < count($users); $i++){
            if($users[$i]['email'] === $_POST['email'] && $users[$i][$users[$i]['email']]['password'] === $_POST['password']){
                echo "<p>email & password match</p>";
                $username = $users[$i]['email'];
                $_SESSION['username'] = $username;
                $_SESSION['user-id'] = $i;
                header("Location: forside.php");
            }
            //&& $users[$i][$_POST["email"]][$_POST["password"]]==$users[$i][$_POST["email"]]["password"]
        }
    } else{
        echo "skriv login detaljer";
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
    <form action="index.php" method="post">
        Email: <input type="text" id="login-field" name="email">
        <br>
        Kodeord: <input type="password" name="password" id="password-field">
        <br>
        <button type="submit">Log ind</button>
    </form>
    
    
    <a href="register-user.php">Registrer bruger</a>
    <br><br>
    list of users:
    <ul>
        <?php for($i = 0; $i < count($users); $i++) { ?>
            <li>
                <?php echo $users[$i]['email']; ?>
            </li>
        <?php } ?>
    </ul>
</body>
</html>