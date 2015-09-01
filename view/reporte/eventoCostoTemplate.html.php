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

  <form class="form-signin" role="form" action="<?php  echo routing::getInstance()->getUrlWeb('reporte', 'eventoCostoReport') ?>" method="POST">
      <center><h2 class="form-signin-heading"></h2><h1><?php echo i18n::__('reportCategory')?></h1></center>
      
      
      <div class="form-group" >
              <label> <?php echo i18n::__('publicationStartDate') ?></label>
              <input type="date" class="form-control" 
                     id="<?php  echo eventoTableClass::getNameField(eventoTableClass::FECHA_INICIAL_PUBLICACION, true) ?>" 
                     name="<?php echo eventoTableClass::getNameField(eventoTableClass::FECHA_INICIAL_PUBLICACION, true) ?>" 
                     value="<?php  echo (session::getInstance()->hasFlash(eventoTableClass::getNameField(eventoTableClass::FECHA_INICIAL_PUBLICACION, TRUE)) === TRUE) ? request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::FECHA_INICIAL_PUBLICACION, TRUE)) : ''?>" required>
              
                <span class="glyphicon glyphicon-remove form-control-feedback" ></span> 
              
            </div>
      
      <div class="form-group" >
              <label> <?php echo i18n::__('publicationFinishDate') ?></label>
              <input type="date" class="form-control" 
                     id="<?php  echo eventoTableClass::getNameField(eventoTableClass::FECHA_FINAL_PUBLICACION, true) ?>" 
                     name="<?php  echo eventoTableClass::getNameField(eventoTableClass::FECHA_FINAL_PUBLICACION, true) ?>" 
                     value="<?php echo (session::getInstance()->hasFlash(eventoTableClass::getNameField(eventoTableClass::FECHA_FINAL_PUBLICACION, TRUE)) === TRUE) ? request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::FECHA_FINAL_PUBLICACION, TRUE)) : '' ?>"  required>
             
                <span class="glyphicon glyphicon-remove form-control-feedback" ></span> 
              
            </div>
      

      <button class="btn btn-lg btn-success btn-block" type="submit">Reporte</button>
      <button class="btn btn-lg btn-primary btn-block" type="submit"><a href="<?php echo routing::getInstance()->getUrlWeb('reporte', 'index') ?>">Inicio</button>
    <?php if (session::getInstance()->hasError() or session::getInstance()->hasInformation() or session::getInstance()->hasSuccess() or session::getInstance()->hasWarning()): ?>
    <?php view::includeHandlerMessage() ?>
    <?php endif ?>
  </form>

</div> <!-- -->
