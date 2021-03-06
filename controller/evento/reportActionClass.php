<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * @description: En esta clase se llaman  las consultas de la bd
 * @author: 
 * Shirley Marcela Rivero <marce250494@hotmail.com>
 * Kelly Andrea Manzano <kellinandrea18@hotmail.com>
 * Diana Marcela Hormiga<dianamarce0294@hotmail.com>
 * @category: Pertenece al controlador modulo datoUsuario .
 */
class reportActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {

      $data = request::getInstance()->getPost('filter');
      $idCate = $data['categoria'];
      $fechaInicial = $data['fechaPublicacion1'];
      $fechaFinal = $data['fechaPublicacion2'];
      
      session::getInstance()->setAttribute('idCate', $idCate);
      session::getInstance()->setAttribute('fechaInicial', $fechaInicial);
      session::getInstance()->setAttribute('fechaFinal', $fechaFinal);
      
//      $idCate = session::getInstance()->getAttribute('idCate');
//      $fechaInicial = session::getInstance()->getAttribute('fechaInicial');
//      $fechaFinal = session::getInstance()->getAttribute('fechaFinal');

      $fields = array(
          eventoTableClass::ID,
          eventoTableClass::NOMBRE,
          eventoTableClass::DESCRIPCION,
          eventoTableClass::FECHA_INICIAL_EVENTO,
          eventoTableClass::FECHA_FINAL_EVENTO,
          eventoTableClass::FECHA_INICIAL_PUBLICACION,
          eventoTableClass::FECHA_FINAL_PUBLICACION
      );
      $orderBy = array(
          eventoTableClass::NOMBRE
      );

      $this->objEvento = eventoTableClass::getEventoReport($idCate, $fechaInicial, $fechaFinal);
      $this->defineView('reporte', 'reporte', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
