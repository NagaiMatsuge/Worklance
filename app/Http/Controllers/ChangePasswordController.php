<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function changePassword(Request $request)
    {
        $validated = $request->validate([
            'currentPassword' => ['required', new MatchOldPassword],
            'password' => ['required', 'string', 'min:8'],
            'confirm' => ['same:password'],
        ]);
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->password)]);
        return redirect()->back()->with('msg', 'Password has been changed successfuly');
    }
}
