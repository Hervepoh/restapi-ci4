<?php

namespace App\Libraries;

/*
 * Use basic bshaffer Pdo and bd configuration 
 * with auth by username and sha1 password encryption
 */
// use \OAuth2\Storage\Pdo; 

// auth by email and php password_hash default encryption
use \App\Libraries\CustomOauthStorage;

class Oauth
{
    public $server;

    function __construct()
    {
        $this->init();
    }

    public function init()
    {
        $dsn = getenv('database.default.dsn');
        $username = getenv('database.default.username');
        $password = getenv('database.default.password');

        //$storage = new Pdo(compact('dsn','username', 'password'));
        $storage = new CustomOauthStorage(compact('dsn', 'username', 'password'));
        $this->server = new \OAuth2\Server($storage);

        // Add the "Users Credentials" grant type (it is the simplest of the grant types)
        $this->server->addGrantType(new \OAuth2\GrantType\UserCredentials($storage));
    }
}
