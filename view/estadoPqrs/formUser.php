<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\session\sessionClass as session ?>
<?php use mvc\request\requestClass as request ?>
<?php $id = estadoPqrsTableClass::ID?>
<?php $est = estadoPqrsTableClass::NOMBRE?>

<div class="container container-fluid">
    <div class="panel panel-primary">
        
        <div class="panel-body">

  <form class="form-horizontal" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('estadoPqrs', ((isset($objestado)) ? 'update' : 'create')) ?>">
  
       <?php if (isset($objestado)== true) :?>
      <input name="<?php echo estadoPqrsTableClass::getNameField(estadoPqrsTableClass::ID, true) ?>" value="<?php  echo $objestado[0]->$id?>" type="hidden">
    <?php endif ?>
    
      <div class="form-group <?php echo (session::getInstance()->hasFlash('inputname')) ? 'has-error has-feedback' : '' ?>">
          <label for="<?php echo estadoPqrsTableClass::getNameField(estadoPqrsTableClass::NOMBRE, true)?>"  name="<?php echo estadoPqrsTableClass::getNameField(estadoPqrsTableClass::NOMBRE, true)?><" class="col-sm-2 control-label"> <?php echo i18n::__('pqrsfState')?></label>
    <div class="col-sm-7">
        <?php mvc\view\viewClass::getMessageError('inputname') ?>
        <input  type="text" class="form-control" id="<?php echo estadoPqrsTableClass::getNameField(estadoPqrsTableClass::NOMBRE, true)?>"  name="<?php echo estadoPqrsTableClass::getNameField(estadoPqrsTableClass::NOMBRE, true)?>"
                value="<?php  echo (session::getInstance()->hasFlash(estadoPqrsTableClass::getNameField(estadoPqrsTableClass::NOMBRE, true)) === true)  ?  request::getInstance()->getPost(estadoPqrsTableClass::getNameField(estadoPqrsTableClass::nombre, true)) :  ((( isset($objestado) == true ) ?  $objestado[0]->$est  :  '' ))  ?>" placeholder="<?php echo i18n::__('pqrsfState')?>">
    </div>
  </div>
      <div class="form-group">
    <div class="col-sm-offset-5 col-sm-10">
         <a href="<?php echo routing::getInstance()->getUrlWeb('estadoPqrs', 'index') ?>" type="button" class="btn btn-success" class="btn btn-danger btn-xs"> <i class="fa fa-home"></i></a>
        <button type="submit" class="btn btn-primary"><?php echo i18n::__('register')?></button>
    </div>
  </div>
</form>
 
    </div>
    </div>
</div>            