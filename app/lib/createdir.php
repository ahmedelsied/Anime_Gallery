<?php
namespace lib;
trait createdir
{
    public function create_anime_folder($dir)
    {
        !file_exists('public/uploads/'.$dir) ? mkdir(UPLOADS_FOLDER.$dir, 0777) : false;
    }
}