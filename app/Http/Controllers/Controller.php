<?php

namespace App\Http\Controllers;

use App\Support\Traits\JsonWrapper;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use JsonWrapper;
    use ValidatesRequests;
    use AuthorizesRequests;
}
