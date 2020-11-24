<?php
    include('functions.php');
    $users = getJson('json/accounts.json');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Email: <input type="text" id="login-field">
    <br>
    Kodeord: <input type="password" id="password-field">
    <br>
    <button>Log ind</button>
    <a href="registrer-bruger.php"></a>
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