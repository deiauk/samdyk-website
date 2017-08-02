<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AllUsersController extends Controller
{
    public function show() {
        $users = User::get();
        return view('all_users')->withData($users);
    }
}
