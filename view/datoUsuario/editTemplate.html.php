<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $datos = datoUsuarioTableClass::NOMBRE ?>
<?php $tipo = tipoDocumentoTableClass::ID ?>
<?php $local = localidadTableClass::ID ?>
<?php $organizacion = organizacionTableClass::ID ?>
<?php view::includePartial('datoUsuario/menuPrincipal')?>

<div class="container container-fluid">
<div class="panel panel-primary">
  <div class="panel-heading">
    
    <h1 class="glyphicon glyphicon-log-in"> <?php echo i18n::__('editDateUser')?> <?php echo $objdatos[0]->$datos ?></h1>
  
  </div>
<?php view::includePartial('datoUsuario/formUser', array(
    'objdatos' => $objdatos,
    'datos' => $datos,
    'objtipoDocumento' => $objtipoDocumento,
    'tipo' => $tipo,
    'objlocal' => $objlocal,
    'local' => $local,
    'objorganizacion' => $objorganizacion,
    'organizacion' => $organizacion,
    'objCategorias' => $objCategorias,
    'objUsuarioGustaCategoria' => $objUsuarioGustaCategoria
    )) ?>
</div>



