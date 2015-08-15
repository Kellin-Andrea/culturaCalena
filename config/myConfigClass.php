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
    
    public static function getFileSizeAvatar(){
        return  '200000';
    }
    
//    public static function setFileSizeAvatar($sizeFile){
//        self:: $sizeFile;
//    }
}

}