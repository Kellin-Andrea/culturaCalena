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
     * @author kelly andrea <kellinandrea18@hotmail.com>
     */
    class createTarifaValidatorClass extends validatorClass {

        public static function validateInsert($description, $cost) {
            $flag = false;

            if (self::notBlank($description)) {
                $flag = true;
                session::getInstance()->setFlash('inputdescription', true);
                session::getInstance()->setError('la descripcion de la tarifa es obligatorio', 'inputdescription');
            } else if (is_numeric($description)) {
                $flag = true;
                session::getInstance()->setFlash('inputdescription', true);
                session::getInstance()->setError('la descripcion de la tarifa no puede ser númerico', 'inputdescription');
            } else if (strlen($description) > \tarifaTableClass::DESCRIPCION_LENGTH) {
                $flag = true;
                session::getInstance()->setFlash('inputdescription', true);
                session::getInstance()->setError('la descripcion de la descripcion excede los caracteres  permitidos', 'inputdescription');
            }  
            
            if (self::notBlank($cost)) {
                $flag = true;
                session::getInstance()->setFlash('inputCost', true);
                session::getInstance()->setError('El valor de la tarifa es obligatorio', 'inputCost');
            } 

            if ($flag === true) {
                //request::getInstance()->setMethod('GET');
                routing::getInstance()->forward('tarifa', 'insert');
                
            }
        }

    }

}