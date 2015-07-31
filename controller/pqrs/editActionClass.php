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
 * @category: Pertenece al controlador modulo Pqrs.
 */
class editActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->hasGet(pqrsTableClass::ID)) {
                $fields = array(
                    pqrsTableClass::ID,
                    pqrsTableClass::TITULO,
                    pqrsTableClass::CONTENIDO,
                    pqrsTableClass::TIPO_PQRS,
                    pqrsTableClass::ESTADO_PQRS
                );
                $where = array(
                    pqrsTableClass::ID => request::getInstance()->getGet(pqrsTableClass::ID)
                );

                $fields2 = array(
                    tipoPqrsTableClass::ID,
                    tipoPqrsTableClass::NOMBRE
                );
                $ordeBy = array(
                tipoPqrsTableClass::NOMBRE
                );
                
                $fields1 = array(
                    estadoPqrsTableClass::ID,
                    estadoPqrsTableClass::NOMBRE
                );
                $ordeBy1 = array(
                estadoPqrsTableClass::NOMBRE
                
                );
                $this->objtipoPqrs = tipoPqrsTableClass::getAll($fields2, true, $ordeBy, 'ASC');
                $this->objestado = estadoPqrsTableClass::getAll($fields1, true, $ordeBy1, 'ASC');
                $this->objpqrs = pqrsTableClass::getAll($fields, true, null, null, null, null, $where);
                $this->defineView('edit', 'pqrs', session::getInstance()->getFormatOutput());
            } else {
                routing::getInstance()->redirect('pqrs', 'index');
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
            echo $exc->getMessage();
            echo '<br>';
            echo '<pre>';
            print_r($exc->getTrace());
            echo '</pre>';
        }
    }

}
