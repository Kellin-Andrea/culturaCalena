<?php
use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\createPatrocinadorValidatorClass as validator;

/**
 * Description of ejemploClass
 *
 * @author diana marcela <dianamarce0294@hotmail.com>
 */
class createActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {

                $nombre = request::getInstance()->getPost(patrocinadorTableClass::getNameField(patrocinadorTableClass::NOMBRE, true));
                $direccion = request::getInstance()->getPost(patrocinadorTableClass::getNameField(patrocinadorTableClass::DIRECCION, true));
                $telefono = request::getInstance()->getPost(patrocinadorTableClass::getNameField(patrocinadorTableClass::TELEFONO, true));
                $correo = request::getInstance()->getPost(patrocinadorTableClass::getNameField(patrocinadorTableClass::CORREO, true));
                
          

      //          if (strlen($organizacion) > organizacionTableClass::USER_LENGTH) {
//                    throw new PDOException(i18n::__(00001, null, 'errors', array(':longitud' => usuarioTableClass::USER_LENGTH)), 00001);
          //      }
                
                validator::validateInsert($nombre, $telefono, $correo, $direccion);

                $data = array(
                    patrocinadorTableClass::NOMBRE => $nombre,
                    patrocinadorTableClass::DIRECCION => $direccion,
                    patrocinadorTableClass::TELEFONO => $telefono,
                    patrocinadorTableClass::CORREO => $correo,
                
                );
                patrocinadorTableClass::insert($data);
                routing::getInstance()->redirect('patrocinador', 'index');
                session::getInstance()->setSuccess('Los datos fueron registrados exitosamente');
        
            } else {
                routing::getInstance()->redirect('patrocinador', 'index');
            }
       } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
