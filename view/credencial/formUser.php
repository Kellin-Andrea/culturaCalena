<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\session\sessionClass as session ?>
<?php use mvc\request\requestClass as request ?>
<?php $id = credencialTableClass::ID ?>
<?php $nombre = credencialTableClass::NOMBRE?>

<div class="container container-fluid">
    <div class="panel panel-primary">
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('credencial', ((isset($objcredenciales)) ? 'update' : 'create')) ?>">

                <?php if (isset($objcredenciales) == true) : ?>
                    <input name="<?php echo credencialTableClass::getNameField(credencialTableClass::ID, true) ?>" value="<?php echo $objcredenciales[0]->$id ?>" type="hidden">
                <?php endif ?>

                <div class="form-group <?php echo (session::getInstance()->hasFlash('inputname')) ? 'has-error has-feedback' : '' ?>">
                    <label for="<?php echo credencialTableClass::getNameField(credencialTableClass::NOMBRE, true) ?>"  name="<?php echo credencialTableClass::getNameField(credencialTableClass::NOMBRE, true) ?><" class="col-sm-2 control-label"> <?php echo i18n::__('name_credential') ?></label>
                    <div class="col-sm-7">
                        <?php mvc\view\viewClass::getMessageError('inputname') ?>
                        <input  type="text" class="form-control" id="<?php echo credencialTableClass::getNameField(credencialTableClass::NOMBRE, true) ?>"  name="<?php echo credencialTableClass::getNameField(credencialTableClass::NOMBRE, true) ?>"
                                value="<?php echo (request::getInstance()->hasPost(credencialTableClass::getNameField(credencialTableClass::NOMBRE, true)) === true) ? request::getInstance()->getPost(credencialTableClass::getNameField(credencialTableClass::NOMBRE, true)) : ((( isset($objcredenciales) == true ) ? $objcredenciales[0]->$nombre : '' )) ?>" placeholder=<?php echo i18n::__('credential') ?>>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-10">
                        <a href="<?php echo routing::getInstance()->getUrlWeb('credencial', 'index') ?>" type="button" class="btn btn-success" class="btn btn-danger btn-xs"> <i class="fa fa-home"></i></a>                                     
                        <button type="submit" class="btn btn-primary"><?php echo i18n::__('register') ?></button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>            

