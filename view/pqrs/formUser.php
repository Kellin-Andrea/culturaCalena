<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\session\sessionClass as session ?>
<?php use mvc\request\requestClass as request ?>
<?php $id = pqrsTableClass::ID ?>
<?php $titulo = pqrsTableClass::TITULO ?>
<?php $contenido = pqrsTableClass::CONTENIDO ?>
<?php $Id =  pqrsTableClass::TIPO_PQRS ?>
<?php $nombre = tipoPqrsTableClass::NOMBRE ?>


<div class="container container-fluid">
    <div class="panel panel-primary">
        <div class="panel-body">

<form  id ="formulario" class="form-horizontal" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('pqrs', ((isset($objpqrs)) ? 'update' : 'create')) ?>">


    <?php if (isset($objpqrs) == true) : ?>
    <input name="<?php echo pqrsTableClass::getNameField(pqrsTableClass::ID, true) ?>" value="<?php echo $objpqrs[0]->$id ?>" type="hidden">
    <?php endif ?>

    <div class="form-group">
        <label for="<?php echo pqrsTableClass::getNameField(pqrsTableClass::TITULO, true) ?>"  name="<?php echo pqrsTableClass::getNameField(pqrsTableClass::TITULO, true) ?>" class="col-sm-2 control-label"><?php echo i18n::__('title') ?></label>
        <div class="col-sm-7">
             <?php mvc\view\viewClass::getMessageError('inputTitulo') ?>       
            <input type="text"  class="form-control" id="<?php echo pqrsTableClass::getNameField(pqrsTableClass::TITULO, true) ?>"  name="<?php echo pqrsTableClass::getNameField(pqrsTableClass::TITULO, true) ?>" 
                   value="<?php echo (session::getInstance()->hasFlash(pqrsTableClass::getNameField(pqrsTableClass::TITULO, true)) === true) ? request::getInstance()->getPost(pqrsTableClass::getNameField(pqrsTableClass::TITULO, true)) : ((( isset($objpqrs) == true ) ? $objpqrs[0]->$titulo : '' )) ?>" Placeholder="<?php echo i18n::__('title') ?>">
        </div>
    </div>
    
    <div class="form-group">
        <label for="<?php echo pqrsTableClass::getNameField(pqrsTableClass::CONTENIDO, true) ?>"  name="<?php echo pqrsTableClass::getNameField(pqrsTableClass::CONTENIDO, true) ?>" class="col-sm-2 control-label"><?php echo i18n::__('content') ?></label>
        <div class="col-sm-7">
             <?php mvc\view\viewClass::getMessageError('inputContenido') ?>             
            <input type="text"  class="form-control" id="<?php echo pqrsTableClass::getNameField(pqrsTableClass::CONTENIDO, true) ?>"  name="<?php echo pqrsTableClass::getNameField(pqrsTableClass::CONTENIDO, true) ?>" 
                   value="<?php echo (session::getInstance()->hasFlash(pqrsTableClass::getNameField(pqrsTableClass::CONTENIDO, true)) === true) ? request::getInstance()->getPost(pqrsTableClass::getNameField(pqrsTableClass::CONTTENIDO, true)) : ((( isset($objpqrs) == true ) ? $objpqrs[0]->$contenido : '' )) ?>" Placeholder="<?php echo i18n::__('content') ?>">
        </div>
    </div>
     
    <div class="form-group">

        <label for="<?php echo pqrsTableClass::getNameField(pqrsTableClass::TIPO_PQRS, true) ?>"  name="<?php echo tipoPqrsTableClass::getNameField(pqrsTableClass::TIPO_PQRS, true) ?>" class="col-sm-2 control-label"><?php echo i18n::__('feedbackType') ?></label>
                <div class="col-sm-7">
                    <?php mvc\view\viewClass::getMessageError('inputTipo') ?>
                    <select class="form-control" id="<?php echo pqrsTableClass::getNameField(pqrsTableClass::TIPO_PQRS, true) ?>"  name="<?php echo pqrsTableClass::getNameField(pqrsTableClass::TIPO_PQRS, true) ?>">
                        <option value=""> -----Seleccione una tipo pqrs -----    </option>
                        <?php foreach ($objtipoPqrs as $tipoPqrs): ?>
                            <option value="<?php echo $tipoPqrs->id ?>"><?php echo $tipoPqrs->$nombre ?></option>

                        <?php endforeach ?>
                    </select>
                </div>
            </div>

 <div class="form-group">
        <label for="<?php echo pqrsTableClass::getNameField(pqrsTableClass::ESTADO_PQRS, true) ?>"  name="<?php echo pqrsTableClass::getNameField(pqrsTableClass::ESTADO_PQRS, true) ?>" class="col-sm-2 control-label"><?php echo i18n::__('pqrsfState') ?></label>
        <div class="col-sm-7">
                 <?php mvc\view\viewClass::getMessageError('inputEstado') ?>

                    <select class="form-control" id="<?php echo pqrsTableClass::getNameField(pqrsTableClass::ESTADO_PQRS, true) ?>"  name="<?php echo pqrsTableClass::getNameField(pqrsTableClass::ESTADO_PQRS, true) ?>">
                        <option value=""> -----Seleccione una estado pqrs -----    </option>
                        <?php foreach ($objestado as $estadoPqrs): ?>
                            <option value="<?php echo $estadoPqrs->id ?>"><?php echo $estadoPqrs->$nombre ?></option>

                        <?php endforeach ?>
                    </select>
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
    