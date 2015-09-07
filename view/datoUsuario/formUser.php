<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\session\sessionClass as session ?>
<?php
use mvc\request\requestClass as request ?>
<?php $id = datoUsuarioTableClass::ID ?>
<?php $nombre = datoUsuarioTableClass::NOMBRE ?>
<?php $apell = datoUsuarioTableClass::APELLIDO ?>
<?php $mail = datoUsuarioTableClass::CORREO ?>
<?php $dateF = datoUsuarioTableClass::FECHA_NACIMIENTO ?>
<?php $Id = datoUsuarioTableClass::LOCALIDAD_ID ?>
<?php $tipo_id = datoUsuarioTableClass::TIPO_DOCUMENTO_ID ?>
<?php $organizacion_id = datoUsuarioTableClass::ORGANIZACION_ID ?>
<?php $user = usuarioTableClass::USER ?>





<div class="container container-fluid">
  <div class="panel panel-primary">

    <div class="panel-body">
      <form class="form-horizontal" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('datoUsuario', ((isset($objdatos)) ? 'update' : 'create')) ?>">

        <?php if (isset($objUsuarios) == true) : ?>
          <input name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::ID, true) ?>" value="<?php echo $objUsuarios[0]->$id ?>" type="hidden">
        <?php endif ?>

          <?php if (session::getInstance()->hasFlash('edit') === false): ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash('inputUser')) ? 'has-error has-feedback' : '' ?>">
          <label for="<?php echo usuarioTableClass::getNameField(usuarioTableClass::USER, true) ?>"  name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::USER, true) ?>" class="col-sm-2 control-label"><?php echo i18n::__('nameUser') ?></label>
          <div class="col-sm-7">
            <?php mvc\view\viewClass::getMessageError('inputUser') ?>
            <input type="text" class="form-control" id="<?php echo usuarioTableClass::getNameField(usuarioTableClass::USER, true) ?>"  name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::USER, true) ?>" 
                   value="<?php echo (request::getInstance()->hasPost(usuarioTableClass::getNameField(usuarioTableClass::USER, true)) === true) ? request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::USER, true)) : ((( isset($objUsuarios) == true ) ? $objUsuarios[0]->$user : '' )) ?>" placeholder="<?php echo i18n::__('insertNameUser') ?>">
          </div>
        </div>
          <?php endif ?>

        <div class="form-group <?php echo (session::getInstance()->hasFlash('inputPass')) ? 'has-error has-feedback' : '' ?>">
          <label for="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) . '_1' ?>"  name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) . '_1' ?>" class="col-sm-2 control-label"><?php echo i18n::__('pass') ?></label>
          <div class="col-sm-7">
            <?php mvc\view\viewClass::getMessageError('inputPass') ?>
            <input type="password" class="form-control" id="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) . '_1' ?>"  name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) . '_1' ?>" placeholder="<?php echo i18n::__('insertPass') ?>">
          </div>
        </div>

        <div class="form-group <?php echo (session::getInstance()->hasFlash('inputPass')) ? 'has-error has-feedback' : '' ?>">
          <label for="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) . '_2' ?>"  name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) . '_2' ?>" class="col-sm-2 control-label"><?php echo i18n::__('verifyPass') ?></label>
          <div class="col-sm-7">
            <?php mvc\view\viewClass::getMessageError('inputPass') ?>
            <input type="password" class="form-control" id="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) . '_2' ?>"  name=<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) . '_2' ?> placeholder="<?php echo i18n::__('verifyPass') ?>"> 
          </div>
        </div> 

        <?php if (isset($objdatos) == true) : ?>
          <input name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::ID, true) ?>" value="<?php echo $objdatos[0]->$id ?>" type="hidden">
        <?php endif ?>

        <div class="form-group  <?php echo (session::getInstance()->hasFlash('inputname')) ? 'has-error has-feedback' : '' ?>">
          <label for="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::NOMBRE, true) ?>"  name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::NOMBRE, true) ?>" class="col-sm-2 control-label"><?php echo i18n::__('name') ?></label>
          <div class="col-sm-7">
            <?php mvc\view\viewClass::getMessageError('inputname') ?>
            <input type="text" class="form-control" id="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::NOMBRE, true) ?>"  name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::NOMBRE, true) ?>" placeholder="<?php echo i18n::__('name') ?>"
                   value="<?php echo (request::getInstance()->hasPost(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::NOMBRE, true)) === true) ? request::getInstance()->getPost(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::NOMBRE, true)) : ((( isset($objdatos) == true ) ? $objdatos[0]->$nombre : '' )) ?>" placeholder="nameTxtPlacerholder">
          </div>
        </div>


        <div class="form-group <?php echo (session::getInstance()->hasFlash('inputLastName')) ? 'has-error has-feedback' : '' ?>">
          <label for="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::APELLIDO, true) ?>"  name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::APELLIDO, true) ?>" class="col-sm-2 control-label"><?php echo i18n::__('lastName') ?></label>
          <div class="col-sm-7">
            <?php mvc\view\viewClass::getMessageError('inputLastName') ?>
            <input type="text" class="form-control" id="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::APELLIDO, true) ?>"  name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::APELLIDO, true) ?>" placeholder="<?php echo i18n::__('lastName') ?>"
                   value="<?php echo (session::getInstance()->hasFlash(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::APELLIDO, true)) === true) ? request::getInstance()->getPost(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::APELLIDO, true)) : ((( isset($objdatos) == true ) ? $objdatos[0]->$apell : '' )) ?>" placeholder="lastName">
          </div>
        </div>

        <div class="form-group <?php echo (session::getInstance()->hasFlash('inputEmail')) ? 'has-error has-feedback' : '' ?>">

          <label for="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::CORREO, true) ?>"  name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::CORREO, true) ?>" class="col-sm-2 control-label"><?php echo i18n::__('e-mail') ?></label>

          <div class="col-sm-7">
            <?php mvc\view\viewClass::getMessageError('inputEmail') ?>
            <input type="text" class="form-control" id="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::CORREO, true) ?>"  name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::CORREO, true) ?>" placeholder="<?php echo i18n::__('e-mail') ?>"
                   value="<?php echo (session::getInstance()->hasFlash(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::CORREO, true)) === true) ? request::getInstance()->getPost(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::CORREO, true)) : ((( isset($objdatos) == true ) ? $objdatos[0]->$mail : '' )) ?>" placeholder="mail">

          </div>
        </div>

        <div class="form-group <?php echo (session::getInstance()->hasFlash('inputLocalidad')) ? 'has-error has-feedback' : '' ?>">

          <label for="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::LOCALIDAD_ID, true) ?>"  name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::LOCALIDAD_ID, true) ?>" class="col-sm-2 control-label"><?php echo i18n::__('locality') ?></label>

          <div class="col-sm-7">
            <?php mvc\view\viewClass::getMessageError('inputLocalidad') ?>
            <select class="form-control" id="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::ID, true) ?>"  name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::LOCALIDAD_ID, true) ?>">
              <option value="">----------------------<?php echo i18n::__('locality_select') ?> -----------------</option>
              <?php foreach ($objlocal as $localidad): ?>
                <option value="<?php echo $localidad->id; ?>"<?php echo (isset($objdatos)) ? ($localidad->id === $objdatos[0]->localidad_id) ? 'selected' : '' : '' ?>><?php echo localidadTableClass::getNombreById($localidad->id) ?></option>
              <?php endforeach ?>


            </select>                
          </div>
        </div>

        <div class="form-group <?php echo (session::getInstance()->hasFlash('inputdatef')) ? 'has-error has-feedback' : '' ?>">

          <label for="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::FECHA_NACIMIENTO, true) ?>"  name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::FECHA_NACIMIENTO, true) ?>" class="col-sm-2 control-label"><?php echo i18n::__('birth_day') ?></label>

          <div class="col-sm-7">
            <?php mvc\view\viewClass::getMessageError('inputdatef') ?>

            <input type="date" class="form-control" id="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::FECHA_NACIMIENTO, true) ?>"  name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::FECHA_NACIMIENTO, true) ?>" placeholder="<?php echo i18n::__('birth_day') ?>"
                   value="<?php echo (session::getInstance()->hasFlash(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::FECHA_NACIMIENTO, true)) === true) ? request::getInstance()->getPost(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::FECHA_NACIMIENTO, true)) : ((( isset($objdatos) == true ) ? date('Y-m-d', strtotime($objdatos[0]->$dateF)) : '' )) ?>">

          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Seleccione categoria</label>
          <div class="col-sm-7">
            <?php mvc\view\viewClass::getMessageError('chkCategoria') ?>
            <?php foreach ($objCategorias as $categoria): ?>
              <label for="categoria[<?php echo $categoria->id ?>]"><?php echo $categoria->nombre ?></label> <input <?php echo (isset($objUsuarioGustaCategoria) === true and array_search($categoria->id, $objUsuarioGustaCategoria) === false) ? '' : (isset($objUsuarioGustaCategoria) === true) ? 'checked' : '' ?> type="checkbox" value="<?php echo $categoria->id ?>" id="categoria[<?php echo $categoria->id ?>]" name="categoria[<?php echo $categoria->id ?>]"> -
            <?php endforeach ?>
          </div>
        </div>

        <div class="form-group <?php echo (session::getInstance()->hasFlash('inputGenero')) ? 'has-error has-feedback' : '' ?>">

          <label for="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::GENERO, true) ?>"  name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::GENERO, true) ?>" class="col-sm-2 control-label"><?php echo i18n::__('gender') ?></label>

          <div class="col-sm-7">
            <?php mvc\view\viewClass::getMessageError('inputGenero') ?>
            <select  class="form-control" id="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::ID, true) ?>"  name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::GENERO, true) ?>">
              <option value="">---<?php echo i18n::__('gender_select') ?>---</option>
              <option value="true"><?php echo i18n::__('female') ?> </option>
              <option value="false"><?php echo i18n::__('male') ?></option>
            </select>
          </div>
        </div>


        <div class="form-group <?php echo (session::getInstance()->hasFlash('inputTipoDocumento')) ? 'has-error has-feedback' : '' ?>">

          <label for="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::TIPO_DOCUMENTO_ID, true) ?>"  name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::TIPO_DOCUMENTO_ID, true) ?>" class="col-sm-2 control-label"><?php echo i18n::__('document_type') ?></label>

          <div class="col-sm-7">
            <?php mvc\view\viewClass::getMessageError('inputTipoDocumento') ?>
            <select class="form-control" id="<?php echo usuarioTableClass::getNameField(usuarioTableClass::ID, true) ?>"  name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::TIPO_DOCUMENTO_ID, true) ?>">
              <option value=""> -----<?php echo i18n::__('type_select') ?> -----    </option>
              <?php foreach ($objtipoDocumento as $tipo): ?>
                <option value="<?php echo $tipo->id ?>"<?php echo (isset($objdatos)) ? ($tipo->id === $objdatos[0]->$tipo_id) ? 'selected' : '' : '' ?>><?php echo tipoDocumentoTableClass::getNombreById($tipo->id) ?></option>

              <?php endforeach ?>
            </select>
          </div>
        </div>

        <div class="form-group <?php echo (session::getInstance()->hasFlash('inputOrganizacion')) ? 'has-error has-feedback' : '' ?>">

          <label for="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::ORGANIZACION_ID, true) ?>"  name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::ORGANIZACION_ID, true) ?>" class="col-sm-2 control-label"><?php echo i18n::__('organizations') ?></label>

          <div class="col-sm-7">
            <?php mvc\view\viewClass::getMessageError('inputOrganizacion') ?>
            <select class="form-control" d="<?php echo usuarioTableClass::getNameField(usuarioTableClass::ID, true) ?>"  name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::ORGANIZACION_ID, true) ?>">
              <option value=""> -----<?php echo i18n::__('Organizations_select') ?> -----    </option>
              <?php foreach ($objorganizacion as $organizacion): ?>
                <option value="<?php echo $organizacion->id ?>"<?php echo (isset($objdatos)) ? ($organizacion->id === $objdatos[0]->$organizacion_id) ? 'selected' : '' : '' ?>><?php echo organizacionTableClass::getNombreById($organizacion->id) ?></option>

              <?php endforeach ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-5 col-xs-5">
             <a href="<?php echo routing::getInstance()->getUrlWeb('datoUsuario', 'index') ?>" type="button" class="btn btn-success" class="btn btn-danger btn-xlg"> <i class="fa fa-home"></i></a>
            <button type="submit" class="btn-lg btn-primary"><?php echo i18n::__('register') ?></button>


          </div>
        </div>


      </form>

    </div>
  </div>
</div>

