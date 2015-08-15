<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\editOrganizacionValidatorClass as validator;

/**
 * Description of ejemploClass
 *
 * @author diana marcela <dianamarce0294@hotmail.com>
 */
class updateActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {

                $id = request::getInstance()->getPost(organizacionTableClass::getNameField(organizacionTableClass::ID, true));
                $nombre = request::getInstance()->getPost(organizacionTableClass::getNameField(organizacionTableClass::NOMBRE, true));
                $direccion = request::getInstance()->getPost(organizacionTableClass::getNameField(organizacionTableClass::DIRECCION, true));
                $telefono = request::getInstance()->getPost(organizacionTableClass::getNameField(organizacionTableClass::TELEFONO, true));
                $fax = request::getInstance()->getPost(organizacionTableClass::getNameField(organizacionTableClass::FAX, true));
                $correo = request::getInstance()->getPost(organizacionTableClass::getNameField(organizacionTableClass::CORREO, true));
                $pagina_web = request::getInstance()->getPost(organizacionTableClass::getNameField(organizacionTableClass::PAGINA_WEB, true));

                validator::validateEdit($nombre, $direccion, $telefono, $fax, $correo, $pagina_web);
                
                $ids = array(
                organizacionTableClass::ID => $id,
                );

                
                $data = array(
                    organizacionTableClass::NOMBRE => $nombre,
                    organizacionTableClass::DIRECCION => $direccion,
                    organizacionTableClass::TELEFONO => $telefono,
                    organizacionTableClass::FAX => $fax,
                    organizacionTableClass::CORREO => $correo,
                    organizacionTableClass::PAGINA_WEB => $pagina_web,
                );

                organizacionTableClass::update($ids, $data);
            }

            routing::getInstance()->redirect('organizacion', 'index');
     } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
