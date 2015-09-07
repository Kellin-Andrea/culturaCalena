<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\session\sessionClass as session ?>
<?php
use mvc\request\requestClass as request ?>
<?php $id = detallePqrsTableClass::ID ?>
<?php $rsp = detallePqrsTableClass::RESPUESTA ?>


<div class="container container-fluid">
    <div class="panel panel-primary">

        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('detallePqrs', ((isset($objdetalle)) ? 'update' : 'create')) ?>">

                <?php if (isset($objdetalle) == true) : ?>
                    <input name="<?php echo detallePqrsTableClass::getNameField(detallePqrsTableClass::ID, true) ?>" value="<?php echo $objdetalle[0]->$id ?>" type="hidden">
                <?php endif ?>

                <div class="form-group <?php echo (session::getInstance()->hasFlash('inputrespuesta')) ? 'has-error has-feedback' : '' ?>">
                    <label for="<?php echo detallePqrsTableClass::getNameField(detallePqrsTableClass::RESPUESTA, true) ?>"  name="<?php echo detallePqrsTableClass::getNameField(detallePqrsTableClass::RESPUESTA, true) ?><" class="col-sm-2 control-label"> <?php echo i18n::__('answer') ?></label>
                    <div class="col-sm-7">
                        <?php mvc\view\viewClass::getMessageError('inputrespuesta') ?>
                        <input  type="text" class="form-control" id="<?php echo detallePqrsTableClass::getNameField(detallePqrsTableClass::RESPUESTA, true) ?>"  name="<?php echo detallePqrsTableClass::getNameField(detallePqrsTableClass::RESPUESTA, true) ?>"
                                value="<?php echo (session::getInstance()->hasFlash(detallePqrsTableClass::getNameField(detallePqrsTableClass::RESPUESTA, true)) === true) ? request::getInstance()->getPost(detallePqrsTableClass::getNameField(detallePqrsTableClass::RESPUESTA, true)) : ((( isset($objdetalle) == true ) ? $objdetalle[0]->$rsp : '' )) ?>" placeholder="<?php echo i18n::__('answer') ?>">
                    </div>
                </div>
             
                <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-10">
                        <a href="<?php echo routing::getInstance()->getUrlWeb('detallePqrs', 'index') ?>" type="button" class="btn btn-success" class="btn btn-danger btn-xs"> <i class="fa fa-home"></i></a>
                        <button type="submit" class="btn btn-primary"><?php echo i18n::__('register') ?></button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>