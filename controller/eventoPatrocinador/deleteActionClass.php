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
class deleteActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {

                
                $id = request::getInstance()->getPost(eventoPatrocinadorTableClass::getNameField(eventoPatrocinadorTableClass::ID, true));

                
                $ids = array(
                    
                    eventoPatrocinadorTableClass::ID => $id
                
                        );
                
                eventoPatrocinadorTableClass::delete($ids, true);
                
                 $this->arrayAjax = array(
                    'code' => 100,
                    'msg' => 'La eliminacion fue exitosa'
                );
                $this->defineView('delete', 'eventoPatrocinador', session::getInstance()->getFormatOutput());

                session::getInstance()->setSuccess('El registro fue eliminado exitosamente');
           
                } else {
                
                    routing::getInstance()->redirect('eventoPatrocinador', 'index');
            
                    
                }
          } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
