<?php

namespace App\Html;

use App\Http\Controllers\Admin\AdminController;

class Admin extends AdminController
{
    public static function imageHtml($imgPath="",$type,$returnDivUploadContainer = true)
    {
        $type = mb_strtolower($type);
        $data = self::getReturnData();
        if($imgPath){

            $arImgPath = explode("/",$imgPath);
            $fileName = end($arImgPath);
            if (strpos($imgPath, $data["define"]["PUBLIC_PATH"]) === false) {
                $imgPath = $data["define"]["PUBLIC_PATH"] . $imgPath;
            }

            if (strpos($imgPath, $_SERVER["DOCUMENT_ROOT"]) === false) {
                if ($imgPath[0] != "/") {
                    $imgPath = "/" . $imgPath;
                }
                $imgPath = $_SERVER["DOCUMENT_ROOT"] . $imgPath;
            }
        }

        if($returnDivUploadContainer){
            $html = "<div id='upload-container'>
                    <div class='upload-image-wrap'>";
        }else{
            $html = "<div class='upload-image-wrap'>";
        }

        if (file_exists($imgPath) && $imgPath) {
            $publicImgPath = str_replace($_SERVER["DOCUMENT_ROOT"],"",$imgPath);
            $html .= "<img class='load-photo' src='{$publicImgPath}'>
                    </div>";
            $html .="<div class='wrap-file-name'>
                        <span class='sp-file-name'>{$fileName}
                           <span class='ti-close' id='close-file' data-type='delete".ucwords($type)."' ></span >
                        </span >
                     </div >
                    <div class='wrap-file-input'>
                        <input id='file-input' type='file' name='{$type}'>
                    </div >";
        }else{
            $html .= "<img class='no-photo' src='https://habrastorage.org/webt/dr/qg/cs/drqgcsoh1mosho2swyk3kk_mtwi.png'></div>";
            $html .="<div class='wrap-file-input'>
                        <input id='file-input' type='file' name='{$type}'>
                        <label for='file-input'> Выберите файл </label>
                        <span class='sp-block' > или перетащите его сюда </span >
                     </div >";
        }
        if($returnDivUploadContainer){
            $html .= "</div>";
        }

        echo htmlspecialchars_decode($html);
    }

}
