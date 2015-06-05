<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\session\sessionClass as session ?>
<?php use mvc\request\requestClass as request ?>
<?php $id = detallePqrsTableClass::ID ?>
<?php $rsp= detallePqrsTableClass::RESPUESTA?>
<?php $user = usuarioTableClass::USER ?>

<div class="container container-fluid">
    <div class="panel panel-primary">
        
        <div class="panel-body">
  <form class="form-horizontal" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('detallePqrs', ((isset($objdetalle)) ? 'update' : 'create')) ?>">
  
       <?php if (isset($objdetalle)== true) :?>
      <input name="<?php echo detallePqrsTableClass::getNameField(detallePqrsTableClass::ID, true) ?>" value="<?php  echo $objdetalle[0]->$id?>" type="hidden">
    <?php endif ?>
    
      <div class="form-group">
          <label for="<?php echo detallePqrsTableClass::getNameField(detallePqrsTableClass::RESPUESTA, true)?>"  name="<?php echo detallePqrsTableClass::getNameField(detallePqrsTableClass::RESPUESTA, true)?><" class="col-sm-2 control-label"> <?php echo i18n::__('answer')?></label>
    <div class="col-sm-7">
        <input  type="text" class="form-control" id="<?php echo detallePqrsTableClass::getNameField(detallePqrsTableClass::RESPUESTA, true)?>"  name="<?php echo detallePqrsTableClass::getNameField(detallePqrsTableClass::RESPUESTA, true)?>"
                value="<?php  echo (session::getInstance()->hasFlash(detallePqrsTableClass::getNameField(detallePqrsTableClass::RESPUESTA, true)) === true)  ?  request::getInstance()->getPost(detallePqrsTableClass::getNameField(detallePqrsTableClass::RESPUESTA, true)) :  ((( isset($objdetalle) == true ) ?  $objdetalle[0]->$rsp  :  '' ))  ?>" placeholder="<?php echo i18n::__('answer')?>">
    </div>
  </div>
        <div class="form-group">

            <label for="<?php echo usuarioTableClass::getNameField(usuarioTableClass::ID, true) ?>"  name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::ID, true) ?>" class="col-sm-2 control-label"><?php echo i18n::__('user') ?></label>

                <div class="col-sm-7">

                    <select  class="form-control" id="<?php echo usuarioTableClass::getNameField(usuarioTableClass::ID, true) ?>"  name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::ID, true) ?>">
                        <option>---<?php echo i18n::__('user_select')?>---</option>
<?php foreach ($objUsuarios as $usuario): ?>
                            <option value="<?php echo $objUsuarios->$id ?>"><?php echo $usuario->$user ?></option>
<?php endforeach; ?>
                    </select>
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