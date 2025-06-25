<?php

namespace App\database\db;
use RedBeanPHP\R;

class DB
{
    public function __construct(
        private string $dbhost,
        private string $dbname,
        private string $dbuser,
        private string $dbpass
    )
    {

    }

    public function initDB() : void
    {
        R::setup('mysql:host=' . $this->dbhost . ';dbname=' . $this->dbname, $this->dbuser, $this->dbpass);
    }
}