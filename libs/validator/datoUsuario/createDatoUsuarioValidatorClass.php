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
                session::getInstance()->setFlash('inputmail', true);
                session::getInstance()->setError('El correo es obligatorio para el contacto por parte del portal', 'inputmail');
            } else if (strlen($mail) > \datoUsuarioTableClass::CORREO_LENGTH) {
                $flag = true;
                session::getInstance()->setFlash('inputmail', true);
                session::getInstance()->setError('El correo no puede exceder el máximo de caracteres permitidos', 'inputmail');
            } else if (!preg_match("/([\w\.\-_]+)?\w+@[\w-_]+(\.\w+){1,}/", trim(request::getInstance()->getPost('inputmail')))) {
                $flag = true;
                session::getInstance()->setFlash('inputmail', true);
                session::getInstance()->setError('Por favor digite un corre válido', 'inputmail');
            } else if (self::isUnique(\datoUsuarioTableClass::ID, true, array(\datoUsuarioTableClass::CORREO => trim(request::getInstance()->getPost('inputmail'))), \datoUsuarioTableClass::getNameTable())) {
                $flag = true;
                session::getInstance()->setFlash('inputmail', true);
                session::getInstance()->setError('El correo digitado ya está siendo usado', 'inputmail');
            }

            if (self::notBlank($locality)) {
                $flag = true;
                session::getInstance()->setFlash('inputLocalidad', true);
                session::getInstance()->setError('Debes selecionar una localidad', 'inputLocalidad');
//      } else if (!self::collection(trim(request::getInstance()->getPost('inputSexo')), array('t', 'f'))) {
//        $flag = true;
//        session::getInstance()->setFlash('inputSexo', true);
//        session::getInstance()->setError('La respuesta dada no es correcta', 'inputSexo');
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
            } else if (!self::collection(trim(request::getInstance()->getPost('inputGenero')), array('t', 'f'))) {
                $flag = true;
                session::getInstance()->setFlash('inputGenero', true);
                session::getInstance()->setError('La respuesta dada no es correcta', 'inputGenero');
            }


            if (self::notBlank($typeDocument)) {
                $flag = true;
                session::getInstance()->setFlash('inputTipoDocumento', true);
                session::getInstance()->setError('Debes selecionar una identificacion', 'inputTipoDocumento');
//      } else if (!self::collection(trim(request::getInstance()->getPost('inputSexo')), array('t', 'f'))) {
//        $flag = true;
//        session::getInstance()->setFlash('inputSexo', true);
//        session::getInstance()->setError('La respuesta dada no es correcta', 'inputSexo');
            }

            if (self::notBlank($organization)) {
                $flag = true;
                session::getInstance()->setFlash('inputOrganizacion', true);
                session::getInstance()->setError('Debes selecionar una organizacion', 'inputOrganizacion');
//      } else if (!self::collection(trim(request::getInstance()->getPost('inputSexo')), array('t', 'f'))) {
//        $flag = true;
//        session::getInstance()->setFlash('inputSexo', true);
//        session::getInstance()->setError('La respuesta dada no es correcta', 'inputSexo');
            }

            if ($flag === true) {
                //request::getInstance()->setMethod('GET');
                routing::getInstance()->forward('datoUsuario', 'insert');
            }
        }

    }

}