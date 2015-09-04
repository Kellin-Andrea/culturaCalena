<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\createOrganizacionValidatorClass as validator;
/**
 * Description of ejemploClass
 *
 * @author diana marcela <dianamarce0294@hotmail.com>
 */
class createActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {

                $nombre = request::getInstance()->getPost(organizacionTableClass::getNameField(organizacionTableClass::NOMBRE, true));
                $direccion = request::getInstance()->getPost(organizacionTableClass::getNameField(organizacionTableClass::DIRECCION, true));
                $telefono = request::getInstance()->getPost(organizacionTableClass::getNameField(organizacionTableClass::TELEFONO, true));
                $fax = request::getInstance()->getPost(organizacionTableClass::getNameField(organizacionTableClass::FAX, true));
                $mail = request::getInstance()->getPost(organizacionTableClass::getNameField(organizacionTableClass::CORREO, true));
                $paginaWeb = request::getInstance()->getPost(organizacionTableClass::getNameField(organizacionTableClass::PAGINA_WEB, true));


      //          if (strlen($organizacion) > organizacionTableClass::USER_LENGTH) {
//                    throw new PDOException(i18n::__(00001, null, 'errors', array(':longitud' => usuarioTableClass::USER_LENGTH)), 00001);
          //      }

                
                validator::validateInsert($nombre, $direccion, $telefono, $fax, $mail, $paginaWeb);

                
                
                $data = array(
                    organizacionTableClass::NOMBRE => $nombre,
                    organizacionTableClass::DIRECCION => $direccion,
                    organizacionTableClass::TELEFONO => $telefono,
                    organizacionTableClass::FAX => $fax,
                    organizacionTableClass::CORREO => $mail,
                    organizacionTableClass::PAGINA_WEB => $paginaWeb,
                );
                organizacionTableClass::insert($data);
                routing::getInstance()->redirect('organizacion', 'index');
            } else {
                routing::getInstance()->redirect('organizacion', 'index');
            }
         } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
