<?php

namespace App\Models;

use App\Http\Response;

class Test
{
    public function test() : Response
    { 
        dd('DI is work!');
    }
}