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
class logbookReportActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {

                $idBitacora = request::getInstance()->getPost(bitacoraTableClass::getNameField(bitacoraTableClass::ACCION, true));
                $fechaIni = request::getInstance()->getPost(bitacoraTableClass::getNameField(bitacoraTableClass::FECHA, true));
                $fechaFinal = request::getInstance()->getPost("fechaFin");

               
                
                
                $this->objBitacora = bitacoraTableClass::getReportBitacora($idBitacora, $fechaIni, $fechaFinal);
                     


                
                $this->objBitacora= bitacoraTableClass::getReportBitacora($idBitacora, $fechaIni, $fechaFinal);
                
                session::getInstance()->setAttribute('objBitacora', serialize($this->objBitacora));



               $this->defineView('logbookReportPdf', 'reporte', session::getInstance()->getFormatOutput());

                
            }





            $this->defineView('logbookReport', 'reporte', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
