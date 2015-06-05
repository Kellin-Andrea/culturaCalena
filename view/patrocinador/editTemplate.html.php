<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $patrocinador = patrocinadorTableClass::NOMBRE ?>
<?php view::includePartial('patrocinador/menuPrincipal')?>

<div class="container container-fluid">
<div class="panel panel-primary">
  <div class="panel-heading">
     <h1 class="glyphicon glyphicon-bitcoin" > <?php echo i18n::__('editPartner')?> <?php echo $objpatrocinador[0]->$patrocinador ?> </h1>
  </div>
<?php view::includePartial('patrocinador/formUser', array('objpatrocinador' => $objpatrocinador, 'patrocinador' => $patrocinador)) ?>


</div>


