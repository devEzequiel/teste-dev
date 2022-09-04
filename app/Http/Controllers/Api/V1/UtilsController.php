<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UtilsController extends Controller
{
    public function healthCheck()
    {
        echo 'ok';
    }
}
