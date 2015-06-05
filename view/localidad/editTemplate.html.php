<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $localidad = localidadTableClass::NOMBRE?>
<?php view::includePartial('localidad/menuPrincipal')?>

<div class="container container-fluid">
<div class="panel panel-primary">
  <div class="panel-heading">
      <h1 class="glyphicon glyphicon-map-marker"> <?php echo i18n::__('editLocality') ?> <?php echo $objlocal[0]->$localidad ?></h1>
      
  </div>
<?php view::includePartial('localidad/formUser', array('objlocal' => $objlocal, 'localidad' => $localidad)) ?>
</div>


        
