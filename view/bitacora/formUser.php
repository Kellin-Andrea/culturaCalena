<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\session\sessionClass as session ?>
<?php use mvc\request\requestClass as request ?>
<?php $id = categoriaTableClass::ID ?>
<?php $categoria = categoriaTableClass::NOMBRE?>

  <form class="form-horizontal" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('categoria', ((isset($objcategoria)) ? 'update' : 'create')) ?>">
  
       <?php if (isset($objcategoria)== true) :?>
      <input name="<?php echo categoriaTableClass::getNameField(categoriaTableClass::ID, true) ?>" value="<?php  echo $objcategoria[0]->$id?>" type="hidden">
    <?php endif ?>
    
      <div class="form-group">
          <label for="<?php echo categoriaTableClass::getNameField(categoriaTableClass::NOMBRE, true)?>"  name="<?php echo categoriaTableClass::getNameField(categoriaTableClass::NOMBRE, true)?><" class="col-sm-2 control-label"> <?php echo i18n::__('name')?></label>
    <div class="col-sm-3">
        <input  type="text" class="form-control" id="<?php echo categoriaTableClass::getNameField(categoriaTableClass::NOMBRE, true)?>"  name="<?php echo categoriaTableClass::getNameField(categoriaTableClass::NOMBRE, true)?>"
                value="<?php  echo (session::getInstance()->hasFlash(categoriaTableClass::getNameField(categoriaTableClass::NOMBRE, true)) === true)  ?  request::getInstance()->getPost(categoriaTableClass::getNameField(categoriaTableClass::NOMBRE, true)) :  ((( isset($objcategoria) == true ) ?  $objcategoria[0]->$categoria  :  '' ))  ?>" placeholder="<?php echo i18n::__('nameTxtPlacerholder')?>">
    </div>
  </div>
      <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      
        <button type="submit" class="btn btn-primary"><?php echo i18n::__('register')?></button>
    </div>
  </div>
</form>