<?php
use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\editPqrsValidatorClass as validator;
/**
 * @description: En esta clase se llaman  las consultas de la bd
 * @author: 
 * Shirley Marcela Rivero <marce250494@hotmail.com>
 * Kelly Andrea Manzano <kellinandrea18@hotmail.com>
 * Diana Marcela Hormiga<dianamarce0294@hotmail.com>
 * @category: Pertenece al controlador modulo Pqrs.
 */
class updateActionClass extends controllerClass implements controllerActionInterface {
  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {
        $id = request::getInstance()->getPost(pqrsTableClass::getNameField(pqrsTableClass::ID, true));
        $titulo = request::getInstance()->getPost(pqrsTableClass::getNameField(pqrsTableClass::TITULO, true));
        $contenido = request::getInstance()->getPost(pqrsTableClass::getNameField(pqrsTableClass::CONTENIDO, true));
        $tipo = request::getInstance()->getPost(pqrsTableClass::getNameField(pqrsTableClass::TIPO_PQRS, true));
        $estado = request::getInstance()->getPost(pqrsTableClass::getNameField(pqrsTableClass::ESTADO_PQRS, true));
        $respuesta=request::getInstance()->getPost(detallePqrsTableClass::getNameField(detallePqrsTableClass::RESPUESTA, true));
        $ids = array(
            pqrsTableClass::ID => $id
        );
        validator::validateEdit($titulo, $contenido, $tipo, $estado,$respuesta, $id);
        $data = array(
            pqrsTableClass::ESTADO_PQRS => $estado
        );
        $ids2= array(
            detallePqrsTableClass::PQRS_ID => $id
        );
        $data2 = array(
            
            detallePqrsTableClass::RESPUESTA => $respuesta
        );
        pqrsTableClass::update($ids, $data);
        detallePqrsTableClass::update($ids2, $data2);
      }
      routing::getInstance()->redirect('pqrs', 'index');
    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo '<pre>';
      print_r($exc->getTrace());
      echo '</pre>';
    }
  }
}