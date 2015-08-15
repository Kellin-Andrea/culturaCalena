<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\createrecaudoEconomicoValidatorClass as validator;
/**
 * Description of ejemploClass
 *
 * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
 */
class createActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {
          $usuario_id = request::getInstance()->getPost(recaudoEconomicoTableClass::getNameField(recaudoEconomicoTableClass::USUARIO_ID, true));
          $evento_id = request::getInstance()->getPost(recaudoEconomicoTableClass::getNameField(recaudoEconomicoTableClass::EVENTO_ID, true));
          $observaciones = request::getInstance()->getPost(recaudoEconomicoTableClass::getNameField(recaudoEconomicoTableClass::OBSERVACION, true));
          $tarifa  = request::getInstance()->getPost(recaudoEconomicoTableClass::getNameField(recaudoEconomicoTableClass::TARIFA_ID, true));
          $valor = request::getInstance()->getPost(recaudoEconomicoTableClass::getNameField(recaudoEconomicoTableClass::VALOR_TOTAL, true));
          $parcial = request::getInstance()->getPost(recaudoEconomicoTableClass::getNameField(recaudoEconomicoTableClass::VALOR_PARCIAL, true));
          
          
       

      //  if (strlen($recaudoEconimico) > recaudoEconomicoTableClass::OBSERVACION_LENGTH) {
         // throw new PDOException(i18n::__(00001, null, 'errors', array(':longitud' => recaudoEconomicoTableClass::OBSERVACION_LENGTH)), 00001);
        
      validator::validateInsert($evento_id,$usuario_id, $observaciones, $tarifa, $valor, $parcial);
          
        $data = array(
        recaudoEconomicoTableClass::USUARIO_ID => $usuario_id,
        recaudoEconomicoTableClass::EVENTO_ID=> $evento_id,
        recaudoEconomicoTableClass::OBSERVACION=> $observaciones,
        recaudoEconomicoTableClass::TARIFA_ID=> $tarifa,
        recaudoEconomicoTableClass::VALOR_TOTAL=> $valor,
        recaudoEconomicoTableClass::VALOR_PARCIAL=> $parcial
        );
        recaudoEconomicoTableClass::insert($data);
        routing::getInstance()->redirect('recaudoEconomico', 'index');
      } else {
        routing::getInstance()->redirect('recaudoEconomico', 'index');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}