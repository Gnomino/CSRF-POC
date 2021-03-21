<?php
session_start();
require_once __DIR__.'/idiorm.php';
require_once __DIR__.'/paris.php';

ORM::configure('sqlite:.sqlite.db');

/* Models */

class User extends Model {
    public function posts() {
        return $this->has_many('Post');
    }
}

class Post extends Model {
    public function user() {
        return $this->belongs_to('User');
    }
}

/* Check for an authenticated user */

if(isset($_SESSION['user_id'])) {
    $user = Model::factory('User')->find_one($_SESSION['user_id']);
}