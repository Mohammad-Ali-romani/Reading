<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\CheckPassOld;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit(){
        $user = User::find(Auth::user()->id);
        return view('back.profile.edit',compact('user'));
    }
}
