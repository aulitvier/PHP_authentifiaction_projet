<?php

class DemanderReconnexion {





    public function delaiDepasse() {
        header( "refresh:300;url=http://localhost/PHP_authentification/connexion.html" );
    }


    public function rafraichisementPage() {
        $pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
        if(!$pageWasRefreshed ) {
        header("Location: http://localhost/PHP_authentification/connexion.html");
        } 
    }
}