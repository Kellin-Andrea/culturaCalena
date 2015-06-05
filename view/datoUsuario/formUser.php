<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\session\sessionClass as session ?>
<?php use mvc\request\requestClass as request ?>
<?php $id =  datoUsuarioTableClass::ID ?>
<?php $nombre = datoUsuarioTableClass::NOMBRE ?>
<?php $apell = datoUsuarioTableClass::APELLIDO ?>
<?php $mail = datoUsuarioTableClass::CORREO ?>
<?php $Id = datoUsuarioTableClass::LOCALIDAD_ID ?>
<?php $Nombre = localidadTableClass::NOMBRE ?>
<?php $iD = datoUsuarioTableClass::TIPO_DOCUMENTO_ID?>
<?php $name = tipoDocumentoTableClass::NOMBRE ?>
<?php $ID = datoUsuarioTableClass::ORGANIZACION_ID?>
<?php $NOMBRE = organizacionTableClass::NOMBRE ?>



  <div class="container container-fluid">
        <div class="panel panel-primary">
            
            <div class="panel-body">
<form class="form-horizontal" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('datoUsuario', ((isset($objdatos)) ? 'update' : 'create')) ?>">

    <?php if (isset($objdatos)== true) :?>
    <input name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::ID, true) ?>" value="<?php  echo $objdatos[0]->$id ?>" type="hidden">
    <?php endif ?>
   
        
          
            <div class="form-group">

                <label for="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::NOMBRE, true) ?>"  name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::NOMBRE, true) ?>" class="col-sm-2 control-label"><?php echo i18n::__('name') ?></label>

                <div class="col-sm-7">
                <?php mvc\view\viewClass::getMessageError('inputname') ?>

                    <input type="text" class="form-control" id="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::NOMBRE, true) ?>"  name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::NOMBRE, true) ?>" placeholder="<?php echo i18n::__('name') ?>"
                        value="<?php  echo (session::getInstance()->hasFlash(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::NOMBRE, true)) === true)  ?  request::getInstance()->getPost(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::NOMBRE, true)) :  ((( isset($objdatos) == true ) ?  $objdatos[0]->$nombre  :  '' ))  ?>" placeholder="nameTxtPlacerholder">
                </div>
            </div>

            
            <div class="form-group">

                <label for="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::APELLIDO, true) ?>"  name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::APELLIDO, true) ?>" class="col-sm-2 control-label"><?php echo i18n::__('lastName') ?></label>

                <div class="col-sm-7">
                    <?php mvc\view\viewClass::getMessageError('inputLastName') ?>

                    <input type="text" class="form-control" id="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::APELLIDO, true) ?>"  name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::APELLIDO, true) ?>" placeholder="<?php echo i18n::__('lastName') ?>"
                        value="<?php  echo (session::getInstance()->hasFlash(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::APELLIDO, true)) === true)  ?  request::getInstance()->getPost(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::APELLIDO, true)) :  ((( isset($objdatos) == true ) ?  $objdatos[0]->$apell  :  '' ))  ?>" placeholder="lastName">
                </div>
            </div>

            <div class="form-group">

                <label for="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::CORREO, true) ?>"  name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::CORREO, true) ?>" class="col-sm-2 control-label"><?php echo i18n::__('e-mail') ?></label>

                <div class="col-sm-7">
                   <?php mvc\view\viewClass::getMessageError('inputmail') ?>  
                 <input type="text" class="form-control" id="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::CORREO, true) ?>"  name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::CORREO, true) ?>" placeholder="<?php echo i18n::__('e-mail') ?>"
                    value="<?php  echo (session::getInstance()->hasFlash(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::CORREO, true)) === true)  ?  request::getInstance()->getPost(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::CORREO, true)) :  ((( isset($objdatos) == true ) ?  $objdatos[0]->$mail  :  '' ))  ?>" placeholder="mail">

                </div>
             </div>

            <div class="form-group">

                <label for="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::LOCALIDAD_ID, true) ?>"  name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::LOCALIDAD_ID, true) ?>" class="col-sm-2 control-label"><?php echo i18n::__('locality') ?></label>

                <div class="col-sm-7">
                    <?php mvc\view\viewClass::getMessageError('inputLocalidad') ?>
                    <select class="form-control" id="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::ID, true) ?>"  name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::LOCALIDAD_ID, true) ?>">
                        <option value="">----------------------<?php echo i18n::__('locality_select')?> -----------------</option>
                         <?php  foreach ($objlocal as $localidad):  ?>
                        <option value="<?php echo $localidad->id ;?>"><?php echo $localidad->$Nombre;?></option>
                      <?php endforeach ?>
                        
                    
                       </select>                
                </div>
             </div>

            <div class="form-group">

                <label for="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::FECHA_NACIMIENTO, true) ?>"  name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::FECHA_NACIMIENTO, true) ?>" class="col-sm-2 control-label"><?php echo i18n::__('birth_day') ?></label>

                <div class="col-sm-7">
                 <?php mvc\view\viewClass::getMessageError('inputdatef') ?>

                    <input type="date" class="form-control" id="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::FECHA_NACIMIENTO, true) ?>"  name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::FECHA_NACIMIENTO, true) ?>" placeholder="<?php echo i18n::__('birth_day') ?>">

                </div>
             </div>
            <div class="form-group">

                <label for="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::GENERO, true) ?>"  name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::GENERO, true) ?>" class="col-sm-2 control-label"><?php echo i18n::__('gender') ?></label>

                <div class="col-sm-7">
                  <?php mvc\view\viewClass::getMessageError('inputGenero') ?>
                    <select  class="form-control" id="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::ID, true) ?>"  name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::GENERO, true) ?>">
                        <option value="">---<?php echo i18n::__('gender_select')?>---</option>
                        <option value="true"><?php echo i18n::__('female')?> </option>
                        <option value="false"><?php echo i18n::__('male')?></option>
                    </select>
                  </div>
            </div>
             
             
            <div class="form-group">

                <label for="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::TIPO_DOCUMENTO_ID, true) ?>"  name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::TIPO_DOCUMENTO_ID, true) ?>" class="col-sm-2 control-label"><?php echo i18n::__('document_type') ?></label>

                <div class="col-sm-7">
                    <?php mvc\view\viewClass::getMessageError('inputTipoDocumento') ?>
                    <select class="form-control" id="<?php echo usuarioTableClass::getNameField(usuarioTableClass::ID, true) ?>"  name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::TIPO_DOCUMENTO_ID, true) ?>">
                        <option value=""> -----<?php echo i18n::__('type_select')?> -----    </option>
                        <?php  foreach ($objtipoDocumento as $tipo): ?>
                        <option value="<?php echo $tipo->id ?>"><?php echo $tipo->$name?></option>
                 
                         <?php endforeach  ?>
                       </select>
                </div>
            </div>

            <div class="form-group">

                <label for="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::ORGANIZACION_ID, true) ?>"  name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::ORGANIZACION_ID, true) ?>" class="col-sm-2 control-label"><?php echo i18n::__('organizations') ?></label>

                <div class="col-sm-7">
                   <?php mvc\view\viewClass::getMessageError('inputOrganizacion')?>
                    <select class="form-control" d="<?php echo usuarioTableClass::getNameField(usuarioTableClass::ID, true) ?>"  name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::ORGANIZACION_ID, true) ?>">
                        <option value=""> -----<?php echo i18n::__('Organizations_select')?> -----    </option>
                        <?php  foreach ($objorganizacion as $organizacion): ?>
                        <option value="<?php echo $organizacion->id ?>"><?php echo $organizacion->$NOMBRE?></option>
                 
                         <?php endforeach  ?>
                       </select>
                </div>
            </div>
        <div class="form-group">
            <div class="col-sm-offset-5 col-lg-2">
                    <button type="submit" class="btn-lg btn-primary"><?php echo i18n::__('register') ?></button>
           
            
                      </div>
                        </div>


                </form>
                
            </div>
        </div>
   </div>

