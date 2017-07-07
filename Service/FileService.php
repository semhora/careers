<?php

namespace Service;

class FileService
{

    public function uploadImage($file)
    {
        $newImg = "public/imagens/{$this->generateNewName($file)}";

        copy($file['img']['tmp_name'], $newImg);
        unlink($file['img']['tmp_name']);

        return $newImg;
    }

    private function generateNewName($file)
    {
        $nameParts = explode('.', $file['img']['name']);
        $newName   = str_replace('.', '_', microtime(true));
        return $newName . "." . end($nameParts);
    }

}
