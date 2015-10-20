<?php

use mvc\routing\routingClass as routing ?>

<?php use mvc\i18n\i18nClass as i18n ?>


<div class="content">
  <img id="permiso" src="<?php echo routing::getInstance()->getUrlImg('../../web/images/error-img.png') ?>" title="error" />
  <p id="permiso1">Lo sentimos no tienes permisos para ingresar.</p>
  
 
  <a id="ini" href="<?php echo routing::getInstance()->getUrlWeb('homepage', 'index') ?>" type="button" class="btn btn-success" class="btn btn-danger btn-xs"> <i class="fa fa-home"></i></a>
  
