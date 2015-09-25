<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of ejemploClass
 *
 * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
 */
class indexActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      
      
      $where = null;
      
      $fields = array(
          usuarioGustaCategoriaTableClass::ID,
          usuarioGustaCategoriaTableClass::USUARIO_ID,
          usuarioGustaCategoriaTableClass::CATEGORIA_ID,
          usuarioGustaCategoriaTableClass::CREATED_AT
      );
      $orderBy = array(
          usuarioGustaCategoriaTableClass::USUARIO_ID
      );
      
      $page = 0;
            if (request::getInstance()->hasGet('page')) {
                $this->page = request::getInstance()->getGet('page');
                $page = request::getInstance()->getGet('page') - 1;
                $page = $page * config::getRowGrid();
            }


      $this->cntPages = usuarioGustaCategoriaTableClass::getTotalpages(config::getRowGrid(), $where);
      $this->objusgusca = usuarioGustaCategoriaTableClass::getAll($fields, false, $orderBy, 'ASC', config::getRowGrid(), $page, $where);
      $this->defineView('index', 'usuarioGustaCategoria', session::getInstance()->getFormatOutput());
      } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
