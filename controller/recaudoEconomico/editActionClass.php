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
            if (request::getInstance()->hasRequest(recaudoEconomicoTableClass::ID)) {
                $fields = array(
                    recaudoEconomicoTableClass::ID,
                    recaudoEconomicoTableClass::USUARIO_ID,
                    recaudoEconomicoTableClass::EVENTO_ID,
                    recaudoEconomicoTableClass::OBSERVACION,
                    recaudoEconomicoTableClass::TARIFA_ID,
                    recaudoEconomicoTableClass::VALOR_PARCIAL,
                    recaudoEconomicoTableClass::VALOR_TOTAL
                );



                $where = array(
                    recaudoEconomicoTableClass::ID => request::getInstance()->getRequest(recaudoEconomicoTableClass::ID)
                );

                $fields1 = array(
                    eventoTableClass::ID,
                    eventoTableClass::NOMBRE
                );
                $ordeBy1 = array( 
                eventoTableClass::NOMBRE
                );
                
                 $fields2 = array(
                     usuarioTableClass::ID,
                     usuarioTableClass::USER
                );
                $ordeBy2 = array( 
                    usuarioTableClass::USER
                );
                
                 $fields3 = array(
                     tarifaTableClass::ID,
                     tarifaTableClass::DESCRIPCION
                );
                $ordeBy3 = array( 
                    tarifaTableClass::DESCRIPCION
                );
                
                $this->objevento = eventoTableClass::getAll($fields1, true, $ordeBy1, 'ASC');
                $this->objUsuarios = usuarioTableClass::getAll($fields2, true, $ordeBy2, 'ASC');
                $this->objtarifa = tarifaTableClass::getAll($fields3, true, $ordeBy3, 'ASC');
                $this->objrecaudoEconomico = recaudoEconomicoTableClass::getAll($fields, true, null, null, null, null, $where);
                $this->defineView('edit', 'recaudoEconomico', session::getInstance()->getFormatOutput());
            } else {
                routing::getInstance()->redirect('recaudoEconomico', 'index');
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
