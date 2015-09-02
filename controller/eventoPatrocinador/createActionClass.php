<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\createEventoPatrocinadorValidatorClass as validator;

/**
 * Description of ejemploClass
 *
 * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
 */
class createActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {
             $eventSponsor= request::getInstance()->getPost(eventoPatrocinadorTableClass::getNameField(eventoPatrocinadorTableClass::EVENTO_ID, true));
             $sponsor = request::getInstance()->getPost(eventoPatrocinadorTableClass::getNameField(eventoPatrocinadorTableClass::PATROCINADOR_ID, true));
             
    validator::validateInsert($eventSponsor, $sponsor);

        $data = array(
        eventoPatrocinadorTableClass::EVENTO_ID => $eventSponsor,
        eventoPatrocinadorTableClass::PATROCINADOR_ID => $sponsor 
        );
        eventoPatrocinadorTableClass::insert($data);
        routing::getInstance()->redirect('eventoPatrocinador', 'index');
    } else {
        routing::getInstance()->redirect('eventoPatrocinador', 'index');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }


private function validate($eventSponsor,$sponsor,$event){
}
}