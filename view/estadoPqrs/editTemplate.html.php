<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $estadoPqrs = estadoPqrsTableClass::NOMBRE ?>
<?php view::includePartial('estadoPqrs/menuPrincipal')?>

<div class="container container-fluid">
<div class="panel panel-primary">
  <div class="panel-heading">
    
      <h1 class="glyphicon glyphicon-user"> <?php echo i18n::__('editfeedbackDetails')?> <?php echo $objestado[0]->$estadoPqrs ?></h1>
  </div>
    <?php view::includePartial('estadoPqrs/formUser', array('objestado' => $objestado, 'estadoPqrs' => $estadoPqrs)) ?>

</div>
