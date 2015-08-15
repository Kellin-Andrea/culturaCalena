<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\session\sessionClass as session ?>
<?php use mvc\request\requestClass as request ?>
<?php $id = organizacionTableClass::ID ?>
<?php $nombre = organizacionTableClass::NOMBRE ?>
<?php $direccion = organizacionTableClass::DIRECCION ?>
<?php $tele = organizacionTableClass::TELEFONO ?>
<?php $fax = organizacionTableClass::FAX ?>
<?php $correo = organizacionTableClass::CORREO ?>
<?php $page = organizacionTableClass::PAGINA_WEB ?>


<div class="container container-fluid">
    <div class="panel panel-primary">
      
        <div class="panel-body">
<form  id ="formulario" class="form-horizontal" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('organizacion', ((isset($objorganizacion)) ? 'update' : 'create')) ?>">


    <?php if (isset($objorganizacion) == true) : ?>
        <input name="<?php echo organizacionTableClass::getNameField(organizacionTableClass::ID, true) ?>" value="<?php echo $objorganizacion[0]->$id ?>" type="hidden">
    <?php endif ?>

    <div class="form-group">
        <label for="<?php echo organizacionTableClass::getNameField(organizacionTableClass::NOMBRE, true) ?>"  name="<?php echo organizacionTableClass::getNameField(organizacionTableClass::NOMBRE, true) ?>" class="col-sm-2 control-label"><?php echo i18n::__('name') ?></label>
        <div class="col-sm-7">
            <?php mvc\view\viewClass::getMessageError('inputname') ?>
            <input type="text"  class="form-control" id="<?php echo organizacionTableClass::getNameField(organizacionTableClass::NOMBRE, true) ?>"  name="<?php echo organizacionTableClass::getNameField(organizacionTableClass::NOMBRE, true) ?>" 
                   value="<?php echo (session::getInstance()->hasFlash(organizacionTableClass::getNameField(organizacionTableClass::NOMBRE, true)) === true) ? request::getInstance()->getPost(organizacionTableClass::getNameField(organizacionTableClass::NOMBRE, true)) : ((( isset($objorganizacion) == true ) ? $objorganizacion[0]->$nombre : '' )) ?>" placeholder="<?php echo i18n::__('name')?>">
        </div>
    </div>
    <div class="form-group"> 
        <label for="<?php echo organizacionTableClass::getNameField(organizacionTableClass::DIRECCION, true) ?>"  name="<?php echo organizacionTableClass::getNameField(organizacionTableClass::DIRECCION, true) ?>" class="col-sm-2 control-label"><?php echo i18n::__('adress') ?></label>
        <div class="col-sm-7">
            <?php mvc\view\viewClass::getMessageError('inputadress') ?>
            <input type="text"  class="form-control" id="<?php echo organizacionTableClass::getNameField(organizacionTableClass::DIRECCION, true) ?>"  name="<?php echo organizacionTableClass::getNameField(organizacionTableClass::DIRECCION, true) ?>" 
                   value="<?php echo (session::getInstance()->hasFlash(organizacionTableClass::getNameField(organizacionTableClass::DIRECCION, true)) === true) ? request::getInstance()->getPost(organizacionTableClass::getNameField(organizacionTableClass::DIRECCION, true)) : ((( isset($objorganizacion) == true ) ? $objorganizacion[0]->$direccion : '' )) ?>" placeholder="<?php echo i18n::__('adress')?>">
        </div>
    </div>
    <div class="form-group"> 
        <label for="<?php echo organizacionTableClass::getNameField(organizacionTableClass::TELEFONO, true) ?>"  name="<?php echo organizacionTableClass::getNameField(organizacionTableClass::TELEFONO, true) ?>" class="col-sm-2 control-label"><?php echo i18n::__('phone') ?></label>
        <div class="col-sm-7">
            <?php mvc\view\viewClass::getMessageError('inputphone') ?>
            <input type="text"  class="form-control" id="<?php echo organizacionTableClass::getNameField(organizacionTableClass::TELEFONO, true) ?>"  name="<?php echo organizacionTableClass::getNameField(organizacionTableClass::TELEFONO, true) ?>" 
                   value="<?php echo (session::getInstance()->hasFlash(organizacionTableClass::getNameField(organizacionTableClass::TELEFONO, true)) === true) ? request::getInstance()->getPost(organizacionTableClass::getNameField(organizacionTableClass::TELEFONO, true)) : ((( isset($objorganizacion) == true ) ? $objorganizacion[0]->$tele : '' )) ?>" placeholder=<?php echo i18n::__('phone')?>>
        </div>
    </div>
        <div class="form-group"> 
    <label for="<?php echo organizacionTableClass::getNameField(organizacionTableClass::FAX, true) ?>"  name="<?php echo organizacionTableClass::getNameField(organizacionTableClass::FAX, true) ?>" class="col-sm-2 control-label"><?php echo i18n::__('facsimil') ?></label>
    <div class="col-sm-7">
        <?php mvc\view\viewClass::getMessageError('inputfax') ?>
        <input type="text"  class="form-control" id="<?php echo organizacionTableClass::getNameField(organizacionTableClass::FAX, true) ?>"  name="<?php echo organizacionTableClass::getNameField(organizacionTableClass::FAX, true) ?>" 
               value="<?php echo (session::getInstance()->hasFlash(organizacionTableClass::getNameField(organizacionTableClass::FAX, true)) === true) ? request::getInstance()->getPost(organizacionTableClass::getNameField(organizacionTableClass::FAX, true)) : ((( isset($objorganizacion) == true ) ? $objorganizacion[0]->$fax : '' )) ?>" placeholder="<?php echo i18n::__('facsimil')?>">
    </div>
</div>
<div class="form-group"> 
    <label for="<?php echo organizacionTableClass::getNameField(organizacionTableClass::CORREO, true) ?>"  name="<?php echo organizacionTableClass::getNameField(organizacionTableClass::CORREO, true) ?>" class="col-sm-2 control-label"><?php echo i18n::__('e-mail') ?></label>
    <div class="col-sm-7">
         <?php mvc\view\viewClass::getMessageError('inputEmail') ?>
        <input type="text"  class="form-control" id="<?php echo organizacionTableClass::getNameField(organizacionTableClass::CORREO, true) ?>"  name="<?php echo organizacionTableClass::getNameField(organizacionTableClass::CORREO, true) ?>" placeholder="<?php echo i18n::__('e-mail')?>"
               value="<?php echo (session::getInstance()->hasFlash(organizacionTableClass::getNameField(organizacionTableClass::CORREO, true)) === true) ? request::getInstance()->getPost(organizacionTableClass::getNameField(organizacionTableClass::CORREO, true)) : ((( isset($objorganizacion) == true ) ? $objorganizacion[0]->$correo : '' )) ?>" >
    </div>
</div>

<div class="form-group ">
        <label for="<?php echo organizacionTableClass::getNameField(organizacionTableClass::PAGINA_WEB, true) ?>"  name="<?php echo organizacionTableClass::getNameField(organizacionTableClass::PAGINA_WEB, true) ?>" class="col-sm-2 control-label"><?php echo i18n::__('page') ?></label>
        <div class="col-sm-7">
             <?php mvc\view\viewClass::getMessageError('inputwebPage') ?>
            <input type="text"  class="form-control" id="<?php echo organizacionTableClass::getNameField(organizacionTableClass::PAGINA_WEB, true) ?>"  name="<?php echo organizacionTableClass::getNameField(organizacionTableClass::PAGINA_WEB, true) ?>" 
                   value="<?php echo (session::getInstance()->hasFlash(organizacionTableClass::getNameField(organizacionTableClass::PAGINA_WEB, true)) === true) ? request::getInstance()->getPost(organizacionTableClass::getNameField(organizacionTableClass::PAGINA_WEB, true)) : ((( isset($objorganizacion) == true ) ? $objorganizacion[0]->$page : '' )) ?>" placeholder="<?php echo i18n::__('webPage')?>">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-5 col-sm-">

            <button type="submit" class="btn btn-primary"><?php echo i18n::__('register') ?></button>
        </div>
    </div>
</form> 
            
        </div>
    </div>
</div>
    