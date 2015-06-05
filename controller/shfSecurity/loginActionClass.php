<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use hook\log\logHookClass as log;
use mvc\i18n\i18nClass as i18n;

/**
 * @description: En esta clase se llaman  las consultas de la bd
 * @author: 
 * Shirley Marcela Rivero <marce250494@hotmail.com>
 * Kelly Andrea Manzano <kellinandrea18@hotmail.com>
 * Diana Marcela Hormiga<dianamarce0294@hotmail.com>
 * @category: Pertenece al controlador modulo shfSecurity.
 */
class loginActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {
        $usuario = request::getInstance()->getPost('inputUser');
        $password = request::getInstance()->getPost('inputPassword');

        if (($objUsuario = usuarioTableClass::verifyUser($usuario, $password)) !== false) {
          hook\security\securityHookClass::login($objUsuario);
          if (request::getInstance()->hasPost('chkRememberMe') === true) {
            $chkRememberMe = request::getInstance()->getPost('chkRememberMe');
            $hash = md5($objUsuario[0]->id_usuario . $objUsuario[0]->usuario . date(config::getFormatTimestamp()));
            $data = array(
                recordarMeTableClass::USUARIO_ID => $objUsuario[0]->id_usuario,
                recordarMeTableClass::HASH_COOKIE => $hash,
                recordarMeTableClass::IP_ADDRESS => request::getInstance()->getServer('REMOTE_ADDR'),
                recordarMeTableClass::CREATED_AT => date(config::getFormatTimestamp())
            );
            recordarMeTableClass::insert($data);
            setcookie(config::getCookieNameRememberMe(), $hash, time() + config::getCookieTime(), config::getCookiePath());
          }
          log::register('identificación', 'NINGUNA');
          hook\security\securityHookClass::redirectUrl();
        } else {
          session::getInstance()->setError('Usuario y contraseña incorrectos');
          routing::getInstance()->redirect(config::getDefaultModuleSecurity(), config::getDefaultActionSecurity());
        }
      } else {
        routing::getInstance()->redirect(config::getDefaultModule(), config::getDefaultAction());
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
