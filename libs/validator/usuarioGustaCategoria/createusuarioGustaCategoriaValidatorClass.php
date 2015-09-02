<?php

namespace mvc\validator {

    use mvc\validator\validatorClass;
    use mvc\session\sessionClass as session;
    use mvc\request\requestClass as request;
    use mvc\routing\routingClass as routing;
    use mvc\config\myConfigClass as config;
    

    /**
     * Description of createusuarioGustaCategoriaValidatorClass
     *
     * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
     */
    class createusuarioGustaCategoriaValidatorClass extends validatorClass {

        public static function validateInsert($cat, $usu) {
            $flag = false;

            if (self::notBlank($cat)) {
                $flag = true;
                session::getInstance()->setFlash('inputcat', true);
                session::getInstance()->setError('Debes selecionar una categoria', 'inputcat');
            }




            if (self::notBlank($usu)) {
                $flag = true;
                session::getInstance()->setFlash('inputusu', true);
                session::getInstance()->setError('Debes selecionar un usuario', 'inputusu');
            }



            if ($flag === true) {
                //request::getInstance()->setMethod('GET');
                //request::getInstance()->addParamGet(array('id' => 12));
                routing::getInstance()->forward('usuarioGustaCategoria', 'insert');
            }
        }

    }

}
