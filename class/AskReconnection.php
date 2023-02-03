<?php

class AskReconnection {
    public function delayExceeded() {
        header( "refresh:300;url=http://localhost/PHP_authentification/connection.html" );
    }


    public function refreshPage() {
        $pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
        if(!$pageWasRefreshed ) {
        header("Location: http://localhost/PHP_authentification/connection.html");
        } 
    }
}