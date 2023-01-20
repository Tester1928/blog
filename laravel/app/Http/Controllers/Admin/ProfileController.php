<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view("admin.profile", compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        $data = \request()->validate([
            "name"  => 'required|min:4|string|max:255',
            "email" => 'required|string|email|max:255|unique:users,email,'.$user->id,
            "password"=>request()->get('password')?"required|string|min:8":'',
        ]);

        $user->name = $data["name"];
        $user->email = $data["email"];
        if(!empty($data["password"])) $user->password = Hash::make($data["password"]);
        $user->save();

        return redirect('admin/profile/');

    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}
