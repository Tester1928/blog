<?php

namespace App\Http\Controllers\Admin\Template\Header;

use App\Http\Controllers\Admin\AdminController;

class IndexController extends AdminController
{
   public function __invoke()
   {
       $data = self::getReturnData();
       return view("admin.site.template.header",$data);
   }
}
