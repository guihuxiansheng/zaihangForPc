<?php
namespace app\index\controller;

class Index extends Islogin
{
    public function index()
    {
        return $this->fetch();
    }
}
