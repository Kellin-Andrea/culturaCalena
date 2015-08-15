<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\session\sessionClass as session ?>
<?php use mvc\request\requestClass as request ?>

<?php $id = tarifaTableClass::ID ?>
<?php $desc = tarifaTableClass::DESCRIPCION?>
<?php $valor = tarifaTableClass::VALOR ?>


<div class="container container-fluid">
    <div class="panel panel-primary">
       
        <div class="panel-body">
<form class="form-horizontal" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('tarifa',((isset($objtarifa)) ? 'update' : 'create')) ?>">
  
       <?php if (isset($objtarifa)== true) :?>
      <input name="<?php echo tarifaTableClass::getNameField(tarifaTableClass::ID, true) ?>" value="<?php  echo $objtarifa[0]->$id?>" type="hidden">
    <?php endif ?>
    
      <div class="form-group">
          <label for="<?php echo tarifaTableClass::getNameField(tarifaTableClass::DESCRIPCION, true)?>"  name="<?php echo tarifaTableClass::getNameField(tarifaTableClass::DESCRIPCION, true)?><" class="col-sm-2 control-label"> <?php echo i18n::__('description')?></label>
    <div class="col-sm-7">
        <?php mvc\view\viewClass::getMessageError('inputdescription') ?>
        <input  type="text" class="form-control" id="<?php echo tarifaTableClass::getNameField(tarifaTableClass::DESCRIPCION, true)?>"  name="<?php echo tarifaTableClass::getNameField(tarifaTableClass::DESCRIPCION, true)?>"
                value="<?php  echo (session::getInstance()->hasFlash(tarifaTableClass::getNameField(tarifaTableClass::DESCRIPCION, true)) === true)  ?  request::getInstance()->getPost(tarifaTableClass::getNameField(tarifaTableClass::DESCRIPCION, true)) :  ((( isset($objtarifa) == true ) ?  $objtarifa[0]->$desc  :  '' ))  ?>" placeholder=<?php echo i18n::__('description')?> >
    </div>
  </div>
      
           <?php if (isset($objtarifa)== true) :?>
      <input name="<?php echo tarifaTableClass::getNameField(tarifaTableClass::ID, true) ?>" value="<?php  echo $objtarifa[0]->$id?>" type="hidden">
    <?php endif ?>
    
      <div class="form-group">
          <label for="<?php echo tarifaTableClass::getNameField(tarifaTableClass::VALOR, true)?>"  name="<?php echo tarifaTableClass::getNameField(tarifaTableClass::VALOR, true)?><" class="col-sm-2 control-label"> <?php echo i18n::__('rateId')?></label>
    <div class="col-sm-7">
        <?php mvc\view\viewClass::getMessageError('inputCost') ?>
        <input  type="text" class="form-control" id="<?php echo tarifaTableClass::getNameField(tarifaTableClass::VALOR, true)?>"  name="<?php echo tarifaTableClass::getNameField(tarifaTableClass::VALOR, true)?>"
                value="<?php  echo (session::getInstance()->hasFlash(tarifaTableClass::getNameField(tarifaTableClass::VALOR, true)) === true)  ?  request::getInstance()->getPost(tarifaTableClass::getNameField(tarifaTableClass::VALOR, true)) :  ((( isset($objtarifa) == true ) ?  $objtarifa[0]->$valor  :  '' ))  ?>" placeholder=<?php echo i18n::__('rateId')?>>
    </div>
  </div>
      
      <div class="form-group">
    <div class="col-sm-offset-5 col-sm-10">
      
        <button type="submit" class="btn btn-primary"><?php echo i18n::__('register')?></button>
    </div>
  </div>
</form>