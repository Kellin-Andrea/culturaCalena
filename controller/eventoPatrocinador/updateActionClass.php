<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\editEventoPatrocinadorValidatorClass as validator;

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
        $sponsor = request::getInstance()->getPost(eventoPatrocinadorTableClass::getNameField(eventoPatrocinadorTableClass::PATROCINADOR_ID, true));
        $eventSponsor = request::getInstance()->getPost(eventoPatrocinadorTableClass::getNameField(eventoPatrocinadorTableClass::EVENTO_ID, true));

        $ids = array(
            eventoPatrocinadorTableClass::ID => $id
        );
        
        validator::validateEdit($eventSponsor, $sponsor,$id);

        $data = array(
            eventoPatrocinadorTableClass::PATROCINADOR_ID => $sponsor,
            eventoPatrocinadorTableClass::EVENTO_ID => $eventSponsor
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
