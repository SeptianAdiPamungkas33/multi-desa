<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Users;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index() {
        $user = Auth::user();

        return view('profile.index', [
            'title' => 'Profile',
        ]);
    }
}
