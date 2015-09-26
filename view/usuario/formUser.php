<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\session\sessionClass as session ?>
<?php
use mvc\request\requestClass as request ?>
<?php
use mvc\view\viewClass as view ?>
<?php $id = usuarioTableClass::ID ?>
<?php $user = usuarioTableClass::USER ?>


<div class="container container-fluid">
    <div class="panel panel-primary">

        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('default', ((isset($objUsuarios)) ? 'update' : 'create')) ?>">

                <?php if (isset($objUsuarios) == true) : ?>
                    <input name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::ID, true) ?>" value="<?php echo $objUsuarios[0]->$id ?>" type="hidden">
                <?php endif ?>



                <div class="form-group <?php echo (session::getInstance()->hasFlash('inputUser')) ? 'has-error has-feedback' : '' ?>">

                    <label for="<?php echo usuarioTableClass::getNameField(usuarioTableClass::USER, true) ?>"  name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::USER, true) ?>" class="col-sm-2 control-label"><?php echo i18n::__('name') ?></label>
                       <?php mvc\view\viewClass::getMessageError('inputUser') ?>
                    <div class="col-sm-10">
                        


                        <input type="text" class="form-control" id="<?php echo usuarioTableClass::getNameField(usuarioTableClass::USER, true) ?>"  name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::USER, true) ?>" 
                               value="<?php echo (session::getInstance()->hasFlash(usuarioTableClass::getNameField(usuarioTableClass::USER, true)) === true) ? request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::USER, true)) : ((( isset($objUsuarios) == true ) ? $objUsuarios[0]->$user : '' )) ?>" placeholder="<?php echo i18n::__('insertNameUser') ?>">
                    </div>
                </div>

                <div class="form-group <?php echo (session::getInstance()->hasFlash('inputPass1')) ? 'has-error has-feedback' : '' ?>">

                    <label value="<?php echo (session::getInstance()->hasFlash(usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true)) === true) ? request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true)) : (session::getInstance()->hasFlash('edit') === true) ? $objUsuarios[0]->$usuario : ' ' ?>for="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) . '_1' ?>"  name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) . '_1' ?>" class="col-sm-2 control-label"><?php echo i18n::__('pass') ?></label>
                    <?php mvc\view\viewClass::getMessageError('inputPass1') ?>
                    <div class="col-sm-10">
                        


                        <input type="password" class="form-control" id="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) . '_1' ?>"  name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) . '_1' ?>" placeholder="<?php echo i18n::__('insertPass') ?>">

                    </div>
                </div>

                <div class="form-group">
                    <label for="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) . '_2' ?>"  name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) . '_2' ?>" class="col-sm-2 control-label"><?php echo i18n::__('verifyPass') ?></label>
                   <?php mvc\view\viewClass::getMessageError('inputPass2') ?>
                    <div class="col-sm-10">
                        


                        <input type="password" class="form-control" id="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) . '_2' ?>"  name=<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) . '_2' ?> placeholder="<?php echo i18n::__('verifyPass') ?>"> 

                    </div>
                </div>     
                <div class="form-group">
                    <div class="col-sm-offset-5 col-lg-2">
                        <a href="<?php echo routing::getInstance()->getUrlWeb('usuario', 'index') ?>" type="button" class="btn btn-success" class="btn btn-danger btn-xs"> <i class="fa fa-home"></i></a>
                        <button type="submit" class="btn-lg btn-primary"><?php echo i18n::__('register') ?></button>


                    </div>
                </div>
        </div>


    </div>
</div>
</div> 
</div>