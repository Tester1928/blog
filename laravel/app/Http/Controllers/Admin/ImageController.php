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
use function PHPUnit\Framework\directoryExists;

class ImageController extends Controller
{
    const PATH = [
        "all"    => 'upload',
        "avatar" => "users/avatars",
    ];

    public static function defines()
    {
        return [
            "public_path" =>$_SERVER["DOCUMENT_ROOT"] . "/laravel/public/"
        ];
    }

    public function add($key_name, $name_path, $user_id, $width = 500, $height = 500)
    {
        $defines = self::defines();

        if (self::PATH[$name_path]) {
            $add_path = self::PATH[$name_path];
        }
        else {
            $add_path = self::PATH['all'];
        }
        $image = \request()->file($key_name);

        if ($image) {
            $file_name = $image->getClientOriginalName();
            $dir_path = "storage/$add_path/$user_id/";
            $path = public_path($dir_path . $file_name);

            if (!is_dir($defines["public_path"] . $dir_path)) {
                mkdir($defines["public_path"] . $dir_path, 0644, true);
            }

            $img = Image::make($image->getRealPath())->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img->save($path);
            return $dir_path . $file_name;
        }
        return false;
    }

}
