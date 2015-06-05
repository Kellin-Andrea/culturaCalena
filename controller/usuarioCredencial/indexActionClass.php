<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of ejemploClass
 *
 * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
 */
class indexActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {

      $fields = array(
      usuarioCredencialTableClass::ID,
      usuarioCredencialTableClass::CREDENCIAL_ID
    
      );
      $orderBy = array(
           usuarioCredencialTableClass::CREATED_AT
      );
      
 $where = null;
      if (request::getInstance()->hasGet(usuarioCredencialTableClass::getNameField(usuarioCredencialTableClass::USUARIO_ID, true))) {
        $this->usuario_id = $usuario_id = request::getInstance()->hasGet(usuarioCredencialTableClass::getNameField(usuarioCredencialTableClass::USUARIO_ID, true));
        $where = array(
        usuarioCredencialTableClass::USUARIO_ID => $usuario_id
        );
        
      }
      
      $this->objCredenciales = usuarioCredencialTableClass::getAll($fields, false, $orderBy, 'ASC', null, null, $where);
      $this->defineView('index', 'usuarioCredencial', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
