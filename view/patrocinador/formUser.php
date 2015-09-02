<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\session\sessionClass as session ?>
<?php use mvc\request\requestClass as request ?>
<?php $id = patrocinadorTableClass::ID?>
<?php $nombre = patrocinadorTableClass::NOMBRE ?>
<?php $tele = patrocinadorTableClass::TELEFONO ?>
<?php $correo = patrocinadorTableClass::CORREO?>
<?php $dire =  patrocinadorTableClass::DIRECCION ?>

<div class="container container-fluid">
    <div class="panel panel-primary">
        
        <div class="panel-body">

<form  id ="formulario" class="form-horizontal" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('patrocinador', (session::getInstance()->hasFlash('edit') === true) ? 'update': 'create') ?>">
  
     <?php if (isset($objpatrocinador)== true) :?>
    <input name="<?php echo patrocinadorTableClass::getNameField(patrocinadorTableClass::ID, true) ?>" value="<?php  echo $objpatrocinador[0]->$id ?>" type="hidden">
    <?php endif ?>
    
    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputname')) ? 'has-error has-feedback' : '' ?>">
        <label for="<?php echo patrocinadorTableClass::getNameField(patrocinadorTableClass::NOMBRE, true) ?>"  name="<?php echo patrocinadorTableClass::getNameField(patrocinadorTableClass::NOMBRE, true) ?>" class="col-sm-2 control-label"><?php echo i18n::__('name') ?></label>
                <div class="col-sm-7">
                    <?php mvc\view\viewClass::getMessageError('inputname') ?>
                    <input type="text"  class="form-control" id="<?php echo patrocinadorTableClass::getNameField(patrocinadorTableClass::NOMBRE, true) ?>"  name="<?php echo patrocinadorTableClass::getNameField(patrocinadorTableClass::NOMBRE, true) ?>" 
                           value="<?php  echo (session::getInstance()->hasFlash(patrocinadorTableClass::getNameField(patrocinadorTableClass::NOMBRE, true)) === true)  ?  request::getInstance()->getPost(patrocinadorTableClass::getNameField(patrocinadorTableClass::NOMBRE, true)) :  ((( isset($objpatrocinador) == true ) ?  $objpatrocinador[0]->$nombre  :  '' ))  ?>" placeholder="<?php echo i18n::__('name')?>">
                </div>
            </div>
     <div class="form-group <?php echo (session::getInstance()->hasFlash('inputphone')) ? 'has-error has-feedback' : '' ?>">
    <label for="<?php echo patrocinadorTableClass::getNameField(patrocinadorTableClass::TELEFONO, true) ?>"  name="<?php echo patrocinadorTableClass::getNameField(patrocinadorTableClass::TELEFONO, true) ?>" class="col-sm-2 control-label"><?php echo i18n::__('phone') ?></label>
                <div class="col-sm-7">
                    <?php mvc\view\viewClass::getMessageError('inputphone') ?>
                    <input type="text"  class="form-control" id="<?php echo patrocinadorTableClass::getNameField(patrocinadorTableClass::TELEFONO, true) ?>"  name="<?php echo patrocinadorTableClass::getNameField(patrocinadorTableClass::TELEFONO, true) ?>" 
                           value="<?php  echo (session::getInstance()->hasFlash(patrocinadorTableClass::getNameField(patrocinadorTableClass::TELEFONO, true)) === true)  ?  request::getInstance()->getPost(patrocinadorTableClass::getNameField(patrocinadorTableClass::TELEFONO, true)) :  ((( isset($objpatrocinador) == true ) ?  $objpatrocinador[0]->$tele  :  '' ))  ?>" placeholder="<?php echo i18n::__('phone')?>">
                </div>
            </div>
      <div class="form-group <?php echo (session::getInstance()->hasFlash('inputEmail')) ? 'has-error has-feedback' : '' ?>">
          <?php mvc\view\viewClass::getMessageError('inputEmail') ?>
    <label for="<?php echo patrocinadorTableClass::getNameField(patrocinadorTableClass::CORREO, true) ?>"  name="<?php echo patrocinadorTableClass::getNameField(patrocinadorTableClass::CORREO, true) ?>" class="col-sm-2 control-label"><?php echo i18n::__('e-mail') ?></label>
                <div class="col-sm-7">
                    <input type="text"  class="form-control" id="<?php echo patrocinadorTableClass::getNameField(patrocinadorTableClass::CORREO, true) ?>"  name="<?php echo patrocinadorTableClass::getNameField(patrocinadorTableClass::CORREO, true) ?>" 
                           value="<?php  echo (session::getInstance()->hasFlash(patrocinadorTableClass::getNameField(patrocinadorTableClass::CORREO, true)) === true)  ?  request::getInstance()->getPost(patrocinadorTableClass::getNameField(patrocinadorTableClass::CORREO, true)) :  ((( isset($objpatrocinador) == true ) ?  $objpatrocinador[0]->$correo  :  '' ))  ?>" placeholder="<?php echo i18n::__('e-mail')?>">
                </div>
           </div>    
     <div class="form-group <?php echo (session::getInstance()->hasFlash('inputadress')) ? 'has-error has-feedback' : '' ?>">
    <label for="<?php echo patrocinadorTableClass::getNameField(patrocinadorTableClass::DIRECCION, true) ?>"  name="<?php echo patrocinadorTableClass::getNameField(patrocinadorTableClass::DIRECCION, true) ?>" class="col-sm-2 control-label"><?php echo i18n::__('adress') ?></label>
                <div class="col-sm-7">
                    <?php mvc\view\viewClass::getMessageError('inputadress') ?>
                    <input type="text"  class="form-control" id="<?php echo patrocinadorTableClass::getNameField(patrocinadorTableClass::DIRECCION, true) ?>"  name="<?php echo patrocinadorTableClass::getNameField(patrocinadorTableClass::DIRECCION, true) ?>" 
                           value="<?php  echo (session::getInstance()->hasFlash(patrocinadorTableClass::getNameField(patrocinadorTableClass::DIRECCION, true)) === true)  ?  request::getInstance()->getPost(patrocinadorTableClass::getNameField(patrocinadorTableClass::DIRECCION, true)) :  ((( isset($objpatrocinador) == true ) ?  $objpatrocinador[0]->$dire  :  '' ))  ?>" placeholder="<?php echo i18n::__('adress')?>">
                </div>
           </div>
    
     <div class="form-group">
    <div class="col-sm-offset-5 col-sm-10">
        
        <button type="submit" class="btn btn-primary"><?php echo i18n::__('register')?></button>
    </div>
  </div>
</form>
            
        </div>
    </div>
</div>
  