<?php

namespace App\Http\Controllers;

use App\Http\Resources\User as ResourceUser;
use Illuminate\Http\Request;

class AuthUserController extends Controller
{
    public function show()
    {
        return new ResourceUser(auth()->user());
    }
}
