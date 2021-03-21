<?php
/**
 * This form does not use a CSRF token.
 * This means an attacker can lead an authenticated user to post
 * a message on the forum using their own username.
 * 
 * Severity: High
 */
require_once "includes/base.php";

if(!isset($user)) { // If the user is not logged in, redirect them to the welcome page
    header('Location: /');
    exit();
}

if(isset($_POST['post'])) {
    $post = Model::factory('Post')->create();
    $post->user_id = $user->id;
    $post->contents = $_POST['post'];
    $post->set_expr('creation_time', 'date(\'now\')');
    $post->save();
    header('Location: /forum.php#post' . $post->id);
} else {
    header('Location: /forum.php');
}