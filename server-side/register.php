<?php
require_once 'includes/base.php';

// Redirect the user if they are logged in :
if(isset($user)) {
    header('Location: /');
    exit();
}

// If form data has been sent, process it and create a new user :
if (isset($_POST['username']) && isset($_POST['password'])) {
    // TODO : check that username is unique
    $user = Model::factory('User')->create();
    $user->username = $_POST['username'];
    $user->password = hash("sha256", $_POST['password']); // For the sake of simplicity, we only use a hashing function here (no unique salt)
    $user->save();
    header('Location: /login.php?created=1');
    exit();
}

?>
<!doctype html>
<html>
<head>
    <title>Register</title>
    <meta charset="utf-8">
    <link href="./styles/register.css" rel="stylesheet">

</head>
<body>
    <h1 id="title">Register</h1>
    <form action="" method="post">
        <div id=box>
        <div id="user">
        <label for="username">
            Username
        </label>
        <input type="text" name="username" id="username" required>
        </div>
        <div id="pass">
        <label for="password">
            Password
        </label>
        <input type="password" name="password" id="password" required>
        <br>
        <button type="submit">Register</button>
        </div>
    </div>
    </form>
</body>
</html>