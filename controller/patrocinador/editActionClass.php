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
* @author diana marcela <dianamarce0294@hotmail.com>
 */
class editActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->hasGet(patrocinadorTableClass::ID)) {
        $fields = array(
            patrocinadorTableClass::ID,
            patrocinadorTableClass::NOMBRE,
            patrocinadorTableClass::DIRECCION,
            patrocinadorTableClass::TELEFONO,
            patrocinadorTableClass::CORREO,
           
            
        );
        $where = array(
        patrocinadorTableClass::ID => request::getInstance()->getGet(patrocinadorTableClass::ID)
        );
        session::getInstance()->setSuccess('Los datos fueron modificados exitosamente');
        session::getInstance()->setFlash('edit',true);
        
        $this->objpatrocinador = patrocinadorTableClass::getAll($fields, true, null, null, null, null, $where);
        $this->defineView('edit', 'patrocinador', session::getInstance()->getFormatOutput());
      } else {
        routing::getInstance()->redirect('patrocinador', 'index');
      }
//      if (request::getInstance()->isMethod('POST')) {
//
//        $usuario = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::USUARIO, true));
//        $password = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true));
//
//        if (strlen($usuario) > usuarioTableClass::USUARIO_LENGTH) {
//          throw new PDOException(i18n::__(00001, null, 'errors', array(':longitud' => usuarioTableClass::USUARIO_LENGTH)), 00001);
//        }
//
//        $data = array(
//            usuarioTableClass::USUARIO => $usuario,
//            usuarioTableClass::PASSWORD => md5($password)
//        );
//        usuarioTableClass::insert($data);
//        routing::getInstance()->redirect('default', 'index');
//      } else {
//        routing::getInstance()->redirect('default', 'index');
//      }
      } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
