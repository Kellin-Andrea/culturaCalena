<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * @description: En esta clase se llaman  las consultas de la bd
 * @author: 
 * Shirley Marcela Rivero <marce250494@hotmail.com>
 * Kelly Andrea Manzano <kellinandrea18@hotmail.com>
 * Diana Marcela Hormiga<dianamarce0294@hotmail.com>
 * @category: Pertenece al controlador modulo admin .
 */
class traductorActionClass extends controllerClass implements controllerActionInterface {

    /**
     * @author: 
     * Shirley Marcela Rivero <marce250494@hotmail.com>
     * Kelly Andrea Manzano <kellinandrea18@hotmail.com>
     * Diana Marcela Hormiga<dianamarce0294@hotmail.com>
     *
     */
    public function execute() {
        try {
            /*
             * ¿cambio el idioma?
             */
            if (request::getInstance()->isMethod('POST') === true) {
                $language = request::getInstance()->getPost('language');
                $PATH_INFO = request::getInstance()->getServer('PATH_INFO');
                session::getInstance()->setDefaultCulture($language);
                $dir = config::getUrlBase() . config::getIndexFile() . $PATH_INFO;
                header('location: ' . $dir);
            }//end  if
            else {
                routing::getInstance()->redirect('shfSecurity', 'index');
            }//end else
        }//end try 
        catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }//end catch
    }//end function

}//end class
