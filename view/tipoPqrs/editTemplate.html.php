<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $tipoPqrs = tipoPqrsTableClass::NOMBRE?>

<?php view::includePartial('tipoPqrs/menuPrincipal')?>

<div class="container container-fluid">
<div class="panel panel-primary">
  <div class="panel-heading">
    
   <h1 class="glyphicon glyphicon-book"> <?php echo i18n::__('editFeedbackType')?> <?php echo $objtipoPqrs[0]->$tipoPqrs ?> </h1>
  </div>
<?php view::includePartial('tipoPqrs/formUser', array('objtipoPqrs' => $objtipoPqrs, 'tipoPqrs' => $tipoPqrs)) ?>

</div>



