<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $detalle = detallePqrsTableClass::RESPUESTA?>
<?php view::includePartial('detallePqrs/menuPrincipal')?>

<div class="container container-fluid">
<div class="panel panel-primary">
  <div class="panel-heading">
    
      <h1 class="glyphicon glyphicon-user"> <?php echo i18n::__('editfeedbackDetails')?> <?php echo $objdetalle[0]->$detalle ?></h1>
  </div>
<?php view::includePartial('detallePqrs/formUser', array('objdetalle' => $objdetalle, 'detalle' => $detalle)) ?>

</div>
