<?php
require_once "includes/base.php";

if(isset($user)) { // If the user is logged in, redirect them to the user area
    header('Location: /forum.php');
    exit();
}

?>
<!doctype html>
<html>
<head>
    <title>Welcome</title>
    <meta charset="utf-8">
</head>
<body>
    <p>
        Welcome to our Proof of Concept for the CSRF vulnerability.
        You may <a href="/register.php">register</a> if you haven't already, or <a href="/login.php">log in</a> using an existing account.
    </p>
</body>
</html>