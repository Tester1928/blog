<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view("admin.profile",compact('user'));
    }
    public function edit(User $user){
      $data = \request()->validate([
          "name"=>"",
          "email"=>"",
          "password"=>"",
      ]);
      if(empty($data["password"])){
          unset($data["password"]);
      }
        $result = $user->update($data);
        return redirect('admin/profile/');

    }
    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}
