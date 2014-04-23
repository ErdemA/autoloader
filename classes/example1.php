<?php

namespace classes\Example1;

class Example1
{
    public static function _init()
    {
        echo "Sınıf başlatıldı.<br />Sınıf adı: ".__class__;
    }

    public static function test()
    {
        echo "<br />".__method__;
    }
}