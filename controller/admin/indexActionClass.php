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
class indexActionClass extends controllerClass implements controllerActionInterface {

    /**
     * @author: 
     * Shirley Marcela Rivero <marce250494@hotmail.com>
     * Kelly Andrea Manzano <kellinandrea18@hotmail.com>
     * Diana Marcela Hormiga<dianamarce0294@hotmail.com>
     * @return datatype retorna vista  .
     */
    
    
  public function execute() {
    try {


      $totalUsuario = array(usuarioTableClass::ID);

      $totalBitacora = array(bitacoraTableClass::ID);

      $totalCategorias = array(categoriaTableClass::ID);
      $totalEventos= array(eventoTableClass::ID);
      $totalOrganizacion = array(organizacionTableClass::ID);
      $totalPatrocinadores = array(patrocinadorTableClass::ID);

      
  

      $this->objUsuario = usuarioTableClass::getAll($totalUsuario, false);

      $this->objBitacora = bitacoraTableClass::getAll($totalBitacora, FALSE);

      $this->objCategoria = categoriaTableClass::getAll($totalCategorias, FALSE);
      $this->objEvento = eventoTableClass::getAll($totalEventos, FALSE);
     $this->objOrganizacion = organizacionTableClass::getAll($totalOrganizacion, FALSE);
       $this->objPatrocinadores = patrocinadorTableClass::getAll($totalPatrocinadores, FALSE);

     
      

     
      
        if (session::getInstance()->hasCredential('admin')) {
            $this->defineView('index', 'admin', session::getInstance()->getFormatOutput());
        } else {
            routing::getInstance()->redirect('homepage', 'index');
        }
      
    }catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo $exc->getTraceAsString();
    }
  }
    
    

        
        

      
    }


