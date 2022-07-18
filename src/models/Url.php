<?php
namespace d17030752\Blog\models;

class Url{
    public static function getRootPath(){
     return substr(__DIR__ , 0 , strpos(__DIR__,'src') + 3);
    }
}