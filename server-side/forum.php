<?php
require_once "includes/base.php";

if(!isset($user)) { // If the user is not logged in, redirect them to the welcome page
    header('Location: /');
    exit();
}
?>
<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Welcome</title>
    <link href="./styles/forum.css" rel="stylesheet">
    <meta charset="utf-8">
</head>
<body>
    <div id="head">
        <h1 id="title">Forum</h1>
        <form action="logout.php" method="post" >
            <button id="buttonLog" type="submit">Logout !</button>
        </form>
    </div>
    <hr class="striped-border">
        <br>
        <div id="postsFeed">
            <?php
            $posts = Model::factory('Post')->find_many();
            if(empty($posts)) {
                echo 'Nothing has been posted yet.';
            } else {
                foreach($posts as $post) {
                    echo '<div id="post' . $post->id . '">';
                    echo 'By ' . htmlspecialchars($post->user()->find_one()->username) . ' on ' . $post->creation_time . '<br>';
                    echo '<blockquote>' . nl2br(htmlspecialchars($post->contents)) . '<hr></blockquote>';
                    echo '</div>';
                }
            }
        ?></div>   <h3 class="write">Write a post</h3>
    <form action="post.php" method="post">
        <textarea id="post" style="resize: none; height: 100px; width: 300px;" name="post" placeholder= "Entrez votre post ici "required=""></textarea>
        <br>
        <button class="buttonPost" type="submit"><span>Post !</span> </button>
    </form>
 
</body></html>
    
