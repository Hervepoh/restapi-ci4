<?php

namespace App\Libraries;


use \OAuth2\Storage\Pdo;

class Oauth {
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
        
        $storage = new Pdo(compact('dsn','username', 'password'));
        $this->server = new \OAuth2\Server($storage);
        
// Add the "Users Credentials" grant type (it is the simplest of the grant types)
        $this->server->addGrantType(new \OAuth2\GrantType\UserCredentials($storage));

    }
}