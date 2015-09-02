<?php

namespace mvc\validator {

    use mvc\validator\validatorClass;
    use mvc\session\sessionClass as session;
    use mvc\request\requestClass as request;
    use mvc\routing\routingClass as routing;
    use mvc\config\myConfigClass as config;

    /**
     * Description of createEventoValidatorClass
     *
     * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
     */
    class createPatrocinadorValidatorClass extends validatorClass {

        public static function validateInsert($nombre, $telefono, $correo, $direccion) {
            $flag = false;

            if (self::notBlank($nombre)) {
                $flag = true;
                session::getInstance()->setFlash('inputname', true);
                session::getInstance()->setError('El nombre del patrocinador es obligatorio', 'inputname');
            } else if (is_numeric($nombre)) {
                $flag = true;
                session::getInstance()->setFlash('inputname', true);
                session::getInstance()->setError('El nombre del patrocinador no puede ser númerico', 'inputname');
            } else if (strlen($nombre) > \patrocinadorTableClass::NOMBRE_LENGTH) {
                $flag = true;
                session::getInstance()->setFlash('inputname', true);
                session::getInstance()->setError('El nombre del patrocinador excede los caracteres  permitidos', 'inputname');
            }

            if (self::notBlank($telefono)) {
                $flag = true;
                session::getInstance()->setFlash('inputphone', true);
                session::getInstance()->setError('El telefono del patrocinador es  obligatorio', 'inputphone');
            } else if (strlen($telefono) > \patrocinadorTableClass::TELEFONO_LENGTH) {
                $flag = true;
                session::getInstance()->setFlash('inputphone', true);
                session::getInstance()->setError('El telefono el patrocinador excede los caracteres  permitidos', 'inputphone');
            }

            if (self::notBlank($correo)) {
                $flag = true;
                session::getInstance()->setFlash('inputEmail', true);
                session::getInstance()->setError('El correo es obligatorio para el patrocinador', 'inputEmail');
            } else if (strlen($correo) > \patrocinadorTableClass::CORREO_LENGTH) {
                $flag = true;
                session::getInstance()->setFlash('inputEmail', true);
                session::getInstance()->setError('El correo no puede exceder el máximo de caracteres permitidos', 'inputEmail');
            } else if (!preg_match("/([\w\.\-_]+)?\w+@[\w-_]+(\.\w+){1,}/", trim($correo))) {
                $flag = true;
                session::getInstance()->setFlash('inputmail', true);
                session::getInstance()->setError('Por favor digite un corre válido', 'inputEmail');
           
            }
            if (self::notBlank($direccion)) {
                $flag = true;
                session::getInstance()->setFlash('inputadress', true);
                session::getInstance()->setError('La direccion  es obligatoria', 'inputadress');
            } else if (is_numeric($direccion)) {
                $flag = true;

                session::getInstance()->setFlash('inputadress', true);
                session::getInstance()->setError('La direccion  excede los caracteres  permitidos', 'inputadress');
            }

    
                
            
            if ($flag === true) {
                //request::getInstance()->setMethod('GET');
                //request::getInstance()->addParamGet(array('id' => 12));
                routing::getInstance()->forward('patrocinador', 'insert');
            }
        }

    }

}