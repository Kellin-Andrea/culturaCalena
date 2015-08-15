<?php

namespace mvc\validator {

    use mvc\validator\validatorClass;
    use mvc\session\sessionClass as session;
    use mvc\request\requestClass as request;
    use mvc\routing\routingClass as routing;
    use mvc\config\myConfigClass as config;

    /**
     * Description of createrecaudoEconomicoValidatorClass
     *
     * @author Diana Marcela <dianamarce0294@hotmail.com>
     */
    class editrecaudoEconomicoValidatorClass extends validatorClass {

        public static function validateEdit($id, $eventos, $usuario, $observacion, $tarifa, $valorTotal, $valorParcial) {
            $flag = false;

            if (self::notBlank($eventos)) {
                $flag = true;
                session::getInstance()->setFlash('inputevent', true);
                session::getInstance()->setError('Debes selecionar un evento', 'inputevent');
            }
            if (self::notBlank($usuario)) {
                $flag = true;
                session::getInstance()->setFlash('inputuser', true);
                session::getInstance()->setError('Debes selecionar un usuario', 'inputusuario');
            }
            if (self::notBlank($observacion)) {
                $flag = true;
                session::getInstance()->setFlash('inputobservation', true);
                session::getInstance()->setError('la observacion del recaudo economico es obligatorio', 'inputobservation');
            } else if (strlen($observacion) > \recaudoEconomicoTableClass::OBSERVACION_LENGTH) {
                $flag = true;
                session::getInstance()->setFlash('inputobservation', true);
                session::getInstance()->setError('la observacion del recaudo economico excede los caracteres  permitidos', 'inputobservation');
            }
            if (self::notBlank($tarifa)) {
                $flag = true;
                session::getInstance()->setFlash('inputrates', true);
                session::getInstance()->setError('Debes selecionar una tarifa', 'inputrates');
            }
            if (self::notBlank($valorParcial)) {
                $flag = true;
                session::getInstance()->setFlash('inputvalueParcial', true);
                session::getInstance()->setError('El valor parcial de recaudo es  obligatorio', 'inputvalueParcial');
            } else if (strlen($valorParcial) > \recaudoEconomicoTableClass::VALOR_PARCIAL) {
                $flag = true;
                session::getInstance()->setFlash('inputvalueParcial', true);
                session::getInstance()->setError('El valor parcial   excede los caracteres  permitidos', 'inputvalueParcial');
            }
            if (self::notBlank($valorTotal)) {
                $flag = true;
                session::getInstance()->setFlash('inputvalueTotal', true);
                session::getInstance()->setError('El valor total de recaudo es  obligatorio', 'inputvalueTotal');
            } else if (strlen($valorTotal) > \recaudoEconomicoTableClass::VALOR_TOTAL) {
                $flag = true;
                session::getInstance()->setFlash('inputvalueTotal', true);
                session::getInstance()->setError('El valor total excede los caracteres  permitidos', 'inputvalueTotal');
            }
            

            if ($flag === true) {
                request::getInstance()->setMethod('GET');
                request::getInstance()->addParamGet(array('id' => $id));
                routing::getInstance()->forward('recaudoEconomico', 'edit');
            }
        }

    }

}