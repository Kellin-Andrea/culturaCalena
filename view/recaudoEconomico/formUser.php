<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\session\sessionClass as session ?>
<?php use mvc\request\requestClass as request ?>
<?php $id = recaudoEconomicoTableClass::ID ?>
<?php $observacion = recaudoEconomicoTableClass::OBSERVACION ?>
<?php $Id = recaudoEconomicoTableClass::EVENTO_ID ?>
<?php $ID = recaudoEconomicoTableClass::USUARIO_ID ?>
<?php $obs = recaudoEconomicoTableClass::OBSERVACION ?>
<?php $iD = recaudoEconomicoTableClass::TARIFA_ID ?>
<?php $valor =  recaudoEconomicoTableClass::VALOR_TOTAL?>
<?php $nombre = eventoTableClass::NOMBRE ?>
<?php $user = usuarioTableClass::USER ?>
<?php $desc = tarifaTableClass::DESCRIPCION ?>
<?php $parci = recaudoEconomicoTableClass::VALOR_PARCIAL ?>

<div class="container container-fluid">
    <div class="panel panel-primary">
   
        <div class="panel-body">

<form class="form-horizontal" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('recaudoEconomico', ((isset($objrecaudoEconomico)) ? 'update' : 'create')) ?>">
    
    <?php if (isset($objrecaudoEconomico)== true) :?>
    <input name="<?php echo recaudoEconomicoTableClass::getNameField(recaudoEconomicoTableClass::ID, true) ?>" value="<?php  echo $objrecaudoEconomico[0]->$id?>" type="hidden">
    <?php endif ?>
      
    <div class="form-group">
        <label for="<?php echo recaudoEconomicoTableClass::getNameField(recaudoEconomicoTableClass::EVENTO_ID, true) ?>"  name="<?php echo recaudoEconomicoTableClass::getNameField(recaudoEconomicoTableClass::EVENTO_ID, true) ?>" class="col-sm-2 control-label"><?php echo i18n::__('events') ?></label>
            <div class="col-sm-7">
                <select class="form-control" id="<?php echo recaudoEconomicoTableClass::getNameField(recaudoEconomicoTableClass::EVENTO_ID, true) ?>"  name="<?php echo recaudoEconomicoTableClass::getNameField(recaudoEconomicoTableClass::EVENTO_ID, true) ?>">
                        <option value=""> -----Seleccione un evento -----    </option>
                        <?php  foreach ($objevento as $evento): ?>
                        <option value="<?php echo $evento->id ?>"><?php echo $evento->$nombre?></option>
                 
                         <?php endforeach  ?>
                       </select>
                </div>
             </div>
    <div class="form-group">
        <label for="<?php echo recaudoEconomicoTableClass::getNameField(recaudoEconomicoTableClass::USUARIO_ID, true) ?>"  name="<?php echo recaudoEconomicoTableClass::getNameField(recaudoEconomicoTableClass::USUARIO_ID, true) ?>" class="col-sm-2 control-label"><?php echo i18n::__('user') ?></label>
                  <div class="col-sm-7">
                      <select class="form-control" id="<?php echo recaudoEconomicoTableClass::getNameField(recaudoEconomicoTableClass::USUARIO_ID, true) ?>"  name="<?php echo recaudoEconomicoTableClass::getNameField(recaudoEconomicoTableClass::USUARIO_ID, true) ?>">
                          <option value=""> -----<?php echo i18n::__('user_select')?> -----    </option>
                        <?php  foreach ($objUsuarios as $usuario): ?>
                        <option value="<?php echo $usuario->id ?>"><?php echo $usuario->$user?></option>
                 
                         <?php endforeach  ?>
                       </select>
                </div>
             </div>
    
    <div class="form-group">
        <label for="<?php echo recaudoEconomicoTableClass::getNameField(recaudoEconomicoTableClass::OBSERVACION, true) ?>"  name="<?php echo recaudoEconomicoTableClass::getNameField(recaudoEconomicoTableClass::OBSERVACION, true) ?>" class="col-sm-2 control-label"><?php echo i18n::__('observation')?></label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="<?php echo recaudoEconomicoTableClass::getNameField(recaudoEconomicoTableClass::OBSERVACION, true) ?>"  name="<?php echo recaudoEconomicoTableClass::getNameField(recaudoEconomicoTableClass::OBSERVACION, true) ?>" 
                   value="<?php  echo (session::getInstance()->hasFlash(recaudoEconomicoTableClass::getNameField(recaudoEconomicoTableClass::OBSERVACION, true)) === true)  ?  request::getInstance()->getPost(recaudoEconomicoTableClass::getNameField(recaudoEconomicoTableClass::OBSERVACION, true)) :  ((( isset($objrecaudoEconomico) == true ) ?  $objrecaudoEconomico[0]->$obs  :  '' ))  ?>" placeholder="<?php echo i18n::__('observation')?>">

        </div>
    </div>
    
  <div class="form-group">
      <label for="<?php echo recaudoEconomicoTableClass::getNameField(recaudoEconomicoTableClass::TARIFA_ID, true) ?>"  name="<?php echo recaudoEconomicoTableClass::getNameField(recaudoEconomicoTableClass::TARIFA_ID, true) ?>" class="col-sm-2 control-label"><?php echo i18n::__('rateId') ?></label>
                  <div class="col-sm-7">
                      <select class="form-control" id="<?php echo recaudoEconomicoTableClass::getNameField(recaudoEconomicoTableClass::TARIFA_ID, true) ?>"  name="<?php echo recaudoEconomicoTableClass::getNameField(recaudoEconomicoTableClass::TARIFA_ID, true) ?>">
                          <option value=""> -----<?php echo i18n::__('rate_select')?> -----    </option>
                        <?php  foreach ($objtarifa as $tarifa): ?>
                        <option value="<?php echo $tarifa->id ?>"><?php echo $tarifa->$desc?></option>
                 
                         <?php endforeach  ?>
                       </select>
                </div>
             </div>
     <div class="form-group">
         <label for="<?php echo recaudoEconomicoTableClass::getNameField(recaudoEconomicoTableClass::VALOR_TOTAL, true) ?>"  name="<?php echo recaudoEconomicoTableClass::getNameField(recaudoEconomicoTableClass::VALOR_TOTAL, true) ?>" class="col-sm-2 control-label"><?php echo i18n::__('valueTotal')?></label>
        <div class="col-sm-7">
            <input type="number" class="form-control" id="<?php echo recaudoEconomicoTableClass::getNameField(recaudoEconomicoTableClass::VALOR_TOTAL, true) ?>"  name="<?php echo recaudoEconomicoTableClass::getNameField(recaudoEconomicoTableClass::VALOR_TOTAL, true) ?>" 
                   value="<?php  echo (session::getInstance()->hasFlash(recaudoEconomicoTableClass::getNameField(recaudoEconomicoTableClass::VALOR_TOTAL, true)) === true)  ?  request::getInstance()->getPost(recaudoEconomicoTableClass::getNameField(recaudoEconomicoTableClass::VALOR_TOTAL, true)) :  ((( isset($objrecaudoEconomico) == true ) ?  $objrecaudoEconomico[0]->$valor  :  '' ))  ?>" placeholder="<?php echo i18n::__('valueTotal')?>">

        </div>
    </div>
    
     <div class="form-group">
         <label for="<?php echo recaudoEconomicoTableClass::getNameField(recaudoEconomicoTableClass::VALOR_PARCIAL, true) ?>"  name="<?php echo recaudoEconomicoTableClass::getNameField(recaudoEconomicoTableClass::VALOR_PARCIAL, true) ?>" class="col-sm-2 control-label"><?php echo i18n::__('valueParcial')?></label>
        <div class="col-sm-7">
            <input type="number" class="form-control" id="<?php echo recaudoEconomicoTableClass::getNameField(recaudoEconomicoTableClass::VALOR_PARCIAL, true) ?>"  name="<?php echo recaudoEconomicoTableClass::getNameField(recaudoEconomicoTableClass::VALOR_PARCIAL, true) ?>" 
                   value="<?php  echo (session::getInstance()->hasFlash(recaudoEconomicoTableClass::getNameField(recaudoEconomicoTableClass::VALOR_PARCIAL, true)) === true)  ?  request::getInstance()->getPost(recaudoEconomicoTableClass::getNameField(recaudoEconomicoTableClass::VALOR_PARCIAL, true)) :  ((( isset($objrecaudoEconomico) == true ) ?  $objrecaudoEconomico[0]->$parci  :  '' ))  ?>" placeholder="<?php echo i18n::__('valueParcial')?>">
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-sm-offset-5 col-sm-10">
            <button type="submit" class="btn btn-primary"><?php echo i18n::__('register') ?></button>
        </div>
    </div>
</form>
            
        </div>
    </div>
</div>
    