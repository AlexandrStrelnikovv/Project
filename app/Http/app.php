<?php
namespace App\Http;
class app
{
    public function index()
    {
        $db = new \PDO('mysql:host=localhost;dbname=test', 'root', '');
        print_r($db->errorInfo());
    }
}