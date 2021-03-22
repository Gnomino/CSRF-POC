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
    <link href="./styles/index.css" rel="stylesheet">
</head>
<body>
    <section>      
        <h1 class="POC">Welcome to our Proof of Concept for the CSRF vulnerability.</h1>
        <h2>You may <a href="/register.php">register</a> if you haven't already, </h2> <br> <h2>or</h2> <br> <h2><a href="/login.php">log in</a> using an existing account.</p></h2>
    </section>
</body>
</html>