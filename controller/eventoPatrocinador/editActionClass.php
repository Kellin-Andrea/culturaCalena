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
class editActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->hasGet(eventoPatrocinadorTableClass::ID)) {


                $fields = array(
                    eventoPatrocinadorTableClass::ID,
                    eventoPatrocinadorTableClass::PATROCINADOR_ID,
                    eventoPatrocinadorTableClass::EVENTO_ID
                );
                $where = array(
                    eventoPatrocinadorTableClass::ID => request::getInstance()->getGet(eventoPatrocinadorTableClass::ID)
                );
                $fields2 = array(
                    eventoTableClass::ID,
                    eventoTableClass::NOMBRE
                );
                $ordeBy = array(
                    eventoTableClass::NOMBRE
                );
                $fields1 = array(
                    patrocinadorTableClass::ID,
                    patrocinadorTableClass::NOMBRE
                );
                $ordeBy1 = array(
                    patrocinadorTableClass::NOMBRE
                );

                $this->objEvento = eventoTableClass::getAll($fields2, true, $ordeBy, 'ASC');
                $this->objPatrocinador = patrocinadorTableClass::getAll($fields1, true, $ordeBy1, 'ASC');
                $this->objEventoPatrocinador = eventoPatrocinadorTableClass::getAll($fields, true, null, null, null, null, $where);



                session::getInstance()->setSuccess('Los datos fueron modificados exitosamente');
                $this->defineView('edit', 'eventoPatrocinador', session::getInstance()->getFormatOutput());
            } else {
                routing::getInstance()->redirect('eventoPatrocinador', 'index');
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
