<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Return the authenticated user.
     *
     * This endpoint should be protected by the `auth:sanctum` middleware
     * (either on the route or a route group).
     */
    public function index(Request $request)
    {
        return 'hello';
        // response()->json($request->user());
    }
}
