<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

class indexActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {

            $where = null;
            $where0= null;

            $id = session::getInstance()->getUserId();


            
            

            $fields = array(
                usuarioTableClass::ID,
                usuarioTableClass::USER
            );




            $fields2 = array(
                datoUsuarioTableClass::ID,
                datoUsuarioTableClass::USUARIO_ID,
                datoUsuarioTableClass::NOMBRE,
                datoUsuarioTableClass::APELLIDO,
                datoUsuarioTableClass::CORREO,
                datoUsuarioTableClass::LOCALIDAD_ID,
                datoUsuarioTableClass::ORGANIZACION_ID,
                datoUsuarioTableClass::GENERO
            );

            $fields3 = array(
                usuarioGustaCategoriaTableClass::ID,
                usuarioGustaCategoriaTableClass::CATEGORIA_ID,
                usuarioGustaCategoriaTableClass::USUARIO_ID
            );
            
              $fields4 = array(
              eventoTableClass::ID,
              eventoTableClass::COSTO,
              eventoTableClass::FECHA_INICIAL_EVENTO,
              eventoTableClass::NOMBRE,
              eventoTableClass::FECHA_FINAL_EVENTO,
              eventoTableClass::FECHA_INICIAL_PUBLICACION,
              eventoTableClass::FECHA_FINAL_PUBLICACION,
              eventoTableClass::USUARIO_ID
            );




            $where1 = array(
                usuarioTableClass::ID => session::getInstance()->getUserId()
            );

            $where2 = array(
                datoUsuarioTableClass::USUARIO_ID => session::getInstance()->getUserId()
            );

            $where3 = array(
                usuarioGustaCategoriaTableClass::USUARIO_ID => session::getInstance()->getUserId()
            );
            
              $where4 = array(
                eventoTableClass::USUARIO_ID => session::getInstance()->getUserId()
            );
            
              
            
            
           



            $page = 0;
            if (request::getInstance()->hasGet('page')) {
                $this->page = request::getInstance()->getGet('page');
                $page = request::getInstance()->getGet('page') - 1;
                $page = $page * config::getRowGrid();
            }


            $page1 = 0;
            if (request::getInstance()->hasGet('page')) {
                $this->page1 = request::getInstance()->getGet('page');
                $page1 = request::getInstance()->getGet('page') - 1;
                $page1 = $page1 * config::getRowGrid();
            }



            $this->cntPages = eventoTableClass::getTotalpages(config::getRowGrid(), $where);
            $this->objPerfilUser = usuarioTableClass::getAll($fields, FALSE, null, null, null, null, $where1);
            $this->cntPagesPqrs = pqrsTableClass::getTotalPagesPqrs(config::getRowGrid(),$where0);
            $this->ObjPqrs = pqrsTableClass::getPqrs($id, config::getRowGrid(), $page1);
            $this->objDatosProfile = datoUsuarioTableClass::getAll($fields2, FALSE, null, null, null, null, $where2);
            $this->objGustosProfile = usuarioTableClass::getCategoria($id);
            $this->objCount = eventoTableClass::getEventTotal($id);
            $this->objCount1 = usuarioGustaCategoriaTableClass::getCateTotal($id);
            $this->objCount2 = bitacoraTableClass::getBitacoraTotal($id);
            $this->objEventoProfile = eventoTableClass::getAll($fields4, TRUE,NULL,NULL, config::getRowGrid(), $page, $where4);
         

            $this->defineView('index', 'profile', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
