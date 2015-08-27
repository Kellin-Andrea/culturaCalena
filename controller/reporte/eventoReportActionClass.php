<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of ejemploClass
 *
 * @author kelly Andrea <kellinandrea18@hotmail.com>
 */
class eventoReportActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {

                $idCate = request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::CATEGORIA_ID, true));
                $fechaIni = request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::FECHA_INICIAL_PUBLICACION, true));
                $fechaFinal = request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::FECHA_FINAL_PUBLICACION, true));

               
                
                
                $this->objEventoCate = eventoTableClass::getEventoReport($idCate, $fechaIni, $fechaFinal);
                     


                
                $this->objEventoCate = eventoTableClass::getEventoReport($idCate, $fechaIni, $fechaFinal);
                
                session::getInstance()->setAttribute('objEvento', serialize($this->objEventoCate));



               $this->defineView('eventoReportPdf', 'reporte', session::getInstance()->getFormatOutput());

                
            }





            $this->defineView('eventoReport', 'reporte', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
