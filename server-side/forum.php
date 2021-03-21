<?php
require_once "includes/base.php";

if(!isset($user)) { // If the user is not logged in, redirect them to the welcome page
    header('Location: /');
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
    <h1>Forum</h1>
    <hr>
    <?php
        $posts = Model::factory('Post')->find_many();
        if(empty($posts)) {
            echo 'Nothing has been posted yet.';
        } else {
            foreach($posts as $post) {
                echo 'By ' . htmlspecialchars($post->user->username) . ' on ' . $post->creation_time . '<br>';
                echo '<blockquote>' . nl2br(htmlspecialchars($post->contents)) . '</blockquote>';
                echo '<hr>';
            }
        }
    ?>
</body>
</html>