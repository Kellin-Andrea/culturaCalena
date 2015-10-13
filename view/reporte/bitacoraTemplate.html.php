<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\view\viewClass as view ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\config\configClass as config ?>
<?php
use mvc\request\requestClass as request ?>

<?php
use mvc\session\sessionClass as session ?>
<?php $id = reporteTableClass::ID ?>
<?php $user = reporteTableClass::NOMBRE ?>

<div class="container container-fluid">

  <form class="form-signin" role="form" action="<?php   echo routing::getInstance()->getUrlWeb('reporte', 'logbookReport') ?>" method="POST">
      <center><h2 class="form-signin-heading"></h2><h1><?php echo i18n::__('reportLogbook')?></h1></center>
      
       <div class="form-group">
         
              <label> <?php echo i18n::__('action') ?></label>
              <select  class="form-control" id="<?php echo bitacoraTableClass::getNameField(bitacoraTableClass::ACCION, true) ?>" name="<?php  echo bitacoraTableClass::getNameField(bitacoraTableClass::ACCION, true) ?>" >
               <option value=""><?php echo i18n::__('category_select') ?></option>
                <?php foreach ($objAccion  as $dato): ?> -->
                  <option value="<?php  echo $dato->accion ?>"><?php  echo $dato->accion ?></option>
                <?php  endforeach ?>
              </select>
              
                <span class="glyphicon glyphicon-remove form-control-feedback" ></span> 
                       
            </div>

      <div class="form-group" >
              <label> <?php echo i18n::__('startDate2') ?></label>
              <input type="date" class="form-control" 
                     id="<?php  echo bitacoraTableClass::getNameField(bitacoraTableClass::FECHA, true) ?>" 
                     name="<?php echo bitacoraTableClass::getNameField(bitacoraTableClass::FECHA, true) ?>" 
                     value="<?php  echo (session::getInstance()->hasFlash(bitacoraTableClass::getNameField(bitacoraTableClass::FECHA, TRUE)) === TRUE) ? request::getInstance()->getPost(bitacoraTableClass::getNameField(bitacoraTableClass::FECHA, TRUE)) : ''?>" required>
              
                <span class="glyphicon glyphicon-remove form-control-feedback" ></span> 
              
            </div>
      
      <div class="form-group" >
              <label> <?php echo i18n::__('endDate2') ?></label>
              <input type="date" class="form-control" 
                    id="fechaFin" 
                     name="fechaFin" 
                     value="fechaFin" required>
              
                <span class="glyphicon glyphicon-remove form-control-feedback" ></span> 
              
            </div>
      

      <button class="btn btn-lg btn-success btn-block" type="submit">Reporte</button>
      <a class="btn btn-lg btn-primary btn-block" href="<?php echo routing::getInstance()->getUrlWeb('reporte', 'index')?>" role="button">Inicio</a>
       <?php if (session::getInstance()->hasError() or session::getInstance()->hasInformation() or session::getInstance()->hasSuccess() or session::getInstance()->hasWarning()): ?>
    <?php view::includeHandlerMessage() ?>
    <?php endif ?>
  </form>

</div> <!-- -->
