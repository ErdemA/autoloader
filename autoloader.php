<?php

/**
 * Projelerinizde kullanılan sınıfları çağrırken çalışmasını istediğiniz metotları belirleyebilirsiniz.
 * Aynı zamanda bu sınıfları include etmeniz gerek yoktur, sadece kullanılan sınıfları aynı dizinin altında tutmanız yeterli olacaktır. 
 */

/**
 * @author Enes Gür <enesaligur@gmail.com>
 * @link http://enesgur.com.tr
 * @link https://github.com/enesgur/autoloader
 * @license MIT
 * @version 1.0
 */
class Autoloader
{
  /**
   * @var $class object
   */
  public static $class;

  /**
   * @param string $class sınıfın ismi gelir.
   * Sınıfı yükleyip başlatan birleştirici metot.
   * @method classFile() sınıfın dosyasını belirler.
   * @method classFolder() sınıfın yükleneceği dizin.
   * @method classInclude() sınıfı include eder.
   * @method classInıt() sınıf çağrıldığında çalışacak ilk metot.
   */
  public static function classLoader($class)
  { 
    self::$class = new stdClass();
    self::$class->class = $class;

    self::classFile();
    self::classFolder();
    self::classInclude();
    self::classInit();
  }

  /**
   * Sınıfa ait dosyanın ismini oluşturur.
   * Namespace'den sınıfın ismini ayırır.
   * Sınıfın ismi ile dosya ismi aynı olmalıdır.
   */
  public static function classFile()
  {
    $classFile  = end(explode("\\", self::$class->class));
    $classFile  = mb_strtolower($classFile).'.php';    
    
    self::$class->file = $classFile; 
  }

  /**
   * Sınıfın tutulduğu dizin.
   */
  public static function classFolder()
  {
    self::$class->dir = __dir__.'/classes/';
  }

  /**
   * Sınıfı include eder.
   * Sınıf yoksa $class->exists = false
   */
  public static function classInclude()
  {
    $filePath = self::$class->dir.self::$class->file;
    if(file_exists($filePath))
    {
      include($filePath);
      self::$class->exists = true;
    }
    else
      self::$class->exists = false;
  }

  /**
   * @method _init() Sınıfa ait _init metotunu çalıştırır.
   */
  public static function classInit()
  {
    if(self::$class->exists)
    {
      if(method_exists(self::$class->class,'_init'))
        call_user_func(self::$class->class.'::_init');
      else
        return false;
    }
  }
}

/**
 * Autoloader sınıfını çalıştırır.
 */
spl_autoload_register('Autoloader::classLoader');