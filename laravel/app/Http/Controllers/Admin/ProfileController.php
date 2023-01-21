<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $files = Storage::allFiles();

        $user = auth()->user();
        $avatar = "/storage/users/$user->id/$user->image";

        return view("admin.profile", compact('user', 'avatar'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        $data = \request()->validate([
            "name"     => 'required|min:4|string|max:255',
            "email"    => 'required|string|email|max:255|unique:users,email,' . $user->id,
            "password" => request()->get('password') ? "required|string|min:8" : '',
        ]);

        $file = \request()->file('file');
        if ($file) {
            $file_name = $file->getClientOriginalName();
            $file->storeAs("public/users/$id", $file_name);
            $user->image = $file_name;
        }

        $user->name = $data["name"];
        $user->email = $data["email"];
        if (!empty($data["password"])) {
            $user->password = Hash::make($data["password"]);
        }
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
