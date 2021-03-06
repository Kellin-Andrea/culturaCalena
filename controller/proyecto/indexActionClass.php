<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of ejemploClass
 *
 * @author kelly andrea manzano <kellinandrea18@hotmail.com>
 */
class indexActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {


    try {


         $page = 0;


      if (request::getInstance()->hasGet('page')) {
        $this->page = request::getInstance()->getGet('page');
        $page = request::getInstance()->getGet('page') - 1;
        $page = $page * config::getRowGridProyect();
      }


      $objProyecto = eventoTableClass::getEventProyect(config::getRowGridProyect(), $page);


      $arrayEvento = array();
      $x = 0;
      $y = 0;
      foreach ($objProyecto as $key => $dato) {
        $arrayEvento[$x][$y]['key'] = $key;
        $arrayEvento[$x][$y]['imagen'] = routing::getInstance()->getUrlImgUpload($dato->imagen);
        $arrayEvento[$x][$y]['name'] = $dato->evento;
        $y++;
        if ($y === 3) {
          $y = 0;
          $x++;
        }
      }

      $this->objCategoria2 = eventoTableClass::getEventoCategoria();
      $this->cntPages = eventoTableClass::getTotalProyect(config::getRowGridProyect());
      $this->arrayEvento = $arrayEvento;
      $this->objProyecto = $objProyecto;


      $this->defineView('index', 'proyecto', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
