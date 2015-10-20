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
class categoriaActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {


    try {


      $idCategoria = request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::CATEGORIA_ID, true));


      $page = 0;


      if (request::getInstance()->hasGet('page')) {
        $this->page = request::getInstance()->getGet('page');
        $page = request::getInstance()->getGet('page') - 1;
        $page = $page * config::getRowGridProyect();
      }


      $objProyecto = eventoTableClass::getEventProyectCategoria(config::getRowGridProyect(), $page, $idCategoria);
      $this->cntPages = eventoTableClass::getTotalProyectCategoria(config::getRowGridProyect(), $idCategoria);
  
              
      $arrayEvento = array();
      $x = 0;
      $y = 0;
      foreach ($objProyecto as $key => $dato) {
        $arrayEvento[$x][$y]['key'] = $key;
        $arrayEvento[$x][$y]['imagen'] = routing::getInstance()->getUrlImgUpload($dato->imagen);
        $y++;
        if ($y === 3) {
          $y = 0;
          $x++;
        }
      }

      $this->objCategoria2 = eventoTableClass::getEventoCategoria();

      $this->arrayEvento = $arrayEvento;
      $this->objProyecto = $objProyecto;


      $this->defineView('categoria', 'proyecto', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
