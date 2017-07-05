<?php

namespace App\Helpers;

class Upload
{
    public function uploadImg($filename)
    {
        if(isset($_FILES[$filename]))
        {
            date_default_timezone_set("Brazil/East");

            $ext = strtolower(substr($_FILES[$filename]['name'],-4));
            $new_name = date("Y.m.d-H.i.s") . $ext;

            $dir = __DIR__ . "/../../public/assets/imgs/";

            move_uploaded_file($_FILES[$filename]['tmp_name'], $dir.$new_name);

            return $new_name;
        }
    }
}