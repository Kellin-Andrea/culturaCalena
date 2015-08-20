<?php

namespace mvc\validator {

    use mvc\validator\validatorClass;
    use mvc\session\sessionClass as session;
    use mvc\request\requestClass as request;
    use mvc\routing\routingClass as routing;
    use mvc\config\myConfigClass as config;

    /**
     * Description of editOrganizacionValidatorClass
     *
     * @author Diana Marcela <dianamarce0294@hotmail.com>
     */
    class editOrganizacionValidatorClass extends validatorClass {

        public static function validateEdit($nombre, $direccion, $telefono, $fax, $correo, $paginaWeb,$id) {
            $flag = false;

            if (self::notBlank($nombre)) {
                $flag = true;
                session::getInstance()->setFlash('inputname', true);
                session::getInstance()->setError('El nombre de la organizacion es obligatorio', 'inputname');
            } else if (is_numeric($nombre)) {
                $flag = true;
                session::getInstance()->setFlash('inputnameEvent', true);
                session::getInstance()->setError('El nombre de organizacion no puede ser númerico', 'inputname');
            } else if (strlen($nombre) > \organizacionTableClass::NOMBRE_LENGTH) {
                $flag = true;
                session::getInstance()->setFlash('inputname', true);
                session::getInstance()->setError('El nombre de la organizacion excede los caracteres  permitidos', 'inputname');
            }


            if (self::notBlank($direccion)) {
                $flag = true;
                session::getInstance()->setFlash('inputadress', true);
                session::getInstance()->setError('la direccion de la organizacion es obligatorio', 'inputadress');
            } else if (strlen($direccion) > \organizacionTableClass::DIRECCION_LENGTH) {
                $flag = true;
                session::getInstance()->setFlash('inputadress', true);
                session::getInstance()->setError('la direccion de la organizacion excede los caracteres  permitidos', 'inputadress');
            }

            if (self::notBlank($telefono)) {
                $flag = true;
                session::getInstance()->setFlash('inputphone', true);
                session::getInstance()->setError('El telefono de la organizacion  es  obligatorio', 'inputphone');
            } else if (strlen($telefono) > \organizacionTableClass::TELEFONO_LENGTH) {
                $flag = true;
                session::getInstance()->setFlash('inputtelefono', true);
                session::getInstance()->setError('El telefono de organizacion  excede los caracteres  permitidos', 'inputphone');
            }
            if (self::notBlank($fax)) {
                $flag = true;
                session::getInstance()->setFlash('inputfax', true);
                session::getInstance()->setError('El fax de la organizacion es  obligatorio', 'inputfax');
            } else if (strlen($fax) > \organizacionTableClass::FAX_LENGTH) {
                $flag = true;
                session::getInstance()->setFlash('inputfax', true);
                session::getInstance()->setError('El fax de la organizacion excede los caracteres  permitidos', 'inputfax');
            }
            if (self::notBlank($correo)) {
                $flag = true;
                session::getInstance()->setFlash('inputEmail', true);
                session::getInstance()->setError('El correo es obligatorio para la organizacion', 'inputEmail');
            } else if (strlen($correo) > \organizacionTableClass::CORREO_LENGTH) {
                $flag = true;
                session::getInstance()->setFlash('inputEmail', true);
                session::getInstance()->setError('El correo no puede exceder el máximo de caracteres permitidos', 'inputEmail');
            } else if (!preg_match("/([\w\.\-_]+)?\w+@[\w-_]+(\.\w+){1,}/", trim($correo))) {
                $flag = true;
                session::getInstance()->setFlash('inputEmail', true);
                session::getInstance()->setError('Por favor digite un corre válido', 'inputEmail');
            } else if (self::isUnique(\organizacionTableClass::ID, true, array(\organizacionTableClass::CORREO => trim($correo)), \organizacionTableClass::getNameTable())) {
                $flag = true;
                session::getInstance()->setFlash('inputEmail', true);
                session::getInstance()->setError('El correo digitado ya está siendo usado', 'inputEmail');
            }
            if (self::notBlank($paginaWeb)) {
                $flag = true;
                session::getInstance()->setFlash('inputwebPage', true);
                session::getInstance()->setError('la pagina web  es obligatoria', 'inputwebPage');
            } else if (strlen($paginaWeb) > \organizacionTableClass::PAGINA_WEB_LENGTH) {
                $flag = true;
                session::getInstance()->setFlash('inputwebPage', true);
                session::getInstance()->setError('la pagina web  excede los caracteres  permitidos', 'inputwebPage');
            }


            if ($flag === true) {
                request::getInstance()->setMethod('GET');
                request::getInstance()->addParamGet(array('id' => $id));
                routing::getInstance()->forward('organizacion', 'edit');
            }
        }

    }

}

