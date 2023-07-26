<?php

namespace App\Http\Controllers;

use App\Support\Traits\Controllers\JsonWrapper;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use JsonWrapper;
    use ValidatesRequests;
    use AuthorizesRequests;
}
