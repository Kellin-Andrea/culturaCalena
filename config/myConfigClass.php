<?php

namespace mvc\config {

  use mvc\config\configClass;
  
  /**
   * Description of myConfigClass
   *
   * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
   */
  class myConfigClass extends configClass {
 
    const CREDENCIAL_USUARIO = 2;
    
    private static $fileSizeAvatar;
    
    static public function getFileSizeAvatar() {
      return self::$fileSizeAvatar;
    }

    static public function setFileSizeAvatar($fileSizeAvatar) {
      self::$fileSizeAvatar = $fileSizeAvatar;
    }
}

}