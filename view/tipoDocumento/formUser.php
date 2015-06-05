<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\session\sessionClass as session ?>
<?php use mvc\request\requestClass as request ?>
<?php $id = tipoDocumentoTableClass::ID ?>
<?php $tipo = tipoDocumentoTableClass::NOMBRE?>

<div class="container container-fluid">
    <div class="panel panel-primary">
        
        <div class="panel-body">

  <form class="form-horizontal" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('tipoDocumento', ((isset($objtipoDocumento)) ? 'update' : 'create')) ?>">
  
       <?php if (isset($objtipoDocumento)== true) :?>
      <input name="<?php echo tipoDocumentoTableClass::getNameField(tipoDocumentoTableClass::ID, true) ?>" value="<?php  echo $objtipoDocumento[0]->$id?>" type="hidden">
    <?php endif ?>
    
      <div class="form-group">
      <label for="<?php echo tipoDocumentoTableClass::getNameField(tipoDocumentoTableClass::NOMBRE, true)?>"  name="<?php echo tipoDocumentoTableClass::getNameField(tipoDocumentoTableClass::NOMBRE, true)?><" class="col-sm-2 control-label"> <?php echo i18n::__('document_type')?></label>
    <div class="col-sm-7">
          <?php mvc\view\viewClass::getMessageError('inputname') ?>
        <input  type="text" class="form-control" id="<?php echo tipoDocumentoTableClass::getNameField(tipoDocumentoTableClass::NOMBRE, true)?>"  name="<?php echo tipoDocumentoTableClass::getNameField(tipoDocumentoTableClass::NOMBRE, true)?>"
                value="<?php  echo (session::getInstance()->hasFlash(tipoDocumentoTableClass::getNameField(tipoDocumentoTableClass::NOMBRE, true)) === true)  ?  request::getInstance()->getPost(tipoDocumentoTableClass::getNameField(tipoDocumentoTableClass::nombre, true)) :  ((( isset($objtipoDocumento) == true ) ?  $objtipoDocumento[0]->$tipo  :  '' ))  ?>" placeholder="<?php echo i18n::__('IdType')?>">
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
 