<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of ejemploClass
 *
 * @author kelly andrea manzano <kellinandrea18@hotmail.com>
 */
class indexActionClass extends controllerClass implements controllerActionInterface {

public function execute() {




try {
if (request::getInstance()->isMethod('POST')) {
  
 
  
$name= request::getInstance()->getPost('name');
$email = request::getInstance()->getPost('email');
$message = request::getInstance()->getPost('message');


$para      = 'kellinandrea18@hotmail.com';
$titulo    = 'Contatenos CulturaCaleña';
$mensaje   = $message;
$cabeceras = 'From: kellinandrea18@hotmail.com' . "\r\n" .
    'Reply-To: kellinandrea18@hotmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

$bool = $email($para, $titulo, $mensaje, $cabeceras);
if($bool){
    echo "Mensaje enviado";
}else{
    echo "Mensaje no enviado";
}

}

$this->defineView('index', 'contactenos', session::getInstance()->getFormatOutput());
} catch (PDOException $exc) {
session::getInstance()->setFlash('exc', $exc);
routing::getInstance()->forward('shfSecurity', 'exception');
}
}

}
