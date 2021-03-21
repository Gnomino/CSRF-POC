<?php
/*
    No CSRF Token is used here, which means that any request from an
    authenticated client to this page will log them out of the website.

    Severity: Low-Medium
*/
require_once 'includes/base.php';
session_destroy();

header('Location: /?logout=1');