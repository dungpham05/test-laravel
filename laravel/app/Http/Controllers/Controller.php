<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Traits\ApiResponser;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests, ApiResponser;

    /**
     * Get current user
     *
     * @return Auth
     */
    public function getCurrentUser()
    {
        return Auth::guard('sanctum')->user();
    }
}
