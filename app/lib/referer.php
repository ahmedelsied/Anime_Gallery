<?php
namespace lib;
trait referer
{
    public $mainURL;
    public function referer()
    {
        $this->mainURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/gallery/";
        $Href = [
            $this->mainURL.'admin_hash_login',
            $this->mainURL.'admin_hash_login/',
            $this->mainURL.'admin_hash_login/default',
            $this->mainURL.'admin_hash_login/default/',
            $this->mainURL.'admin_hash_add_anime',
            $this->mainURL.'admin_hash_add_anime/',
            $this->mainURL.'admin_hash_add_anime/default',
            $this->mainURL.'admin_hash_add_anime/default/',
            $this->mainURL.'admin_hash_add_img',
            $this->mainURL.'admin_hash_add_img/',
            $this->mainURL.'admin_hash_add_img/default',
            $this->mainURL.'admin_hash_add_img/default/',
        ];
        return $Href;
    }
}