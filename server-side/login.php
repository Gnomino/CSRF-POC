<?php
require_once 'includes/base.php';

// Redirect the user if they are logged in :
if(isset($user)) {
    header('Location: /');
    exit();
}
// If form data has been sent, try to log in the user :
if (isset($_POST['username']) && isset($_POST['password'])) {
    $user = User::where('username', $_POST['username'])
                  ->where('password', hash("sha256", $_POST['password']))
                  ->find_one();
    if($user) { // If a match has been found
        $_SESSION['user_id'] = $user->id; // Log in the user
        // ... and redirect them 
        header('Location: /');
        exit();
    } else {
        $login_fail = true;
    }
}
?>
<!doctype html>
<html>
<head>
    <title>Log in</title>
    <meta charset="utf-8">
    <link href="./styles/login.css" rel="stylesheet">
</head>
<body>
    <h1 id="title">Log in</h1>
    <?php if (isset($_GET['created'])) echo '<h3>Your account has been created. Please log in using the following form.</h3>'; ?>
    <?php if (isset($login_fail)) echo '<h3>No user was found with the given username and password.</h3>'; ?>
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
        <button type="submit">Log in</button>
        </div>
        </div>
    </form>
</body>
</html>