<?php

namespace App\Http\Controllers\Admin\Pages\Home;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
   public function __invoke(){
       dd("tester");
   }
}
