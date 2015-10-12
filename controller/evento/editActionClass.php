<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\editEventoValidatorClass as validator;

/**
 * @description: En esta clase se llaman  las consultas de la bd
 * @author: 
 * Shirley Marcela Rivero <marce250494@hotmail.com>
 * Kelly Andrea Manzano <kellinandrea18@hotmail.com>
 * Diana Marcela Hormiga<dianamarce0294@hotmail.com>
 * @category: Pertenece al controlador modulo evento.
 */

class editActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->hasGet(eventoTableClass::ID)) {
        $fields = array(
         
        eventoTableClass::ID,
        eventoTableClass::IMAGEN,
        eventoTableClass::NOMBRE,
        eventoTableClass::DESCRIPCION,
        eventoTableClass::FECHA_INICIAL_EVENTO,
        eventoTableClass::FECHA_FINAL_EVENTO,
        eventoTableClass::DIRECCION,
        eventoTableClass::COSTO,
        eventoTableClass::CATEGORIA_ID,
        eventoTableClass::FECHA_INICIAL_PUBLICACION,
        eventoTableClass::FECHA_FINAL_PUBLICACION,
        eventoTableClass::LUGAR_LATITUD,
        eventoTableClass::LUGAR_LONGITUD
        );
        

        $where = array(
            eventoTableClass::ID => request::getInstance()->getGet(eventoTableClass::ID)
        );
        
         $fields1 = array(
                    categoriaTableClass::ID,
                    categoriaTableClass::NOMBRE
                );
                $ordeBy1 = array(
                categoriaTableClass::NOMBRE
                
                );  
        session::getInstance()->setSuccess('Los datos del evento fueron modificados exitosamente');        
        $this->objcategoria = categoriaTableClass::getAll($fields1, true, $ordeBy1, 'ASC');
        $this->objevento = eventoTableClass::getAll($fields, true, null, null, null, null, $where);
        $this->defineView('edit', 'evento', session::getInstance()->getFormatOutput());
         
      } else {
        routing::getInstance()->redirect('evento', 'index');
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
