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
class reportActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      $fields = array(
          usuarioTableClass::ID,
          usuarioTableClass::USER,
          usuarioTableClass::CREATED_AT,
          usuarioTableClass::LAST_LOGIN_AT,
          usuarioTableClass::DELETED_AT,
          usuarioTableClass::UPDATED_AT
      );
      $orderBy = array(
          usuarioTableClass::USER
      );

      $this->objUsuarios = usuarioTableClass::getAll($fields, true, $orderBy, 'ASC');
      $this->defineView('index', 'default', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
