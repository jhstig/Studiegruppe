<?php
    session_start();
    include('functions.php');
    $users = getJson('json/accounts.json');


    if(isset($_POST['email'])){
        //echo [$_POST['email']];
        for($i = 0; $i < count($users); $i++){
            if($users[$i]['email'] === $_POST['email'] && $users[$i][$users[$i]['email']]['password'] === $_POST['password']){
                $username = $users[$i]['email'];
                $_SESSION['username'] = $username;
                $_SESSION['user-id'] = $i;
                header("Location: forside.php");
                exit();
            }
            //&& $users[$i][$_POST["email"]][$_POST["password"]]==$users[$i][$_POST["email"]]["password"]
        }
    }




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login side</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div id="login-box">
    <img id="login-logo" src="billeder/vineksperten.png">
    <form action="index.php" method="post">
        <div id="email-box">Email: <input type="text" id="login-field" name="email"></div>
        <br>
        <div id="password-box">Kodeord: <input type="password" name="password" id="password-field"></div>
        <br>
        <div id="login-btn"><button type="submit">Log ind</button></div>
    </form>
    <div id="register-user"><a href="register-user.php">Registrer bruger</a></div>
  </div>
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
