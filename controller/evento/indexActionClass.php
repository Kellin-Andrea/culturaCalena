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
 * @category: Pertenece al controlador modulo evento.
 */

class indexActionClass extends controllerClass implements controllerActionInterface {
  public function execute() {
    try {
      $where = null;
        
        $fields = array(
          eventoTableClass::ID,
          eventoTableClass::IMAGEN,
          eventoTableClass::NOMBRE,
          eventoTableClass::DESCRIPCION,
          eventoTableClass::FECHA_INICIAL_EVENTO,
          eventoTableClass::FECHA_FINAL_EVENTO,
          eventoTableClass::LUGAR_LATITUD,
          eventoTableClass::LUGAR_LONGITUD,
          eventoTableClass::DIRECCION,
          eventoTableClass::COSTO,
          eventoTableClass::USUARIO_ID,
          eventoTableClass::CATEGORIA_ID,
          eventoTableClass::FECHA_INICIAL_PUBLICACION,
          eventoTableClass::FECHA_FINAL_PUBLICACION,
          eventoTableClass::CREATED_AT
      );
      $orderBy = array(
          eventoTableClass::NOMBRE
      );
      $page = 0;
            if (request::getInstance()->hasGet('page')) {
                $this->page = request::getInstance()->getGet('page');
                $page = request::getInstance()->getGet('page') - 1;
                $page = $page * config::getRowGrid();
            }
      
      $this->cntPages = eventoTableClass::getTotalpages(config::getRowGrid(), $where);
      $this->objEvento = eventoTableClass::getAll($fields, true, $orderBy, 'ASC',config::getRowGrid(), $page, $where);
      $this->defineView('index', 'evento', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }
}