<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected static function getReturnData()
    {
        $user = auth()->user();
        return [
            'user'   => $user,
            'define' => ["PUBLIC_PATH" => parent::PUBLIC_PATH]
        ];
    }

    public function index()
    {
        $data = self::getReturnData();
        return view("admin.home",$data);
    }
}
