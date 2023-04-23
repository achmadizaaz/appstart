<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Auth::user();

        return view('backend.profile.index', compact('profile'));
    }

    public function edit()
    {
        $profile = Auth::user();
        return view('backend.profile.edit', compact('profile'));
    }
}
