<?php

if (isset($_COOKIE['message'])) {
    $message = $_COOKIE['message'];
    echo $message;
    // Faites quelque chose avec le message reçu
}            

?>