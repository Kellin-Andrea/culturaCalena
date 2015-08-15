<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\editrecaudoEconomicoValidatorClass as validator;
/**
 * Description of ejemploClass
 *
 * @author DIANA MARCELA <dianamarce0204@hotmail.com>
 */
class updateActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {

        $id = request::getInstance()->getPost(recaudoEconomicoTableClass::getNameField(recaudoEconomicoTableClass::ID, true));
        $observaciones = request::getInstance()->getPost(recaudoEconomicoTableClass::getNameField(recaudoEconomicoTableClass::OBSERVACION, true));
        $valor = request::getInstance()->getPost(recaudoEconomicoTableClass::getNameField(recaudoEconomicoTableClass::VALOR_TOTAL, true));
        $parcial = request::getInstance()->getPost(recaudoEconomicoTableClass::getNameField(recaudoEconomicoTableClass::VALOR_PARCIAL, true));

        validator::validateEdit($evento_id,$usuario_id, $observaciones, $tarifa, $valor, $parcial,$id);
        
        $ids = array(
        recaudoEconomicoTableClass::ID => $id
        );

        $data = array(
      
        recaudoEconomicoTableClass::OBSERVACION => $observaciones,
        recaudoEconomicoTableClass::VALOR_TOTAL => $valor,
        recaudoEconomicoTableClass::VALOR_PARCIAL => $parcial
        );

        recaudoEconomicoTableClass::update($ids, $data);
      }

      routing::getInstance()->redirect('recaudoEconomico', 'index');
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
