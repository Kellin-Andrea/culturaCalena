<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\createPqrsValidatorClass as validator;

/**
 * @description: En esta clase se llaman  las consultas de la bd
 * @author: 
 * Shirley Marcela Rivero <marce250494@hotmail.com>
 * Kelly Andrea Manzano <kellinandrea18@hotmail.com>
 * Diana Marcela Hormiga<dianamarce0294@hotmail.com>
 * @category: Pertenece al controlador modulo Pqrs.
 */
class createActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {

        $titulo = request::getInstance()->getPost(pqrsTableClass::getNameField(pqrsTableClass::TITULO, true));
        $contenido = request::getInstance()->getPost(pqrsTableClass::getNameField(pqrsTableClass::CONTENIDO, true));
        $tipo = request::getInstance()->getPost(pqrsTableClass::getNameField(pqrsTableClass::TIPO_PQRS, true));
        $estado = 1;
        $respuesta = i18n::__('in_process');
        $usuarioID = session::getInstance()->getUserId();


        validator::validateInsert($titulo, $contenido, $tipo, $estado);

        $data = array(
            pqrsTableClass::TITULO => $titulo,
            pqrsTableClass::CONTENIDO => $contenido,
            pqrsTableClass::TIPO_PQRS => $tipo,
            pqrsTableClass::ESTADO_PQRS => $estado,
            pqrsTableClass::USUARIO_ID => $usuarioID,
            '__sequence' => 'pqrs_id_seq'
        );

        $pqrs_id = pqrsTableClass::insert($data);

        $data2 = array(
            detallePqrsTableClass::PQRS_ID => $pqrs_id,
            detallePqrsTableClass::RESPUESTA => $respuesta,
            detallePqrsTableClass::USUARIO_ID => $usuarioID
        );

        detallePqrsTableClass::insert($data2);

        routing::getInstance()->redirect('profile', 'index');
      } else {
        routing::getInstance()->redirect('profile', 'index');
      }
    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo '<pre>';
      print_r($exc->getTrace());
      echo '</pre>';
    }
  }

}
