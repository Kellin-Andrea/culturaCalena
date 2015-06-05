<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $bitacora = bitacoraTableClass::ACCION?>
<h1>EDITAR BITACORA <?php echo $objbitacora[0]->$bita ?></h1>
<?php view::includePartial('bitacora/formUser', array('objbitacora' => $objbitacora, 'bita' => $bita)) ?>