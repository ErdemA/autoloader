<?php

//Sayfanın UTF8 olarak yorumlanmasını istedim.
header('Content-type:text/html; Charset=utf8');

//Autoloader fonksiyonunu içeren dosyayı çağırdım.
include('autoloader.php');

/**
 * Example1 sınıfına ait test metotunu çalıştırır.
 * Bu sınıfı çağrıldı anda _init metotu çalışacaktır.
 */
classes\Example1\Example1::test();
echo "<br />";
classes\Example2\Example2::test();