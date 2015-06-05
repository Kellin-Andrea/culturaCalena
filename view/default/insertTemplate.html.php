<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php view::includePartial('default/menuPrincipal')?>

<div class="container container-fluid">
<div class="panel panel-primary">
  <div class="panel-heading">
    
      <h1 class="glyphicon glyphicon-user"> <?php echo i18n::__('createUser')?>
  </div>
    
<?php view::includeHandlerMessage() ?>   
<?php view::includePartial('default/formUser', array('objUsuarios => $objUsuarios'))?>

</div>
