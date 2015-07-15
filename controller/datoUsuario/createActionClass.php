<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use hook\log\logHookClass as log;
use mvc\validator\createDatoUsuarioValidatorClass as validator;

/**
 * @description: En esta clase se llaman  las consultas de la bd
 * @author: 
 * Shirley Marcela Rivero <marce250494@hotmail.com>
 * Kelly Andrea Manzano <kellinandrea18@hotmail.com>
 * Diana Marcela Hormiga<dianamarce0294@hotmail.com>
 * @category: Pertenece al controlador modulo datoUsuario .
 */
class createActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST') === true) {


                $name = request::getInstance()->getPost(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::NOMBRE, true));
                $lastName = request::getInstance()->getPost(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::APELLIDO, true));
                $mail = request::getInstance()->getPost(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::CORREO, true));
                $dateF = request::getInstance()->getPost(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::FECHA_NACIMIENTO, true));
                $genre = request::getInstance()->getPost(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::GENERO, true));
                $locality = request::getInstance()->getPost(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::LOCALIDAD_ID, true));
                $typeDocument = request::getInstance()->getPost(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::TIPO_DOCUMENTO_ID, true));
                $organization = request::getInstance()->getPost(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::ORGANIZACION_ID, true));
                $user =  request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::USER, true));
                $password = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true));

                if(($objdatos = datoUsuarioTableClass::verifyDate($user, $password, $name, $password, $lastName, $mail, $genre, $dateF, $locality, $typeDocument, $organization, $user)) !== false );

                validator::validateInsert($name, $lastName, $mail, $dateF, $genre, $locality, $typeDocument, $organization);
                
                $data = array(
                    datoUsuarioTableClass::NOMBRE => $name,
                    datoUsuarioTableClass::APELLIDO => $lastName,
                    datoUsuarioTableClass::CORREO => $mail,
                    datoUsuarioTableClass::FECHA_NACIMIENTO => $dateF,
                    datoUsuarioTableClass::GENERO => $genre,
                    datoUsuarioTableClass::LOCALIDAD_ID => $locality,
                    datoUsuarioTableClass::TIPO_DOCUMENTO_ID => $typeDocument,
                    datoUsuarioTableClass::ORGANIZACION_ID => $organization,
                    usuarioTableClass::USER => $user,
                    usuarioTableClass::PASSWORD => $password
                );

                $id = datoUsuarioTableClass::insert($data);




                routing::getInstance()->redirect('datoUsuario', 'index');
                session::getInstance()->setSuccess('Los datos fueron registrados exitosamente');
            } else {
                routing::getInstance()->redirect('default', 'insert');
            }
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}

//
//    private function validate($user, $pass1, $pass2) {
//        $flag = false;
//
//        if ($user > usuarioTableClass::USER_LENGTH) {
//            session::getInstance()->setError(i18n::__(00004, null, 'errors', array('%user%' => $user, '%caracteres%' => usuarioTableClass::USER_LENGTH)));
//            $flag = true;
//            session::getInstance()->getFlash(usuarioTableClass::getNameField(usuarioTableClass::USER, true), true);
//        }
//
//        if (($pass1) !== ($pass2)) {
//            session::getInstance()->setError(i18n::__(00005, null, 'errors'));
//            $flag = true;
//            session::getInstance()->getFlash(usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true), true);
//      }
//      
//        if($user == "" or $pass1 == "" or $pass2 == "" ){ 
//            session::getInstance()->setError(i18n::__(00007,null,'errors'));
//            $flag = true;
//            session::getInstance()->getFlash(usuarioTableClass::getNameField(usuarioTableClass::USER, true),true);
//
//} 
//        if ($flag === true) {
//            request::getInstance()->setMethod('GET');
//            routing::getInstance()->forward('usuario', 'insert');
//        }
//    }
//
    

