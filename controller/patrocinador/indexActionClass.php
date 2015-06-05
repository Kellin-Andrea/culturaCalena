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
                patrocinadorTableClass::ID,
                patrocinadorTableClass::NOMBRE,
                patrocinadorTableClass::CREATED_AT,
                patrocinadorTableClass::DIRECCION,
                patrocinadorTableClass::TELEFONO,
                patrocinadorTableClass::CORREO,
                
            );
            $orderBy = array(
                patrocinadorTableClass::ID,
                   
            );
            $this->objpatrocinador= patrocinadorTableClass::getAll($fields, true, $orderBy, 'ASC',4);
            $this->defineView('index', 'patrocinador', session::getInstance()->getFormatOutput());
      } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}