<?php
if( !count($accounts)){
    die("You need to specify accounts");
}
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Text to send if user hits Cancel button';
    exit;
} 
$user = $_SERVER['PHP_AUTH_USER'];
$pass = $_SERVER['PHP_AUTH_PW'];
// Attempts to retrieve $user
if (array_key_exists($user, $accounts) && !is_null($accounts[$user])) {
    $real_pass = $accounts[$user];
} else {
    //@todo log
    die("Invalid account / password.");
}
if( $pass != $real_pass){
    die("Invalid account / password.");
}

