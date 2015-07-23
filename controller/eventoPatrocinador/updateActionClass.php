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
class updateActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {

        $id = request::getInstance()->getPost(eventoPatrocinadorTableClass::getNameField(eventoPatrocinadorTableClass::ID, true));
        $patrocinador_id = request::getInstance()->getPost(eventoPatrocinadorTableClass::getNameField(eventoPatrocinadorTableClass::PATROCINADOR_ID, true));
        $evento_id = request::getInstance()->getPost(eventoPatrocinadorTableClass::getNameField(eventoPatrocinadorTableClass::EVENTO_ID, true));

        $ids = array(
        eventoPatrocinadorTableClass::ID => $id
        );

        $data = array(
        eventoPatrocinadorTableClass::PATROCINADOR_ID => $patrocinador_id,
            eventoPatrocinadorTableClass::EVENTO_ID=> $evento_id
        );

        eventoPatrocinadorTableClass::update($ids, $data);
      }

      routing::getInstance()->redirect('eventoPatrocinador', 'index');
      } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
