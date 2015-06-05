<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $organizacion = organizacionTableClass::NOMBRE ?>
<?php view::includePartial('organizacion/menuPrincipal')?>

<div class="container container-fluid">
<div class="panel panel-primary">
  <div class="panel-heading">
    
      <h1 class="glyphicon glyphicon-user"> <?php echo i18n::__('editfeedbackDetails')?>  <?php echo $objorganizacion[0]->$organizacion?></h1>
  </div>
<?php view::includePartial('organizacion/formUser', array('objorganizacion' => $objorganizacion, 'organizacion' => $organizacion)) ?>

</div>




