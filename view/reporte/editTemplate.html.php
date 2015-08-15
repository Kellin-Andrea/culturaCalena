<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $reporte = reporteTableClass::NOMBRE ?>
<?php view::includePartial('reporte/menuPrincipal')?>

<div class="container container-fluid">
<div class="panel panel-primary">
  <div class="panel-heading">
    
   <h1 class="glyphicon glyphicon-usd"> <?php echo i18n::__('editRate')?> <?php echo $objreporte[0]->$reporte ?></h1>
  </div>
    
<?php view::includePartial('reporte/formUser', array('objreporte' => $objreporte, 'reporte' => $reporte)) ?>

</div>


