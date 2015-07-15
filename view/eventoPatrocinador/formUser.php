<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\session\sessionClass as session ?>
<?php use mvc\request\requestClass as request ?>
<?php $id = eventoPatrocinadorTableClass::ID ?>
<?php $evento_id = eventoTableClass::ID?>
<?php $patrocinador_id = patrocinadorTableClass::ID?>





<div class="container container-fluid">
    <div class="panel panel-primary">
        
        <div class="panel-body">
  <form class="form-horizontal" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('eventoPatrocinador', ((isset($objEventoPatrocinador)) ? 'update' : 'create')) ?>">

                <?php if (isset($objEventoPatrocinador) == true) : ?>
      <input name="<?php echo eventoPatrocinadorTableClass::getNameField(eventoPatrocinadorTableClass::ID, true) ?>" value="<?php echo $objEventoPatrocinador[0]->$id ?>" type="hidden">
                <?php endif ?>
    <div class="form-group">
         
        <label for="<?php echo eventoPatrocinadorTableClass::getNameField(eventoPatrocinadorTableClass::EVENTO_ID, true) ?>"  name="<?php echo eventoPatrocinadorTableClass::getNameField(eventoPatrocinadorTableClass::EVENTO_ID, true) ?>" class="col-sm-2 control-label"><?php echo i18n::__('events') ?></label>
        <div class="col-sm-7"> 
            <select class="form-control" id="<?php echo eventoPatrocinadorTableClass::getNameField(eventoPatrocinadorTableClass::EVENTO_ID, true) ?>"  name="<?php echo eventoPatrocinadorTableClass::getNameField(eventoPatrocinadorTableClass::EVENTO_ID, true) ?>">
                <option value=""> -----<?php echo i18n::__('event_select')?> -----    </option>
                <?php foreach ($objEvento as $evento): ?> 
                <option value="<?php echo $evento -> id ?>"<?php echo (isset($objEventoPatrocinador)) ? ($evento->id === $objEventoPatrocinador[0]->$evento_id) ? 'selected' : '' : '' ?>><?php echo eventoTableClass::getNombreById($evento->id) ?></option>
                    <?php endforeach ?>
            </select>
        </div>
    </div>

    <div class="form-group">

        <label for="<?php echo eventoPatrocinadorTableClass::getNameField(eventoPatrocinadorTableClass::PATROCINADOR_ID, true) ?>"  name="<?php echo eventoPatrocinadorTableClass::getNameField(eventoPatrocinadorTableClass::PATROCINADOR_ID, true) ?>" class="col-sm-2 control-label"><?php echo i18n::__('partner_id') ?></label>
        <div class="col-sm-7">
            <select class="form-control" id="<?php echo eventoPatrocinadorTableClass::getNameField(eventoPatrocinadorTableClass::PATROCINADOR_ID, true) ?>"  name="<?php echo eventoPatrocinadorTableClass::getNameField(eventoPatrocinadorTableClass::PATROCINADOR_ID, true) ?>">
                <option value=""> -----<?php echo i18n::__('partner_select')?> -----    </option>
                <?php foreach ($objPatrocinador as $patrocinador): ?>
                    <option value="<?php echo $patrocinador->id ?>" <?php echo (isset($objEventoPatrocinador)) ? ($patrocinador->id === $objEventoPatrocinador[0]->$patrocinador_id) ? 'selected' : '' : '' ?>><?php echo $patrocinador->id ?></option>
                <?php endforeach ?>
            </select>
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
