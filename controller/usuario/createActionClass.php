<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use hook\log\logHookClass as log ;
use mvc\validator\createUserValidatorClass as validator;


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
                $user = trim(request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::USER, true)));
                $pass1 = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) . '_1');
                $pass2 = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) . '_2');
               
             
                
                validator::validateInsert($user,$pass1,$pass2);

               
                
                
                //var_export($user);
                //exit();

                $data = array(
                    usuarioTableClass::USER => $user,
                    usuarioTableClass::PASSWORD => md5($pass1),
                    '__sequence' => 'usuario_id_seq'
                );
            
                $id= usuarioTableClass::insert($data);
               
                
                log::register('insertar', usuarioTableClass::getNameTable(), null, 1);
                routing::getInstance()->redirect('default', 'index');
                session::getInstance()->setSuccess('Los datos fueron registrados exitosamente');
                 } else {
                routing::getInstance()->redirect('default', 'index');
            }
      } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }


  
    private function validate($user, $pass1, $pass2) {
        $flag = false;

        if ($user > usuarioTableClass::USER_LENGTH) {
            session::getInstance()->setError(i18n::__(00004, null, 'errors', array('%user%' => $user, '%caracteres%' => usuarioTableClass::USER_LENGTH)));
            $flag = true;
            session::getInstance()->getFlash(usuarioTableClass::getNameField(usuarioTableClass::USER, true), true);
        }

        if (($pass1) !== ($pass2)) {
            session::getInstance()->setError(i18n::__(00005, null, 'errors'));
            $flag = true;
            session::getInstance()->getFlash(usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true), true);


      }
      
        if($user == "" or $pass1 == "" or $pass2 == "" ){ 
            session::getInstance()->setError(i18n::__(00007,null,'errors'));
            $flag = true;
            session::getInstance()->getFlash(usuarioTableClass::getNameField(usuarioTableClass::USER, true),true);

} 
        if ($flag === true) {
            request::getInstance()->setMethod('GET');
            routing::getInstance()->forward('default', 'insert');
        }
    }

    }

