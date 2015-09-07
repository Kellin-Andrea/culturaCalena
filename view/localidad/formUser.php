<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\session\sessionClass as session ?>
<?php use mvc\request\requestClass as request ?>
<?php $id = localidadTableClass::ID ?>
<?php $local = localidadTableClass::NOMBRE?>

<div class="container container-fluid">
    <div class="panel panel-primary">
        <div class="panel-body">

            <form class="form-horizontal" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('localidad', ((isset($objlocal)) ? 'update' : 'create')) ?>">

                <?php if (isset($objlocal) == true) : ?>
                    <input name="<?php echo localidadTableClass::getNameField(localidadTableClass::ID, true) ?>" value="<?php echo $objlocal[0]->$id ?>" type="hidden">
                <?php endif ?>

                <div class="form-group <?php echo (session::getInstance()->hasFlash('inputname')) ? 'has-error has-feedback' : '' ?>">
                    <label for="<?php echo localidadTableClass::getNameField(localidadTableClass::NOMBRE, true) ?>"  name="<?php echo localidadTableClass::getNameField(localidadTableClass::NOMBRE, true) ?><" class="col-sm-2 control-label"> <?php echo i18n::__('locality') ?></label>
                    <div class="col-sm-7">
                        <?php mvc\view\viewClass::getMessageError('inputname') ?>
                        <input  type="text" class="form-control" id="<?php echo localidadTableClass::getNameField(localidadTableClass::NOMBRE, true) ?>"  name="<?php echo localidadTableClass::getNameField(localidadTableClass::NOMBRE, true) ?>"
                                value="<?php echo (session::getInstance()->hasFlash(localidadTableClass::getNameField(localidadTableClass::NOMBRE, true)) === true) ? request::getInstance()->getPost(localidadTableClass::getNameField(localidadTableClass::NOMBRE, true)) : ((( isset($objlocal) == true ) ? $objlocal[0]->$local : '' )) ?>" placeholder=<?php echo i18n::__('locality') ?>>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-10">
                        <a href="<?php echo routing::getInstance()->getUrlWeb('localidad', 'index') ?>" type="button" class="btn btn-success" class="btn btn-danger btn-xs"> <i class="fa fa-home"></i></a>
                        <button type="submit" class="btn btn-primary"><?php echo i18n::__('register') ?></button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>