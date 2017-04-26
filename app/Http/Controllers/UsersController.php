<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function profile() {
        $user = auth()->user();

        return view('users.profile', compact('user'));
    }

}
