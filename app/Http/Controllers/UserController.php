<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\users;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        if (auth()->guest()) {
            abort(403);
        }

        $userdata = users::all();
        $userdata = DB::table('users')->get();

        return view('home', ['users' => $userdata]);
    }

    public function create()
    {
        return view('create');
    }
}
