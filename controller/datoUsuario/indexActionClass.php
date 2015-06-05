<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * @description: En esta clase se llaman  las consultas de la bd
 * @author: 
 * Shirley Marcela Rivero <marce250494@hotmail.com>
 * Kelly Andrea Manzano <kellinandrea18@hotmail.com>
 * Diana Marcela Hormiga<dianamarce0294@hotmail.com>
 * @category: Pertenece al controlador modulo datoUsuario .
 */
class indexActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
         
      $fields = array(
          datoUsuarioTableClass::ID,
          datoUsuarioTableClass::NOMBRE,
          datoUsuarioTableClass::APELLIDO,
          datoUsuarioTableClass::CORREO,
          datoUsuarioTableClass::GENERO,
          datoUsuarioTableClass::FECHA_NACIMIENTO,
          datoUsuarioTableClass::LOCALIDAD_ID,
          datoUsuarioTableClass::TIPO_DOCUMENTO_ID,
          datoUsuarioTableClass::ORGANIZACION_ID,
          datoUsuarioTableClass::USUARIO_ID,
          datoUsuarioTableClass::CREATED_AT
      );

      $orderBy = array(
        datoUsuarioTableClass::NOMBRE,
       
      );

     
      $this->objdatos = datoUsuarioTableClass::getAll($fields, true, $orderBy, 'ASC');
      $this->defineView('index', 'datoUsuario', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
