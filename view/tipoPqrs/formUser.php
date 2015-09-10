<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\session\sessionClass as session ?>
<?php use mvc\request\requestClass as request ?>
<?php $id = tipoPqrsTableClass::ID ?>
<?php $nombre = tipoPqrsTableClass::NOMBRE?>


<div class="container container-fluid">
    <div class="panel panel-primary">
        
        <div class="panel-body">
  <form class="form-horizontal" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('tipoPqrs', ((isset($objtipoPqrs)) ? 'update' : 'create')) ?>">
  
       <?php if (isset($objtipoPqrs)== true) :?>
      <input name="<?php echo tipoPqrsTableClass::getNameField(tipoPqrsTableClass::ID, true) ?>" value="<?php  echo $objtipoPqrs[0]->$id?>" type="hidden">
    <?php endif ?>
    
      <div class="form-group <?php echo (session::getInstance()->hasFlash('inputname')) ? 'has-error has-feedback' : '' ?>">
          <label for="<?php echo tipoPqrsTableClass::getNameField(tipoPqrsTableClass::NOMBRE, true)?>"  name="<?php echo tipoPqrsTableClass::getNameField(tipoPqrsTableClass::NOMBRE, true)?><" class="col-sm-2 control-label"> <?php echo i18n::__('feedbackType')?></label>
    <div class="col-sm-7">
        <?php mvc\view\viewClass::getMessageError('inputname') ?>
        <input  type="text" class="form-control" id="<?php echo tipoPqrsTableClass::getNameField(tipoPqrsTableClass::NOMBRE, true)?>"  name="<?php echo tipoPqrsTableClass::getNameField(tipoPqrsTableClass::NOMBRE, true)?>"
                value="<?php  echo (request::getInstance()->hasPost(tipoPqrsTableClass::getNameField(tipoPqrsTableClass::NOMBRE, true)) === true)  ?  request::getInstance()->getPost(tipoPqrsTableClass::getNameField(tipoPqrsTableClass::NOMBRE, true)) :  ((( isset($objtipoPqrs) == true ) ?  $objtipoPqrs[0]->$tipoPqrs :  '' ))  ?>"placeholder="<?php echo i18n::__('feedbackType') ?>"
    </div>
  </div>
      <div class="form-group">
    <div class="col-sm-offset-5 col-sm-10">
        <a  href="<?php echo routing::getInstance()->getUrlWeb('tipoPqrs', 'index') ?>" type="button" class="btn btn-success" class="btn btn-danger btn-xs"> <i class="fa fa-home"></i></a>
        <button type="submit" class="btn btn-primary"><?php echo i18n::__('register')?></button>
    </div>
  </div>
</form>
            
        </div>
    </div>
</div>

            