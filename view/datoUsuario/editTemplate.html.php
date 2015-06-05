<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $datos = datoUsuarioTableClass::ID ?>
<?php view::includePartial('datoUsuario/menuPrincipal')?>

<div class="container container-fluid">
<div class="panel panel-primary">
  <div class="panel-heading">
    
      <h1 class="glyphicon glyphicon-log-in">EDITAR DATOS USUARIO <?php echo $objdatos[0]->$datos ?></h1>
  
  </div>
<?php view::includePartial('datoUsuario/formUser', array('objdatos' => $objdatos, 'datos' => $datos)) ?>
</div>



