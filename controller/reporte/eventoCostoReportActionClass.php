<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\createEventoCostoValidatorClass as validator;

/**
 * Description of ejemploClass
 *
 * @author kelly Andrea <kellinandrea18@hotmail.com>
 */
class eventoCostoReportActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {

               
                $fechaIni2 = request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::FECHA_INICIAL_PUBLICACION, true));
                $fechaFinal2 = request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::FECHA_FINAL_PUBLICACION, true));

               
                 
                
                $this->objCateEvento = eventoTableClass::getEventoReportCosto($fechaIni2, $fechaFinal2);
                      
                     


                
                $this->objCateEvento = eventoTableClass::getEventoReportCosto($fechaIni2, $fechaFinal2);
                     
                
                session::getInstance()->setAttribute('objEvento', serialize($this->objCateEvento));



               $this->defineView('eventoCostoReportPdf', 'reporte', session::getInstance()->getFormatOutput());

                
            }
    


            $this->defineView('eventoCostoReport', 'reporte', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
