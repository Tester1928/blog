<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
class ProfileController extends Controller
{
    public function index()
    {
        $files = Storage::allFiles();

        $user = auth()->user();

        return view("admin.profile", ['user'=>$user,'define'=>$this->define]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        $data = \request()->validate([
            "name"     => 'required|min:4|string|max:255',
            "email"    => 'required|string|email|max:255|unique:users,email,' . $user->id,
            "password" => request()->get('password') ? "required|string|min:8" : '',
        ]);

        $image_path = ImageController ::add('avatar','avatar',$user->id,200);
        if($image_path){
            $user->image = $image_path;
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
