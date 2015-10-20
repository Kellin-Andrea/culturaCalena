<?php
use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\session\sessionClass as session ?>
<?php
use mvc\request\requestClass as request ?>
<?php $id = pqrsTableClass::ID ?>
<?php $titulo = pqrsTableClass::TITULO ?>
<?php $contenido = pqrsTableClass::CONTENIDO ?>
<?php $estadoPqrs_id = pqrsTableClass::ESTADO_PQRS ?>
<?php $tipoPqrs_id = pqrsTableClass::TIPO_PQRS?>
<?php $respuesta = detallePqrsTableClass::RESPUESTA ?>
<?php $usuarioid = pqrsTableClass::USUARIO_ID ?>
<div class="container container-fluid">
  <div class="panel panel-primary">
    <div class="panel-body">
      <form  id ="formulario" class="form-horizontal" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('pqrs', ((isset($objpqrs)) ? 'update' : 'create')) ?>">
        <?php if (isset($objpqrs) == true) : ?>
          <input name="<?php echo pqrsTableClass::getNameField(pqrsTableClass::ID, true) ?>" value="<?php echo $objpqrs[0]->$id ?>" type="hidden">
        <?php endif ?>

        <?php //  if (session::getInstance()->hasCredential('admin')): ?>

        <?php //  else: ?>
          <div class="form-group <?php // echo (session::getInstance()->hasFlash('inputTipo')) ? 'has-error has-feedback' : '' ?>">

            <label for="<?php echo pqrsTableClass::getNameField(pqrsTableClass::TIPO_PQRS, true) ?>"  name="<?php echo tipoPqrsTableClass::getNameField(pqrsTableClass::TIPO_PQRS, true) ?>" class="col-sm-2 control-label"><?php echo i18n::__('feedbackType') ?></label>
            <div class="col-sm-7">
              <?php mvc\view\viewClass::getMessageError('inputTipo') ?>
              <select class="form-control" id="<?php echo pqrsTableClass::getNameField(pqrsTableClass::ID, true) ?>"  name="<?php echo pqrsTableClass::getNameField(pqrsTableClass::TIPO_PQRS, true) ?>">
              <option value="">----------------------<?php echo i18n::__('locality_select') ?> -----------------</option>
              <?php foreach ($objtipoPqrs as $tipoPqrs): ?>
              <option value="<?php echo $tipoPqrs->id; ?>"<?php echo (isset($objpqrs)) ? ($tipoPqrs->id === $objpqrs[0]->$tipoPqrs_id) ? 'selected' : '' : '' ?>><?php echo tipoPqrsTableClass::getNombreById($tipoPqrs->id) ?></option>
              <?php endforeach ?>


            </select> 
            </div>
          </div>
        <?php //  endif; ?>
          
          
        <?php if (session::getInstance()->hasCredential('admin')): ?>

       <div class="form-group <?php echo (session::getInstance()->hasFlash('inputrespuesta')) ? 'has-error has-feedback' : '' ?>">


         <label for="<?php echo detallePqrsTableClass::getNameField(detallePqrsTableClass::RESPUESTA, true) ?>" name="<?php echo detallePqrsTableClass::getNameField(detallePqrsTableClass::RESPUESTA, true) ?>"  class="col-sm-2 control-label"><?php echo i18n::__('answer') ?></label>

          <div class="col-sm-7">
            <textarea class="form-control input-sm" id="<?php echo detallePqrsTableClass::getNameField(detallePqrsTableClass::RESPUESTA, true) ?>" name="<?php echo detallePqrsTableClass::getNameField(detallePqrsTableClass::RESPUESTA, true) ?>" placeholder="<?php echo i18n::__('answer') ?>" value="<?php // echo (session::getInstance()->hasFlash(detallePqrsTableClass::getNameField(detallePqrsTableClass::RESPUESTA, TRUE)) === TRUE) ? request::getInstance()->getPost(detallePqrsTableClass::getNameField(detallePqrsTableClass::RESPUESTA, TRUE)) : (((isset($objpqrs) == true) ? $objpqrs[0]->$respuesta : '')) ?>"></textarea>
            <?php if (session::getInstance()->hasFlash(detallePqrsTableClass::getNameField(detallePqrsTableClass::RESPUESTA, TRUE)) === TRUE): ?>
              <span class="glyphicon glyphicon-remove form-control-feedback" ></span> 
            <?php endif ?>

          </div>                     

        </div>



          <div class="form-group">
            <label  class="col-sm-2 control-label"></label>

            <div class="col-sm-7">
              <input type="text" class="form-control" placeholder="<?php echo i18n::__('user') ?>"  name="<?php echo pqrsTableClass::getNameField(pqrsTableClass::USUARIO_ID, true) ?>" id="<?php echo pqrsTableClass::getNameField(pqrsTableClass::USUARIO_ID, true) ?>" value="<?php echo (session::getInstance()->hasFlash(pqrsTableClass::getNameField(pqrsTableClass::USUARIO_ID, TRUE)) === TRUE) ? request::getInstance()->getPost(pqrsTableClass::getNameField(pqrsTableClass::USUARIO_ID, TRUE)) : (((isset($objpqrs) == true) ? $objpqrs[0]->$usuarioid : '')) ?>" readonly>
              <?php if (session::getInstance()->hasFlash(pqrsTableClass::getNameField(pqrsTableClass::USUARIO_ID, TRUE)) === TRUE): ?>
                <span class="glyphicon glyphicon-remove form-control-feedback" ></span> 
              <?php endif ?>
            </div>
          </div>



          <div class="form-group <?php // echo (session::getInstance()->hasFlash('inputEstado')) ? 'has-error has-feedback' : '' ?>">


            <label for="<?php echo pqrsTableClass::getNameField(pqrsTableClass::ESTADO_PQRS, true) ?>"  name="<?php echo pqrsTableClass::getNameField(pqrsTableClass::ESTADO_PQRS, true) ?>" class="col-sm-2 control-label"><?php echo i18n::__('pqrsfState') ?></label>

            <div class=" col-sm-7">
              <select class="form-control" id="<?php echo pqrsTableClass::getNameField(pqrsTableClass::ID, true) ?>"  name="<?php echo pqrsTableClass::getNameField(pqrsTableClass::ESTADO_PQRS, true) ?>">
              <option value="">----------------------<?php echo i18n::__('locality_select') ?> -----------------</option>
              <?php foreach ($objestado as $estadoPqrs): ?>
              <option value="<?php echo $estadoPqrs->id; ?>"<?php echo (isset($objpqrs)) ? ($estadoPqrs->id === $objpqrs[0]->$estadoPqrs_id ) ? 'selected' : '' : '' ?>><?php echo estadoPqrsTableClass::getNombreById($estadoPqrs->id) ?></option>
              <?php endforeach ?>


            </select> 
            </div>
          </div>
        <?php endif; ?>


        <div class="form-group <?php echo (session::getInstance()->hasFlash('inputTitulo')) ? 'has-error has-feedback' : '' ?>">
          <label for="<?php echo pqrsTableClass::getNameField(pqrsTableClass::TITULO, true) ?>"  name="<?php echo pqrsTableClass::getNameField(pqrsTableClass::TITULO, true) ?>" class="col-sm-2 control-label"><?php echo i18n::__('title') ?></label>
          <div class="col-sm-7">
            <?php mvc\view\viewClass::getMessageError('inputTitulo') ?>       
            <input type="text"  class="form-control" id="<?php echo pqrsTableClass::getNameField(pqrsTableClass::TITULO, true) ?>"  name="<?php echo pqrsTableClass::getNameField(pqrsTableClass::TITULO, true) ?>" 
                   value="<?php echo (request::getInstance()->hasPost(pqrsTableClass::getNameField(pqrsTableClass::TITULO, true)) === true) ? request::getInstance()->getPost(pqrsTableClass::getNameField(pqrsTableClass::TITULO, true)) : ((( isset($objpqrs) == true ) ? $objpqrs[0]->$titulo : '' )) ?>" Placeholder="<?php echo i18n::__('title') ?>">
          </div>
        </div>

        <div class="form-group <?php echo (session::getInstance()->hasFlash('inputContenido')) ? 'has-error has-feedback' : '' ?>">


          <label for="<?php echo pqrsTableClass::getNameField(pqrsTableClass::CONTENIDO, true) ?>" name="<?php echo pqrsTableClass::getNameField(pqrsTableClass::CONTENIDO, true) ?>"  class="col-sm-2 control-label"><?php echo i18n::__('content') ?></label>

          <div class="col-sm-7">
            <textarea class="form-control input-sm" id="<?php echo pqrsTableClass::getNameField(pqrsTableClass::CONTENIDO, true) ?>" name="<?php echo pqrsTableClass::getNameField(pqrsTableClass::CONTENIDO, true) ?>" placeholder="<?php echo i18n::__('content') ?>" value="<?php echo (session::getInstance()->hasFlash(pqrsTableClass::getNameField(pqrsTableClass::CONTENIDO, TRUE)) === TRUE) ? request::getInstance()->getPost(pqrsTableClass::getNameField(pqrsTableClass::CONTENIDO, TRUE)) : (((isset($objpqrs) == true) ? $objpqrs[0]->$contenido : '')) ?>" <?php if (session::getInstance()->getUserId() == 1): ?>readonly <?php endif; ?>><?php echo (((isset($objpqrs) == true) ? $objpqrs[0]->$contenido : '')) ?></textarea>
            <?php if (session::getInstance()->hasFlash(pqrsTableClass::getNameField(pqrsTableClass::CONTENIDO, TRUE)) === TRUE): ?>
              <span class="glyphicon glyphicon-remove form-control-feedback" ></span> 
            <?php endif ?>

          </div>                     

        </div>





    </div> 







    <div class="form-group">
      <div class="col-sm-offset-5 col-sm-">
        <a href="<?php echo routing::getInstance()->getUrlWeb('profile', 'index') ?>" type="button" class="btn btn-success" class="btn btn-danger btn-xs"> <i class="fa fa-home"></i></a>
        <button type="submit" class="btn btn-primary"><?php echo i18n::__('register') ?></button>
      </div>
    </div>
    </form> 

  </div>
</div>