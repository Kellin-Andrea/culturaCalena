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
 * @author diana marcela <dianamarce0294@hotmail.com>
 */
class indexActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {

            $fields = array(
                organizacionTableClass::ID,
                organizacionTableClass::NOMBRE,
                organizacionTableClass::CREATED_AT,
                organizacionTableClass::DIRECCION,
                organizacionTableClass::TELEFONO,
                organizacionTableClass::FAX,
                organizacionTableClass::CORREO,
                organizacionTableClass::PAGINA_WEB
            );
            $orderBy = array(
                organizacionTableClass::NOMBRE,
                   
            );
            $this->objorganizacion = organizacionTableClass::getAll($fields, true, $orderBy, 'ASC');
            $this->defineView('index', 'organizacion', session::getInstance()->getFormatOutput());
       } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
