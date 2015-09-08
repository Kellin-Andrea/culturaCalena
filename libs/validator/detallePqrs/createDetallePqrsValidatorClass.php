<?php

namespace mvc\validator {

    use mvc\validator\validatorClass;
    use mvc\session\sessionClass as session;
    use mvc\request\requestClass as request;
    use mvc\routing\routingClass as routing;
    use mvc\config\myConfigClass as config;

    /**
     * Description of createdetallePqrsValidatorClass
     *
     * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
     */
    class createDetallePqrsValidatorClass extends validatorClass {

        public static function validateInsert($respuesta) {
            $flag = false;


            if (self::notBlank($respuesta)) {
                $flag = true;
                session::getInstance()->setFlash('inputrespuesta', true);
                session::getInstance()->setError('La respuesta  es obligatoria', 'inputrespuesta');
            } else if (is_numeric($respuesta)) {
                $flag = true;
                session::getInstance()->setFlash('inputrespuesta', true);
                session::getInstance()->setError('La respuesta no puede ser númerica', 'inputrespuesta');
            } else if (strlen($respuesta) > \detallePqrsTableClass::RESPUESTA_LENGT) {
                $flag = true;
                session::getInstance()->setFlash('inputrespuesta', true);
                session::getInstance()->setError('La respuesta  excede los caracteres  permitidos', 'inputrespuesta');
            }



            if ($flag === true) {
                //request::getInstance()->setMethod('GET');
                //request::getInstance()->addParamGet(array('id' => 12));
                routing::getInstance()->forward('detallePqrs', 'insert');
            }
        }

    }

}