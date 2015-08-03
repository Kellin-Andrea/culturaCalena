<?php

namespace mvc\validator {

    use mvc\validator\validatorClass;
    use mvc\session\sessionClass as session;
    use mvc\request\requestClass as request;
    use mvc\routing\routingClass as routing;
    use mvc\config\myConfigClass as config;

    /**
     * Description of shfSecurityCreateUserValidationClass
     *
     * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
     */
    class createDatoUsuarioValidatorClass extends validatorClass {

        public static function validateInsert($name, $lastName, $mail, $locality, $dateF, $genre, $typeDocument, $organization) {
            $flag = false;

//            if (self::notBlank($user)) {
//                $flag = true;
//                session::getInstance()->setFlash('inputUser', true);
//                session::getInstance()->setError('El nombre de usuario es requerido', 'inputUser');
//            } else if (is_numeric($user)) {
//                $flag = true;
//                session::getInstance()->setFlash('inputUser', true);
//                session::getInstance()->setError('El usuario no puede ser númerico', 'inputUser');
//            } else if (strlen($user) > \usuarioTableClass::USER_LENGTH) {
//                $flag = true;
//                session::getInstance()->setFlash('inputUser', true);
//                session::getInstance()->setError('El usuario digitado es mayor en cantidad de caracteres a lo permitido', 'inputUser');
//            } else if (self::isUnique(\usuarioTableClass::ID, true, array(\usuarioTableClass::USER => request::getInstance()->getPost('inputUser')), \usuarioTableClass::getNameTable())) {
//                $flag = true;
//                session::getInstance()->setFlash('inputUser', true);
//                session::getInstance()->setError('El usuario digitado ya existe', 'inputUser');
//            }
//
//            if (self::notBlank($pass1) or self::notBlank($pass2)) {
//                $flag = true;
//                session::getInstance()->setFlash('inputPass', true);
//                session::getInstance()->setError('Las contraseñas son requeridas', 'inputPass');
//            } else if (request::getInstance()->getPost('inputPass1') !== request::getInstance()->getPost('inputPass2')) {
//                $flag = true;
//                session::getInstance()->setFlash('inputPass', true);
//                session::getInstance()->setError('Las contraseñas no coinciden', 'inputPass');
//            }


            if (self::notBlank($name)) {
                $flag = true;
                session::getInstance()->setFlash('inputname', true);
                session::getInstance()->setError('El nombre del usuario es obligatorio', 'inputname');
            } else if (is_numeric($name)) {
                $flag = true;
                session::getInstance()->setFlash('inputname', true);
                session::getInstance()->setError('El nombre del usuario no puede ser númerico', 'inputname');
            } else if (strlen($name) > \datoUsuarioTableClass::NOMBRE_LENGTH) {
                $flag = true;
                session::getInstance()->setFlash('inputname', true);
                session::getInstance()->setError('El nombre del usuario excede los caracteres permitidos', 'inputname');
            }

            if (self::notBlank($lastName)) {
                $flag = true;
                session::getInstance()->setFlash('inputLastName', true);
                session::getInstance()->setError('El apellido del usuario es obligatorio', 'inputLastName');
            } else if (is_numeric($lastName)) {
                $flag = true;
                session::getInstance()->setFlash('inputLastName', true);
                session::getInstance()->setError('El apellido no puede ser númerico', 'inputLastName');
            } else if (strlen($lastName) > \datoUsuarioTableClass::APELLIDO_LENGTH) {
                $flag = true;
                session::getInstance()->setFlash('inputLastName', true);
                session::getInstance()->setError('El apellido excede los caracteres permitidos', 'inputLastName');
            }

            if (self::notBlank($mail)) {
                $flag = true;
                session::getInstance()->setFlash('inputEmail', true);
                session::getInstance()->setError('El correo es obligatorio para el contacto por parte de la plataforma', 'inputEmail');
            } else if (strlen($mail) > \datoUsuarioTableClass::CORREO_LENGTH) {
                $flag = true;
                session::getInstance()->setFlash('inputEmail', true);
                session::getInstance()->setError('El correo no puede exceder el máximo de caracteres permitidos', 'inputEmail');
            } else if (!preg_match("/([\w\.\-_]+)?\w+@[\w-_]+(\.\w+){1,}/", trim($mail))) {
                $flag = true;
                session::getInstance()->setFlash('inputEmail', true);
                session::getInstance()->setError('Por favor digite un corre válido', 'inputEmail');
            } else if (self::isUnique(\datoUsuarioTableClass::ID, true, array(\datoUsuarioTableClass::CORREO => trim($mail)), \datoUsuarioTableClass::getNameTable())) {
                $flag = true;
                session::getInstance()->setFlash('inputEmail', true);
                session::getInstance()->setError('El correo digitado ya está siendo usado', 'inputEmail');
            }

            if (self::notBlank($locality)) {
                $flag = true;
                session::getInstance()->setFlash('inputLocalidad', true);
                session::getInstance()->setError('Debes selecionar una localidad', 'inputLocalidad');
            }

            if (self::notBlank($dateF)) {
                $flag = true;
                session::getInstance()->setFlash('inputdatef', true);
                session::getInstance()->setError('la fecha de nacimiento es obligatorio', 'inputdatef');
            } else if (strtotime($dateF) > strtotime(date(config::getFormatTimestamp()))) {
                $flag = true;
                session::getInstance()->setFlash('inputdatef', true);
                session::getInstance()->setError('La fecha nacimiento  no puede ser mayor o igual a la fecha ', 'inputdatef');
            }


            if (self::notBlank($genre)) {
                $flag = true;
                session::getInstance()->setFlash('inputGenero', true);
                session::getInstance()->setError('Debes selecionar un genero', 'inputGenero');
//            } else if (!self::collection(trim(request::getInstance()->getPost('inputGenero')), array('t', 'f'))) {
//                $flag = true;
//                session::getInstance()->setFlash('inputGenero', true);
//                session::getInstance()->setError('La respuesta dada no es correcta', 'inputGenero');
            }


            if (self::notBlank($typeDocument)) {
                $flag = true;
                session::getInstance()->setFlash('inputTipoDocumento', true);
                session::getInstance()->setError('Debes selecionar una identificacion', 'inputTipoDocumento');
            }

            if (self::notBlank($organization)) {
                $flag = true;
                session::getInstance()->setFlash('inputOrganizacion', true);
                session::getInstance()->setError('Debes selecionar una organizacion', 'inputOrganizacion');
            }

            if ($flag === true) {
                //request::getInstance()->setMethod('GET');
                routing::getInstance()->forward('datoUsuario', 'insert');
                routing::getInstance()->forward('usuario', 'insert');
            }
        }

    }

}