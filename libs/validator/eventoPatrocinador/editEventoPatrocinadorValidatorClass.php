<?php

namespace mvc\validator {

    use mvc\validator\validatorClass;
    use mvc\session\sessionClass as session;
    use mvc\request\requestClass as request;
    use mvc\routing\routingClass as routing;
    use mvc\config\myConfigClass as config;

    /**
     * Description of createestadoPqrsValidatorClass
     *
     * @author DIANA MARCELA HORMIGA <dianamarce0294@hotmail.com>
     */
    class editEventoPatrocinadorValidatorClass extends validatorClass {

        public static function validateEdit($eventSponsor,$sponsor,$id) {
            $flag = false;

            if (self::notBlank($eventSponsor)) {
                $flag = true;
                session::getInstance()->setFlash('inputeventSponsor', true);
                session::getInstance()->setError('Debes selecionar un evento', 'inputeventSponsor');
            }

            if (self::notBlank($sponsor)) {
                $flag = true;
                session::getInstance()->setFlash('inputsponsor', true);
                session::getInstance()->setError('Debes selecionar un patrociador', 'inputsponsor');
            }



            if ($flag === true) {
                request::getInstance()->setMethod('GET');
                request::getInstance()->addParamGet(array(\eventoPatrocinadorTableClass::ID => $id));
                routing::getInstance()->forward('eventoPatrocinador', 'edit');
            }
        }

    }

}