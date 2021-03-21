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
                echo '<div id="post' . $post->id . '">';
                echo 'By ' . htmlspecialchars($post->user()->username) . ' on ' . $post->creation_time . '<br>';
                echo '<blockquote>' . nl2br(htmlspecialchars($post->contents)) . '</blockquote>';
                echo '</div><hr>';
            }
        }
    ?>
    <h3>Write a post</h3>
    <form action="post.php" method="post">
        <label for="post">
            Text
        </label>
        <textarea id="post" name="post" required></textarea>
        <br>
        <button type="submit">Post !</button>
    </form>
</body>
</html>